package main

import (
	"bufio"
	"context"
	"encoding/json"
	"errors"
	"flag"
	"fmt"
	"io"
	"log"
	"net/http"
	"os/exec"
	"path/filepath"
	"strings"
	"sync"
	"time"

	"gorm.io/driver/sqlite"
	"gorm.io/gorm"
)

var (
	pomBinary    = "pom2k_ar.exe"
	pomBinaryArg = []string{}
	pomWorkdir   = "plot"
	dbFile       = "default.db"
	addr         = ":8000"

	db *gorm.DB
)

func init() {
	if pomBinaryAbs, err := filepath.Abs(pomBinary); err == nil {
		pomBinary = pomBinaryAbs
	}

	flag.StringVar(&pomBinary, "bin", pomBinary, "POM Binary path")
	flag.StringVar(&pomWorkdir, "workdir", pomWorkdir, "POM default workdir")
	flag.StringVar(&dbFile, "db", dbFile, "DB File")
	flag.StringVar(&addr, "addr", addr, "Server Addr")
}

type SimulasiStatus string

const (
	SimulasiStatus_CREATED  = "created"
	SimulasiStatus_STOPPED  = "stopped"
	SimulasiStatus_ERROR    = "error"
	SimulasiStatus_PROGRESS = "progress"
	SimulasiStatus_DONE     = "done"
)

type Simulasi struct {
	ID        uint64         `gorm:"primarykey" json:"id,omitempty"`
	CreatedAt time.Time      `json:"created_at,omitempty"`
	UpdatedAt time.Time      `json:"updated_at,omitempty"`
	DeletedAt gorm.DeletedAt `gorm:"index" json:"deleted_at,omitempty"`
	Days      int            `json:"days,omitempty"`

	Timeout    int64          `json:"timeout,omitempty"`
	WorkDir    string         `json:"workDir,omitempty"`
	Email      string         `json:"email,omitempty"`
	DataA      string         `json:"data_a,omitempty"`
	DataB      string         `json:"data_b,omitempty"`
	DataC      string         `json:"data_c,omitempty"`
	DataD      string         `json:"data_d,omitempty"`
	Status     SimulasiStatus `json:"status,omitempty"`
	LastOutput string         `json:"last_output,omitempty"`
	ErrMsg     string         `json:"error_message,omitempty"`
	ErrAddt    string         `json:"error_addt,omitempty"`
}

type ProcessReq struct {
	Timeout int64  `json:"timeout"`
	Days    int    `json:"days"`
	WorkDir string `json:"workDir"`
	Email   string `json:"email"`
}

type Response struct {
	Code    int         `json:"code"`
	Message string      `json:"message"`
	Result  interface{} `json:"result"`
}

func Send(rw http.ResponseWriter, code int, msg string, r interface{}) {
	rw.Header().Set("Content-Type", "application/json")
	rw.WriteHeader(code)
	res := Response{
		Code:    code,
		Message: msg,
		Result:  r,
	}
	json.NewEncoder(rw).Encode(res)
}

