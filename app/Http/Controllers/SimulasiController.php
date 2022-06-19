<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
}
