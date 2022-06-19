<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\SimulasiExport;
use App\Models\User;
use App\Models\Simulasi;
use Illuminate\Support\Facades\DB;

class SimulasiController extends Controller
{
    public function simulasi(Request $request)
    {
        $email = $request->session()->get('email');
        $data = Simulasi::where('email', $email)
        ->orderBy('id', 'desc')
        ->get();
        $datauser = User::where('email', $email)
        ->first();
	$a = "";
	foreach ($data as $value) {
    		if ($a === "") {
			$a = $a . "?id=".$value->id_simulasi; 
		} else {
			$a = $a . "&id=".$value->id_simulasi;
		}
	}
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
    return view('simulasi', [
        'data' => $data,
        'simulasi' => $c,
        'number' => 0,
        'nama' => $datauser->nama,
        'email' => $datauser->email,
        'nim' => $datauser->nim,
        'phone' => $datauser->phone,
        'level' => $datauser->level,
        'foto' => $datauser->foto != "" ? $datauser->foto : "avatar.png"
    ]);
    }

    public function simulasi_hapus($id)
    {
        $data = Simulasi::find($id)
        ->update(['hapus' => 1]);
        return redirect('simulasi')->with('sukses', 'berhasil dihapus');
    }

    public function simulasi_ubah(Request $request, $id)
    {
        $email = $request->session()->get('email');
        $datauser = User::where('email', $email)
        ->first();
        $data = Simulasi::find($id);
        return view('simulasi-ubah', [
            'id' => $data->id,
            'judul' => $data->judul,
            'problem_number' => $data->problem_number,
            'mode' => $data->mode,
            'advection_scheme' => $data->advection_scheme,
            'number_of_iterations' => $data->number_of_iterations,
            'smoothing_parameter' => $data->smoothing_parameter,
            'number_read' => $data->number_read,
            'time_start' => $data->time_start,
            'days' => $data->days,
            'prtd1' => $data->prtd1,
            'prtd2' => $data->prtd2,
            'switch' => $data->switch,
            'iskp' => $data->iskp,
            'jskp' => $data->jskp,
            'logical_for_inertial_ramp' => $data->logical_for_inertial_ramp,
            'z0b' => $data->z0b,
            'nama' => $datauser->nama,
            'email' => $datauser->email,
            'nim' => $datauser->nim,
            'phone' => $datauser->phone,
            'level' => $datauser->level,
            'foto' => $datauser->foto != "" ? $datauser->foto : "avatar.png"
        ]);
    }

    public function simulasi_ubah_aksi(Request $request)
    {
        $id = $request->id;
        $judul = $request->judul;
        $problem_number = $request->problemnumber;
        $mode = $request->mode;
        $advection_scheme = $request->advectionscheme;
        $number_of_iterations = $request->numberofiterations;
        $smoothing_parameter = $request->smoothingparameter;
        $number_read = $request->numberread;
        $time_start = $request->timestart;
        $days = $request->days;
        $prtd1 = $request->prtd1;
        $prtd2 = $request->prtd2;
        $switch = $request->switch;
        $iskp = $request->iskp;
        $jskp = $request->jskp;
        $logical_for_inertial_ramp = $request->logicalforinertialramp;
        $z0b = $request->z0b;
        $data = Simulasi::find($id)
        ->update([
            'judul' => $judul,
            'problem_number' => $problem_number,
            'mode' => $mode,
            'advection_scheme' => $advection_scheme,
            'number_of_iterations' => $number_of_iterations,
            'smoothing_parameter' => $smoothing_parameter,
            'number_read' => $number_read,
            'time_start' => $time_start,
            'days' => $days,
            'prtd1' => $prtd1,
            'prtd2' => $prtd2,
            'switch' => $switch,
            'iskp' => $iskp,
            'jskp' => $jskp,
            'logical_for_inertial_ramp' => $logical_for_inertial_ramp,
            'z0b' => $z0b
        ]);
        return redirect('/simulasi/ubah/upload/' . $id)->with('sukses', 'Mohon tetap di halaman ini sampai anda mengupload file data!');
    }

