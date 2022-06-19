<?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use DB;


class PegawaiController extends Controller
{
    public function index()
    {
    	// mengambil data dari table pegawai
    	$pegawai = DB::table('user')->get();

    	// mengirim data pegawai ke view index
    	return view('index',['pegawai' => $pegawai]);

    }
}