func main() {
	flag.Parse()

	var err error
	db, err = gorm.Open(sqlite.Open(dbFile))
	if err != nil {
		log.Panic(err)
	}
	db.AutoMigrate(&Simulasi{})
	mux := http.NewServeMux()
	mux.HandleFunc("/process/list", func(rw http.ResponseWriter, r *http.Request) {
		ids, ok := r.URL.Query()["id"]
		var terms = []interface{}{}
		if ok {
			terms = append(terms, ids)
		}
		var res = []Simulasi{}
		tx := db.WithContext(r.Context()).Find(&res, terms...)
		if tx.Error != nil {
			if errors.Is(err, gorm.ErrRecordNotFound) {
				Send(rw, 404, "record not found", nil)
				return
			}
			Send(rw, 500, "db error", nil)
			return
		}
		Send(rw, 200, "success", &res)
	})

	mux.HandleFunc("/process/add", func(rw http.ResponseWriter, r *http.Request) {
		if r.Method != "POST" {
			Send(rw, 405, "method not allowed", nil)
			return
		}
		var req *ProcessReq = new(ProcessReq)
		dec := json.NewDecoder(r.Body)
		var err error
		if err = dec.Decode(req); err != nil {
			Send(rw, 400, "bad request body", nil)
			return
		}

		// 1-10
		if req.Days < 1 {
			req.Days = 1
		}
		if req.Days > 10 {
			req.Days = 10
		}

		var sim = Simulasi{
			Email:   req.Email,
			WorkDir: req.WorkDir,
			Timeout: req.Timeout,
			Days:    req.Days,
			Status:  SimulasiStatus_CREATED,
		}
		if tx := db.Create(&sim); tx.Error == nil {
			go func() {
				var err error
				var ctx context.Context
				var cancel context.CancelFunc
				var awaitTask = make(chan struct{}, 1)
				var wg sync.WaitGroup
				if req.Timeout < 1 {
					ctx, cancel = context.WithCancel(context.Background())
				} else {
					ctx, cancel = context.WithTimeout(context.Background(), time.Duration(req.Timeout))
				}
				defer func() {
					fmt.Printf("ini done mulai")
					sim.Status = SimulasiStatus_DONE
					fmt.Printf("ini done selesai")
					if err != nil {
						if errors.Is(err, context.Canceled) || errors.Is(err, context.DeadlineExceeded) {
							sim.Status = SimulasiStatus_STOPPED
						} else {
							fmt.Printf("ini error mulai")
							sim.Status = SimulasiStatus_ERROR
							fmt.Printf("ini error selesai")
						}
						sim.ErrMsg = err.Error()
					}
					select {
					case <-awaitTask:
					case <-time.After(4 * time.Second):
						if sim.ErrMsg != "" {
							sim.ErrMsg = sim.ErrMsg + " :: "
						}
						sim.ErrMsg = sim.ErrMsg + "await task timeout"
					}
					fmt.Printf("ini mau save")
					db.Save(&sim)
					fmt.Printf("ini selesai save")
				}()
				defer cancel()
				task := exec.CommandContext(ctx, pomBinary, pomBinaryArg...)
				task.Dir = req.WorkDir
				// task.Stdout = os.Stdout
				// task.Stderr = os.Stdout
				var stdinPipe io.WriteCloser
				var stdoutPipe io.ReadCloser
				var stderrPipe io.ReadCloser
				if stdinPipe, err = task.StdinPipe(); err != nil {
					return
				}
				if stdoutPipe, err = task.StdoutPipe(); err != nil {
					return
				}
				if stderrPipe, err = task.StderrPipe(); err != nil {
					return
				}

				if err = task.Start(); err != nil {
					return
				}
				stdinPipe.Write([]byte(fmt.Sprintf("0\n%d\nrestart02\n", req.Days)))
				go func() {
					wg.Wait()
					awaitTask <- struct{}{}
				}()
				watcher := func(rc io.ReadCloser, rs *string, cb func(string) string) {
					buf := bufio.NewReader(rc)
					var line string
					var lines = []string{}
					for {
						line, err = buf.ReadString('\n')
						if len(line) == 0 && err != nil {
							if errors.Is(err, io.EOF) {
								break
							}
							break
						}
						line = strings.TrimSuffix(line, "\n")
						line = strings.Trim(line, " \n")
						if line != "" {
							line = cb(line)
							if rs != nil {
								lines = append(lines, line)
							}
						}
					}
					if rs != nil {
						*rs = strings.Join(lines, "\n")
					}
					wg.Done()
				}
				wg.Add(2)
				go watcher(stderrPipe, &sim.ErrAddt, func(s string) string {
					log.Printf("err: %q\n", s)
					return s
				})
				lastUpdated := time.Now()
				go watcher(stdoutPipe, nil, func(s string) string {
					log.Printf("out: %q\n", s)
					if time.Since(lastUpdated) > 10*time.Second {
						fmt.Printf("ini progres mulai")
						sim.Status = SimulasiStatus_PROGRESS
						fmt.Printf("ini progres selesai")
						sim.LastOutput = s
						db.Save(sim)
					}
					return s
				})

				if err = task.Wait(); err != nil {
					return
				}
				fmt.Printf("\nclean up resource\n")
				stdinPipe.Close()
				stderrPipe.Close()
				stdoutPipe.Close()
			}()
			Send(rw, 201, "created new task", sim)
			return
		}
		Send(rw, 500, "create failed", nil)
	})

	s := &http.Server{
		Addr:    addr,
		Handler: mux,
	}
	log.Printf("listening on [%s]...\n", addr)
	log.Fatal(s.ListenAndServe())
}
