<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class KelolaUserController extends Controller
{
    public function kelola_user(Request $request)
    {
        $email = $request->session()->get('email');
        $model = User::where('level', 'Mahasiswa')
        ->get();
        $model2 = User::where('email', $email)
        ->first();
        // $data = DB::table('user')->where([
        //     ['level', 'Mahasiswa']
        // ])->get();
        // $datauser = DB::table('user')->where([
        //     ['email', $email]
        // ])->first();
        return view('kelola-user', [
            'data' => $model,
            'number' => 0,
            'nama' => $model2->nama,
            'email' => $model2->email,
            'nim' => $model2->nim,
            'phone' => $model2->phone,
            'level' => $model2->level,
            'foto' => $model2->foto != "" ? $model2->foto : "avatar.png"
        ]);
    }

    public function profil_user(Request $request, $id)
    {
        $email = $request->session()->get('email');
        $model = User::where('email', $email)
        ->first();
        $model2 = User::where('id', $id)
        ->first();
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

    public function user_hapus($id)
    {
        $model = User::find($id)
        ->delete();
        // DB::table('user')->where('id', $id)->delete();
        return redirect('kelola/user')->with('sukses', 'User berhasil dihapus');
    }

    public function user_disable($id, $status)
    {
        $model = User::find($id)
        ->update(['status' => $status == 0 ? 1 : 0]);
        return redirect('kelola/user')->with('sukses', 'data berhasil di '.$status == 0 ? 'Enable' : 'Disable');
    }
}