    public function simulasi_ubah_upload(Request $request, $id)
    {
        $email = $request->session()->get('email');
        $datauser = User::where('email', $email)
        ->first();
        $data = Simulasi::find($id);
        return view('simulasi-ubah-upload', [
            'id' => $data->id,
            'judul' => $data->judul,
            'data_a' => $data->data_a,
            'data_b' => $data->data_b,
            'data_c' => $data->data_c,
            'data_d' => $data->data_d,
            'nama' => $datauser->nama,
            'email' => $datauser->email,
            'nim' => $datauser->nim,
            'phone' => $datauser->phone,
            'level' => $datauser->level,
            'foto' => $datauser->foto != "" ? $datauser->foto : "avatar.png"
        ]);
    }

    public function simulasi_ubah_upload_aksi(Request $request)
    {
        $id = $request->id;
        $file = $request->file('file');
        $file2 = $request->file('file2');
        $file3 = $request->file('file3');
        $file4 = $request->file('file4');
        $tujuan_upload = 'data_simulasi';
        if ($file) {
            $namafile = $file->getClientOriginalName();
            $data = Simulasi::find($id)
            ->update(['data_a' => $namafile]);
            $file->move($tujuan_upload, $namafile);
        }
        if ($file2) {
            $namafile2 = $file2->getClientOriginalName();
            $data = Simulasi::find($id)
            ->update(['data_b' => $namafile2]);
            $file2->move($tujuan_upload, $namafile2);
        }
        if ($file3) {
            $namafile3 = $file3->getClientOriginalName();
            $data = Simulasi::find($id)
            ->update(['data_c' => $namafile3]);
            $file3->move($tujuan_upload, $namafile3);
        }
        if ($file4) {
            $namafile4 = $file4->getClientOriginalName();
            $data = Simulasi::find($id)
            ->update(['data_d' => $namafile4]);
            $file4->move($tujuan_upload, $namafile4);
        }
        return redirect('simulasi')->with('sukses', 'Data yang anda kirim telah berhasil kami terima!');
    }

    public function simulasi_tambah(Request $request)
    {
        $email = $request->session()->get('email');
        $datauser = User::where('email', $email)
        ->first();
        return view('simulasi-tambah', [
            'nama' => $datauser->nama,
            'email' => $datauser->email,
            'nim' => $datauser->nim,
            'phone' => $datauser->phone,
            'level' => $datauser->level,
            'foto' => $datauser->foto != "" ? $datauser->foto : "avatar.png"
        ]);
    }

    public function simulasi_tambah_aksi(Request $request)
    {
        $email = $request->session()->get('email');
        
        $data['judul'] = $request->judul;
        $data['email'] = $email;
        $data['problem_number'] = $request->problemnumber;
        $data['mode'] = $request->mode;
        $data['advection_scheme'] = $request->advectionscheme;
        $data['number_of_iterations'] = $request->numberofiterations;
        $data['smoothing_parameter'] = $request->smoothingparameter;
        $data['number_read'] = $request->numberread;
        $data['time_start'] = $request->timestart;
        $data['days'] = $request->days;
        $data['prtd1'] = $request->prtd1;
        $data['prtd2'] = $request->prtd2;
        $data['switch'] = $request->switch;
        $data['iskp'] = $request->iskp;
        $data['jskp'] = $request->jskp;
        $data['logical_for_inertial_ramp'] = $request->logicalforinertialramp;
        $data['z0b'] = $request->z0b;

        $model = new Simulasi();
        $model->fill($data);
        $isSuccess = $model->save();
        return redirect('/simulasi/upload/' . $model->id)->with('sukses', 'Mohon tetap di halaman ini sampai anda mengupload file data!');
    }

    public function simulasi_upload(Request $request)
    {
        $email = $request->session()->get('email');
        $datauser = User::where('email', $email)
        ->first();
        // Storage::disk('custom_folder')->put('filename1', $file_content);
        // Storage::disk('custom_folder')->url($filename)
        return view('simulasi-upload', [
            'nama' => $datauser->nama,
            'email' => $datauser->email,
            'nim' => $datauser->nim,
            'phone' => $datauser->phone,
            'level' => $datauser->level,
            'foto' => $datauser->foto != "" ? $datauser->foto : "avatar.png"
        ]);
    }

