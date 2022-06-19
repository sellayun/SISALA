<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use DB;
use Mail;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\SimulasiExport;
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
        // $data = DB::table('user')
        //     ->where('id', $id)
        //     ->update(['status' => 1]);
        return redirect('kelola/user')->with('sukses', 'data berhasil di '.$status == 0 ? 'Enable' : 'Disable');
        // if ($status == 0) {
        //     $model = User::find($id)
        //     ->update(['status' => 1]);
        //     // $data = DB::table('user')
        //     //     ->where('id', $id)
        //     //     ->update(['status' => 1]);
        //     return redirect('kelola/user')->with('sukses', 'data berhasil di Enable');
        // } else {
        //     $data = DB::table('user')
        //         ->where('id', $id)
        //         ->update(['status' => 0]);
        //     return redirect('kelola/user')->with('sukses', 'data berhasil di Disable');
        // }
    }
}
