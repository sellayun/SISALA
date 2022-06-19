<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\SimulasiExport;
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

    public function pemodelan_grafik(Request $request)
    {
        return view('pemodelan-grafik');
    }

    // public function export_excel()
    // {
    //     return Excel::download(new SimulasiExport, 'simulasi.xlsx');
    // }

    // public function password_update_mahasiswa(Request $request)
    // {
    //     $id = $request->id;
    //     $passwordlama = $request->passwordlama;
    //     $passwordbaru = $request->passwordbaru;
    //     $konfirmasipassword = $request->konfirmasipassword;
    //     if ($passwordbaru == $konfirmasipassword) {
    //         $data = DB::table('user')->where([
    //             ['id', $id]
    //         ])->first();
    //         if ($passwordlama == $data->password) {
    //             $data = DB::table('user')
    //                 ->where('id', $id)
    //                 ->update(['password' => $passwordbaru]);
    //             return redirect('profil/mahasiswa')->with('alert', 'Sukses mengubah password');
    //         } else {
    //             return redirect('profil/mahasiswa')->with('alert', 'Password lama anda salah!');
    //         }
    //     } else {
    //         return redirect('profil/mahasiswa')->with('alert', 'Konfirmasi password anda tidak sama!');
    //     }
    // }

    // public function data(Request $request){
    //     return view('data');
    //     // if($request->session()->has('email')){
    //     //     $user = $request->session()->get('email');
    //     //     return view('dashboard');
    //     // }else{
    //     //     return redirect('/login');
    //     // }
    // }

    // public function simulasi(Request $request){
    //     return view('simulasi');
    //     // if($request->session()->has('email')){
    //     //     $user = $request->session()->get('email');
    //     //     return view('dashboard');
    //     // }else{
    //     //     return redirect('/login');
    //     // }
    // }

    // public function formulir(){
    // 	return view('formulir');
    // }

    // public function proses(Request $request){
    //     $nama = $request->input('nama');
    //  	$alamat = $request->input('alamat');
    //     return "Nama : ".$nama.", Alamat : ".$alamat;
    // }
    
    // public function sendemail()
    // {
    //     $to_name = 'Sela';
    //     $to_email = 'sellayun25@gmail.com';
    //     $data = array('create'=>"naufal", "number"=>"3410");

    // 	Mail::send('emails.mail', $data, function($message) use ($to_name, $to_email) {
    //         $message->to($to_email, $to_name)
    //                 ->subject('Testing!');
    //         $message->from('arusku.info@gmail.com','arusku');
    //     });
    //     echo "email sent";
    // }
}
