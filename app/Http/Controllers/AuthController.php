<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Models\User;
use App\Models\RecoverCode;
use App\Models\RegisterVerif;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function resetpassword_verif($id)
    {
        return view('changepassword', [
            'id' => $id
        ])->with('alert', 'silahkan masukkan password baru');
    }

	public function changepassword_aksi(Request $request)
	{
		$id = $request->id;
		$password = $request->password;
		$konfirmasipassword = $request->konfirmasipassword;
		if ($password == $konfirmasipassword) {
			$data = RecoverCode::where('code', $id)
			->first();
			if ($data) {
				if ($data->status == 0) {
					$data2 = RecoverCode::where('code', $id)
					->update([
						'status' => 1
					]);
					$data3 = User::where('email', $data->email)
					->update([
						'password' => $password
					]);
			        return redirect('login')->with('sukses', 'silahkan login menggunakan password baru');
			    } else {
		        	return redirect('login')->with('gagal', 'anda sudah melalukan verifikasi ke akun tersebut');
		    	}
			} else {
		        return redirect('login')->with('gagal', 'code tidak di kenal');
			}
		} else {
			return redirect('register')->with('gagal', 'Password tidak sama!');
		}
	}

	public function resetpassword(Request $request)
	{
		if ($request->session()->has('email')) {
			return redirect('/dashboard');
		} else {
			return view('resetpassword');
		}
	}

	public function resetpassword_aksi(Request $request)
	{
		$email = $request->email;
		// $number = rand(1111, 9999);
		$data = User::where('email', $email)
		->first();
		// $data = DB::table('user')->where([
		// 	['email', $email]
		// ])->first();
		if ($data) {
			if ($data->status == 1) {
				$data2 = RecoverCode::where('email', $email)
				->where('status', 0)
				->first();
				// $data2 = DB::table('recovercode')->where([
				// 	['email', $email],
				// 	['status', 0]
				// ])->first();
				if ($data2) {
					return redirect('resetpassword')->with('sukses', 'Tautan untuk mengganti password sudah dikirim ke email.');
				} else {
					// $tanggalnya = "abc";
					// $mntsetelahnya1 = "def";
				    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
				    $charactersLength = strlen($characters);
				    $randomString = '';
				    for ($i = 0; $i < 20; $i++) {
				        $randomString .= $characters[rand(0, $charactersLength - 1)];
				    }

					$datainsert['email'] = $email;
					$datainsert['code'] = $randomString;
					$datainsert['status'] = 0;
			
					$model = new RecoverCode();
					$model->fill($datainsert);
					$isSuccess = $model->save();


					// DB::table('recovercode')->insert([
					// 	'email' => $email,
					// 	'code' => $randomString,
					// 	// 'datecreate' => $tanggalnya,
					// 	// 'expire' => $mntsetelahnya1,
					// 	'status' => 0
					// ]);
				    // echo "<a href='http://127.0.0.1:8000/resetpassword/verif/".$randomString."'>http://127.0.0.1:8000/resetpassword/verif/".$randomString."</a>";
					$to_name = 'arusku';
			        $to_email = $email;
			        $data = array('create'=>"arusku", "number"=>"resetpassword/verif/".$randomString, "pesan"=>"Silahkan klik link untuk lakukan ubah password", "tombol"=>"Reset Password");
			    	Mail::send('emails.mail', $data, function($message) use ($to_name, $to_email) {
			            $message->to($to_email, $to_name)
			                    ->subject('Testing!');
			            $message->from('arusku.info@gmail.com','arusku');
			        });
					return redirect('resetpassword')->with('sukses', 'Mohon verifikasi melalui email anda');
				}
			} else {
				return redirect('resetpassword')->with('gagal', 'Akun anda di nonaktif, mohon hubungi admin!');
			}
		} else {
			return redirect('resetpassword')->with('gagal', 'Email anda tidak terdaftar!');
		}
	}

	public function login(Request $request)
	{
		if ($request->session()->has('email')) {
			return redirect('/dashboard');
		} else {
			return view('login');
		}
	}

	public function login_aksi(Request $request)
	{
		$email = $request->email;
		$password = $request->password;
		$data = User::where('email', $email)
		->first();
		if ($data) {
			if ($data->verif == 1) {
				if ($data->status == 1) {
					if ($password == $data->password) {
						$request->session()->put('id', $data->id);
						$request->session()->put('nama', $data->nama);
						$request->session()->put('email', $data->email);
						$request->session()->put('level', $data->level);
						$request->session()->put('login', TRUE);
						return redirect('/dashboard');
					} else {
						return redirect('login')->with('gagal', 'Password anda salah!');
					}
				} else {
					return redirect('login')->with('gagal', 'Akun anda di nonaktif, mohon hubungi admin!');
				}
			} else {
				return redirect('login')->with('gagal', 'Anda belum verifikasi melalui email!');
			}
		} else {
			return redirect('login')->with('gagal', 'Email anda tidak terdaftar!');
		}
	}

	public function register(Request $request)
	{
		if ($request->session()->has('email')) {
			return redirect('/dashboard');
		} else {
			return view('register');
		}
	}

    public function register_verif($id)
    {
		$data = RegisterVerif::where('code', $id)
		->where('status', 0)
		->first();
		$data2 = RegisterVerif::where('code', $id)
		->where('status', 0)
		->update([
			'status' => 1
		]);
		$data3 = User::where('email', $data->email)
		->update([
			'verif' => 1
		]);
        return redirect('login')->with('sukses', 'akun anda telah terverifikasi, silahkan login');
    }

	public function register_aksi(Request $request)
	{
		$nama = $request->nama;
		$email = $request->email;
		$password = $request->password;
		$konfirmasipassword = $request->konfirmasipassword;
		if (strlen($password) < 9) {
			if ($password == $konfirmasipassword) {
				$data5 = User::where('email', $email)
				->first();
				// $data5 = DB::table('user')->where([
				// 	['email', $email]
				// ])->first();
				$testing = Registerverif::where('email', $email)
				->first();
				// $testing = DB::table('registerverif')->where([
				// 	['email', $email]
				// ])->first();
				if ($data5) {
					return redirect('register')->with('gagal', 'email sudah di gunakan, silahkan gunakan email lain');
				} else {
					$data['foto'] = 'avatar.png';
					$data['nama'] = $nama;
					$data['email'] = $email;
					$data['password'] = $password;
					$data['level'] = 'Mahasiswa';
					$data['status'] = 1;
					$data['verif'] = 0;
					$data['tanggal'] = date('Y-m-d H:i:s');
			
					$model = new User();
					$model->fill($data);
					$isSuccess = $model->save();


					// DB::table('user')->insert([
					// 	'foto' => 'avatar.png',
					// 	'nama' => $nama,
					// 	'email' => $email,
					// 	'password' => $password,
					// 	'level' => 'Mahasiswa',
					// 	'status' => 1,
					// 	'verif' => 0,
					// 	'tanggal' => date('Y-m-d H:i:s')
					// ]);
					$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
					$charactersLength = strlen($characters);
					$randomString = '';
					for ($i = 0; $i < 20; $i++) {
						$randomString .= $characters[rand(0, $charactersLength - 1)];
					}
					$to_name = 'arusku';
					$to_email = $email;

					$data['email'] = $email;
					$data['code'] = $randomString;
					$data['status'] = 0;
			
					$model = new RegisterVerif();
					$model->fill($data);
					$isSuccess = $model->save();


					// DB::table('registerverif')->insert([
					// 	'email' => $email,
					// 	'code' => $randomString,
					// 	'status' => 0
					// ]);
					$data = array('create'=>"arusku", "number"=>"register/verif/".$randomString, "pesan"=>"Silahkan klik untuk verifikasi akun anda!", "tombol"=>"Verifikasi");
					try {
						Mail::send('emails.mail', $data, function($message) use ($to_name, $to_email) {
							$message->to($to_email, $to_name)
									->subject('Verification!');
							$message->from('arusku.info@gmail.com','arusku');
						});
					} catch (Throwable $e) {
						return redirect('register')->with('gagal', $e);
					}
					return redirect('login')->with('sukses', 'Registrasi Berhasil, silahkan cek email anda!');
				}
			} else {
				return redirect('register')->with('gagal', 'Password tidak sama!');
			}
		} else {
			return redirect('register')->with('gagal', 'Password harus di bawah 8 karakter!');
		}
	}

	public function logout(Request $request)
	{
		$request->session()->forget('email');
		return redirect('login');
	}

	// public function generateRandomString($length = 10)
	// {
	//     $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	//     $charactersLength = strlen($characters);
	//     $randomString = '';
	//     for ($i = 0; $i < $length; $i++) {
	//         $randomString .= $characters[rand(0, $charactersLength - 1)];
	//     }
	//     return $randomString;
	// }
}
