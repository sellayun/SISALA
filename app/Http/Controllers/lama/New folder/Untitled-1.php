<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SimulasiController;
use App\Http\Controllers\KelolaBerandaController;
use App\Http\Controllers\KelolaUserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route::get('/simulasi/export_excel', [HomeController::class, 'export_excel']);

Route::get('/', [LandingController::class, 'index']);





Route::get('/sendemail', [HomeController::class, 'sendemail']);





Route::get('/profil/user/{id}', [ProfileController::class, 'profil_user']);
Route::post('/profil/user', [ProfileController::class, 'profil_user_update']);


Route::get('/simulasi/ubah/{id}', [SimulasiController::class, 'simulasi_ubah']);
Route::post('/simulasi/ubah/aksi', [SimulasiController::class, 'simulasi_ubah_aksi']);
Route::get('/simulasi/ubah/upload/{id}', [SimulasiController::class, 'simulasi_ubah_upload']);
Route::post('/simulasi/ubah/upload', [SimulasiController::class, 'simulasi_ubah_upload_aksi']);

Route::get('/simulasi/tambah', [SimulasiController::class, 'simulasi_tambah']);
Route::post('/simulasi/tambah', [SimulasiController::class, 'simulasi_tambah_aksi']);


Route::get('/simulasi/hasil/{id}', [SimulasiController::class, 'simulasi_hasil']);

Route::get('/pemodelan/grafik', [HomeController::class, 'pemodelan_grafik']);

