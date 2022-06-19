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

Route::get('/', [LandingController::class, 'index']);

Route::post('/changepassword/aksi', [AuthController::class, 'changepassword_aksi']);

Route::get('/resetpassword', [AuthController::class, 'resetpassword']);

Route::post('/resetpassword/aksi', [AuthController::class, 'resetpassword_aksi']);

Route::get('/resetpassword/verif/{id}', [AuthController::class, 'resetpassword_verif']);

Route::get('/login', [AuthController::class, 'login']);

Route::post('/login/aksi', [AuthController::class, 'login_aksi']);

Route::get('/register', [AuthController::class, 'register']);

Route::post('/register/aksi', [AuthController::class, 'register_aksi']);

Route::get('/register/verif/{id}', [AuthController::class, 'register_verif']);

Route::get('/logout', [AuthController::class, 'logout']);

Route::get('/dashboard', [HomeController::class, 'index']);

Route::get('/profil/password', [HomeController::class, 'profil_password']);

Route::get('/profil/admin', [ProfileController::class, 'profil_admin']);
Route::post('/profil/admin', [ProfileController::class, 'profil_admin_update']);

Route::get('/profil/mahasiswa', [ProfileController::class, 'profil_mahasiswa']);
Route::post('/profil/mahasiswa', [ProfileController::class, 'profil_mahasiswa_update']);

Route::get('/profil/user/{id}', [KelolaUserController::class, 'profil_user']);
Route::post('/profil/user', [KelolaUserController::class, 'profil_user_update']);

Route::post('/password/update', [ProfileController::class, 'password_update']);

Route::get('/simulasi', [SimulasiController::class, 'simulasi']);
Route::get('/simulasi/hapus/{id}', [SimulasiController::class, 'simulasi_hapus']);

Route::get('/simulasi/upload', [SimulasiController::class, 'simulasi_upload']);
Route::post('/simulasi/upload', [SimulasiController::class, 'simulasi_upload_aksi']);

Route::get('/kelola/tentang', [KelolaBerandaController::class, 'kelola_tentang']);
Route::get('/kelola/kontak', [KelolaBerandaController::class, 'kelola_kontak']);
Route::post('/dashboard/aksi', [KelolaBerandaController::class, 'dashboard_aksi']);
Route::post('/kontak/aksi', [KelolaBerandaController::class, 'kontak_aksi']);

Route::get('/kelola/user', [KelolaUserController::class, 'kelola_user']);
Route::get('/user/hapus/{id}', [KelolaUserController::class, 'user_hapus']);
Route::get('/user/disable/{id}/{status}', [KelolaUserController::class, 'user_disable']);
