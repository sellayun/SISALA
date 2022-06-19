<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
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
