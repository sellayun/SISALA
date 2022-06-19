<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Beranda;
use App\Models\Kontak;
use Illuminate\Support\Facades\DB;

class KelolaBerandaController extends Controller
{
    public function kelola_tentang(Request $request)
    {
        $email = $request->session()->get('email');
        $model = Beranda::find(1);
        $model2 = User::where('email', $email)
        ->first();
        return view('kelola-tentang', [
            'gambar' => $model->foto != "" ? $model->foto : "wallpaperbetter.jpg",
            'judul' => $model->judul,
            'deskripsi' => $model->deskripsi,
            'nama' => $model2->nama,
            'email' => $model2->email,
            'nim' => $model2->nim,
            'phone' => $model2->phone,
            'foto' => $model2->foto,
            'level' => $model2->level
        ]);
    }

    public function kelola_kontak(Request $request)
    {
        $email = $request->session()->get('email');
        $model = Kontak::find(1);
        $model2 = User::where('email', $email)
        ->first();
        return view('kelola-kontak', [
            'email' => $model->email,
            'alamat' => $model->alamat,
            'kota' => $model->kota,
            'nama' => $model2->nama,
            'nim' => $model2->nim,
            'phone' => $model2->phone,
            'foto' => $model2->foto,
            'level' => $model2->level
        ]);
    }

    public function dashboard_aksi(Request $request)
    {
        $id = 1;
        $judul = $request->judul;
        $deskripsi = $request->deskripsi;
        $file = $request->file('file');

        $model = Beranda::find($id);
        $model->judul = $judul;
        $model->deskripsi = $deskripsi;

        if ($file) {
            $namafile = $file->getClientOriginalName();
            $tujuan_upload = 'data_file';
            $file->move($tujuan_upload, $namafile);
            $model->foto = $namafile;
        }
        $isSuccess = $model->save();

        if ($isSuccess == false) {
            return redirect('kelola/tentang')->with('sukses', 'data gagal di ubah');
        }
        return redirect('kelola/tentang')->with('sukses', 'data berhasil di ubah');
    }

    public function kontak_aksi(Request $request)
    {
        $id = 1;
        $email = $request->email;
        $alamat = $request->alamat;
        $kota = $request->kota;

        $model = Kontak::find($id);
        $model->email = $email;
        $model->alamat = $alamat;
        $model->kota = $kota;
        $isSuccess = $model->save();

        if ($isSuccess == false) {
            return redirect('kelola/kontak')->with('sukses', 'data gagal di ubah');
        }
        return redirect('kelola/kontak')->with('sukses', 'data berhasil di ubah');
    }
}
