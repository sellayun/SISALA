<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Simulasi;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $email = $request->session()->get('email');
        $datauser = User::where('email', $email)
        ->first();
        $jumlah = User::count();
        $aktif = User::where('status', 1)
        ->get()
        ->count();
        $nonaktif = User::where('status', 0)
        ->get()
        ->count();
        // $grafik = User::select('select count(*) as jumlah, MONTH(tanggal) as bulan')
        // ->groupBy('bulan')
        // ->get();
        $grafik = DB::select('select count(*) as jumlah, MONTH(tanggal) as bulan from user group by MONTH(tanggal)');

        if ($datauser->level == "Admin") {
            return view('index', [
                'nama' => $datauser->nama,
                'email' => $datauser->email,
                'nim' => $datauser->nim,
                'phone' => $datauser->phone,
                'level' => $datauser->level,
                'foto' => $datauser->foto != "" ? $datauser->foto : "avatar.png",
                'jumlah' => $jumlah,
                'aktif' => $aktif,
                'nonaktif' => $nonaktif,
                'grafik' => $grafik
            ]);
        } else {
            $data = Simulasi::where('email', $email)
            ->where('hapus', 0)
            ->orderBy('id', 'desc')
            ->get();

            $a = "";
            foreach ($data as $value) {
                if ($a === "") {
                    $a = $a . "?id=".$value->id_simulasi; 
                } else {
                    $a = $a . "&id=".$value->id_simulasi;
                }
            }

            if ($a != "") {
                $client = new \GuzzleHttp\Client([
                            'base_uri' => '10.2.22.1:4747'
                        ]);
                        $headers = [
                            'Accept' => 'application/json'
                        ];
                        $body = [
                            'workDir' => 'Z:/data_shared/',
                        ];
                        $res = $client->post('/process/list' . $a, [
                            'headers' => $headers,
                            'json' => $body,
                        ]);
                $b = $res->getBody()->getContents();
                $c = json_decode($b)->result;
                $selesai = 0;
                $proses = 0;
                foreach ($c as $value2) {
                    if ($value2->status === "done") {
                        $selesai += 1;
                    } else {
                        $proses += 1;
                    }
                }
            } else {
                $selesai = 0;
                $proses = 0;
            }

            return view('mahasiswa', [
                'nama' => $datauser->nama,
                'email' => $datauser->email,
                'nim' => $datauser->nim,
                'phone' => $datauser->phone,
                'level' => $datauser->level,
                'foto' => $datauser->foto != "" ? $datauser->foto : "avatar.png",
                'jumlah' => $jumlah,
                'aktif' => $aktif,
                'nonaktif' => $nonaktif,
                'proses' => $proses,
                'selesai' => $selesai,
                'hapus' => $selesai * 4,
                'grafik' => $grafik
            ]);
        }
    }

    public function profil_password(Request $request)
    {
        $email = $request->session()->get('email');
        $datauser = User::where('email', $email)
        ->first();
        return view('profil-password', [
            'id' => $datauser->id,
            'foto' => $datauser->foto,
            'nama' => $datauser->nama,
            'email' => $datauser->email,
            'nim' => $datauser->nim,
            'phone' => $datauser->phone,
            'gambar' => $datauser->foto,
            'level' => $datauser->level
        ]);
    }
}
