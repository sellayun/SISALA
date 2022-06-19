<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Beranda;
use App\Models\Kontak;

class LandingController extends Controller
{
    public function index(Request $request)
    {
        $beranda = Beranda::first();
        $kontak = Kontak::first();
        return view('landing', [
            'judul' => $beranda->judul,
            'deskripsi' => $beranda->deskripsi,
            'email' => $kontak->email,
            'alamat' => $kontak->alamat,
            'kota' => $kontak->kota
        ]);
    }
}
