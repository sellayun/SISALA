<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use DB;
use Mail;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\SimulasiExport;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    // public function insert()
    // {
    //     $data['abc'] = $request;
    //     $model = new User();
    //     $model->fill($data);
    //     $isSuccess = $model->save();
    //     if ($isSuccess == false) {
    //         return '';
    //     }
    //     return $model;
    // }
    // public function edit()
    // {
    //     $model = User::find();
    //     $model->name = 'jaajan';
    //     return [$model->save(), $model];
    // }

    // public function awd()
    // {
    //     $model = User::find();
    //     return $model;
    // }

    public function profil_password(Request $request)
    {
        $email = $request->session()->get('email');
        
        $model = User::where('email', $email)
        ->first();
        // $datauser = DB::table('user')->where([
        //     ['email', $email]
        // ])->first();
        return view('profil-password', [
            'id' => $model->id,
            'foto' => $model->foto,
            'nama' => $model->nama,
            'email' => $model->email,
            'nim' => $model->nim,
            'phone' => $model->phone,
            'gambar' => $model->foto,
            'level' => $model->level
        ]);
    }

    public function profil_admin(Request $request)
    {
        $email = $request->session()->get('email');
        $model = User::where('email', $email)
        ->first();
        // $datauser = DB::table('user')->where([
        //     ['email', $email]
        // ])->first();
        return view('profil-admin', [
            'id' => $model->id,
            'foto' => $model->foto != "" ? $model->foto : "avatar.png",
            'nama' => $model->nama,
            'email' => $model->email,
            'nim' => $model->nim,
            'phone' => $model->phone,
            'gambar' => $model->foto,
            'level' => $model->level
        ]);
    }

    public function profil_admin_update(Request $request)
    {
        $id = $request->id;
        $nama = $request->nama;
        $email = $request->email;
        $file = $request->file('file');

        $model = User::find($id);
        $model->nama = $nama;
        $model->email = $email;

        if ($file) {
            $namafile = $file->getClientOriginalName();
            $tujuan_upload = 'data_file';
            $file->move($tujuan_upload, $namafile);
            
            $model->foto = $namafile;
        }

        $isSuccess = $model->save();

        if ($isSuccess == false) {
            return redirect('profil/admin')->with('gagal', 'Data yang anda kirim gagal kami terima!');
        }
        return redirect('profil/admin')->with('sukses', 'Data yang anda kirim telah berhasil kami terima!');
    }

    public function profil_mahasiswa(Request $request)
    {
        $email = $request->session()->get('email');
        $model = User::where('email', $email)
        ->first();
        // $datauser = DB::table('user')->where([
        //     ['email', $email]
        // ])->first();
        return view('profil-mahasiswa', [
            'id' => $model->id,
            'foto' => $model->foto != "" ? $model->foto : "avatar.png",
            'nama' => $model->nama,
            'email' => $model->email,
            'nim' => $model->nim,
            'phone' => $model->phone,
            'gambar' => $model->foto,
            'level' => $model->level
        ]);
    }

    public function profil_mahasiswa_update(Request $request)
    {
        $id = $request->id;
        $nama = $request->nama;
        $email = $request->email;
        $nim = $request->nim;
        $phone = $request->phone;
        $file = $request->file('file');

        $model = User::find($id);
        $model->nama = $nama;
        $model->email = $email;
        $model->nim = $nim;
        $model->phone = $phone;

        if ($file) {
            $namafile = $file->getClientOriginalName();
            $tujuan_upload = 'data_file';
            $file->move($tujuan_upload, $namafile);

            $model->foto = $namafile;
        }

        $isSuccess = $model->save();

        if ($isSuccess == false) {
            return redirect('profil/mahasiswa')->with('gagal', 'Data yang anda kirim gagal kami terima!');
        }
        return redirect('profil/mahasiswa')->with('sukses', 'Data yang anda kirim telah berhasil kami terima!');
    }

    public function profil_user(Request $request, $id)
    {
        $email = $request->session()->get('email');
        $model = User::where('email', $email)
        ->first();
        $model2 = User::where('id', $id)
        ->first();
        // $datauser = DB::table('user')->where([
        //     ['email', $email]
        // ])->first();
        // $datauser2 = DB::table('user')->where([
        //     ['id', $id]
        // ])->first();
        // if ($datauser->foto == "") {
        //     $aaa = "avatar.png";
        // } else {
        //     $aaa = $datauser->foto;
        // }
        // if ($datauser2->foto == "") {
        //     $bbb = "avatar.png";
        // } else {
        //     $bbb = $datauser2->foto;
        // }
        return view('profil-user', [
            'id' => $model->id,
            'foto' => $model->foto != "" ? $model->foto : "avatar.png",
            'nama' => $model->nama,
            'email' => $model->email,
            'nim' => $model->nim,
            'phone' => $model->phone,
            'gambar' => $model->foto,
            'level' => $model->level,
            'id2' => $model2->id,
            'foto2' => $model2->foto != "" ? $model2->foto : "avatar.png",
            'nama2' => $model2->nama,
            'email2' => $model2->email,
            'nim2' => $model2->nim,
            'phone2' => $model2->phone,
            'gambar2' => $model2->foto,
            'level2' => $model2->level
        ]);
    }

    public function profil_user_update(Request $request)
    {
        $file = $request->file('file');
        if ($file) {
            $namafile = $file->getClientOriginalName();
            $tujuan_upload = 'data_file';
            $id = $request->id;
            $nama = $request->nama;
            $email = $request->email;
            $nim = $request->nim;
            $phone = $request->phone;
            $model = User::find($id)
            ->update(['nama' => $nama, 'email' => $email, 'nim' => $nim, 'phone' => $phone, 'foto' => $namafile]);
            // $data = DB::table('user')
            //     ->where('id', $id)
            //     ->update(['nama' => $nama, 'email' => $email, 'nim' => $nim, 'phone' => $phone, 'foto' => $namafile]);
            $file->move($tujuan_upload, $namafile);
            return redirect('kelola/user')->with('sukses', 'Data yang anda kirim telah berhasil kami terima!');
        } else {
            $id = $request->id;
            $nama = $request->nama;
            $email = $request->email;
            $nim = $request->nim;
            $phone = $request->phone;
            $model = User::find($id)
            ->update(['nama' => $nama, 'email' => $email, 'nim' => $nim, 'phone' => $phone]);
            // $data = DB::table('user')
            //     ->where('id', $id)
            //     ->update(['nama' => $nama, 'email' => $email, 'nim' => $nim, 'phone' => $phone]);
            return redirect('kelola/user')->with('sukses', 'Data yang anda kirim telah berhasil kami terima!');
        }
    }

    public function password_update(Request $request)
    {
        $id = $request->id;
        $passwordlama = $request->passwordlama;
        $passwordbaru = $request->passwordbaru;
        $konfirmasipassword = $request->konfirmasipassword;

        if ($passwordbaru == $konfirmasipassword) {
            $model = User::find($id);
            if ($passwordlama == $model->password) {
                $model->password = $passwordbaru;
                $isSuccess = $model->save();

                if ($isSuccess == false) {
                    return redirect('profil/password')->with('gagal', 'Gagal Mengganti Password');
                }

                return redirect('profil/password')->with('sukses', 'Sukses mengubah password');
            } else {
                return redirect('profil/password')->with('gagal', 'Password lama anda salah!');
            }
        } else {
            return redirect('profil/password')->with('gagal', 'Konfirmasi password anda tidak sama!');
        }
    }
}