    public function simulasi_upload_aksi(Request $request)
    {
        $characters = 'abcdefghijklmnopqrstuvwxyz';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 10; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        $basepath = '/data_shared/'.$randomString;
        if (!file_exists($basepath)) {
            mkdir($basepath, 0777, true);
            $judul = $request->judul;
            $email = $request->session()->get('email');
            $file = $request->file('file');
            $file2 = $request->file('file2');
            $file3 = $request->file('file3');
            $file4 = $request->file('file4');
            $namafile = $file->getClientOriginalName();
            $namafile2 = $file2->getClientOriginalName();
            $namafile3 = $file3->getClientOriginalName();
            $namafile4 = $file4->getClientOriginalName();
            // $tujuan_upload = 'data_simulasi';
            $tujuan_upload = $basepath;
            $file->move($tujuan_upload, $namafile);
            $file2->move($tujuan_upload, $namafile2);
            $file3->move($tujuan_upload, $namafile3);
            $file4->move($tujuan_upload, $namafile4);
            $client = new \GuzzleHttp\Client([
                'base_uri' => '10.2.22.1:4747'
            ]);
            $headers = [
                'Accept' => 'application/json'
            ];
            $body = [
                'workDir' => 'Z:/data_shared/'.$randomString,
                'days' => 0
            ];
            $res = $client->post('/process/add', [
                'headers' => $headers,
                'json' => $body,
            ]);
		$b = $res->getBody()->getContents();
        	$c = json_decode($b)->result->id;
		DB::table('simulasi')->insert([
                'judul' => $judul,
                'email' => $email,
                'data_a' => $namafile,
                'data_b' => $namafile2,
                'data_c' => $namafile3,
                'data_d' => $namafile4,
                'status' => 0,
                'workdir' => $randomString,
                'id_simulasi' => (string)$c,
                'hapus' => 0,
            ]);
            return redirect('simulasi')->with('sukses', 'Simulasi sedang diproses');
        } else {
            return redirect('simulasi')->with('sukses', 'mohon ulangi simulasi');
        }
    }

    public function simulasi_hasil(Request $request, $id)
    {
        // $file = fopen(storage_path("cek.txt"), "r") or die("Unable to open file!");
        // while (!feof($file)){   
        //     $data = fgets($file); 
        //     echo "<tr><td>" . str_replace(' ','</td><td>',$data) . '</td></tr>';
        // }
        // fclose($file);
        $email = $request->session()->get('email');
        $datauser = DB::table('user')->where([
            ['email', $email]
        ])->first();
        $data = DB::table('simulasi')->where([
            ['id', $id]
        ])->first();
        return view('simulasi-hasil', [
            'id' => $data->id,
            'judul' => $data->judul,
            'nama' => $datauser->nama,
            'email' => $datauser->email,
            'nim' => $datauser->nim,
            'phone' => $datauser->phone,
            'level' => $datauser->level,
            'foto' => $datauser->foto != "" ? $datauser->foto : "avatar.png",
            'data' => $data
        ]);
        // 'problem_number' => $data->problem_number,
        // 'mode' => $data->mode,
        // 'advection_scheme' => $data->advection_scheme,
        // 'number_of_iterations' => $data->number_of_iterations,
        // 'smoothing_parameter' => $data->smoothing_parameter,
        // 'number_read' => $data->number_read,
        // 'time_start' => $data->time_start,
        // 'days' => $data->days,
        // 'prtd1' => $data->prtd1,
        // 'prtd2' => $data->prtd2,
        // 'switch' => $data->switch,
        // 'iskp' => $data->iskp,
        // 'jskp' => $data->jskp,
        // 'logical_for_inertial_ramp' => $data->logical_for_inertial_ramp,
        // 'z0b' => $data->z0b
    }
}
