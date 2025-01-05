<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function logIndex()
    {
        return view('page/auth/login');
    }

    public function regIndex()
    {
        return view('page/auth/register');
    }

    public function login(Request $req)
    {
        $user = User::where('email', $req->email)->first();

        if ($user) {
            if(Hash::check($req->password, $user->password)){

                $credential = [
                    'email' => $req->email,
                    'password' => $req->password,
                ];

                if(Auth::attempt($credential)){
                    $req->session()->regenerate();
 
                    return redirect()->intended('admin/dashboard');
                }else {
                    return redirect()->back()->with('error', 'Anda tidak bisa login');
                }
            }else {
                return redirect()->back()->with('error', 'Password Salah');
            }
        }else {
            return redirect()->back()->with('error', 'Akun tidak ditemukan');
        }

    }

    public function register(Request $req)
    {
        $validator = Validator::make($req->all(), [
            'email' => 'required|unique:users,email',
            'nama' => 'required',
            'email' => 'required',
            'password' => 'required',
            'conf_pass' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', 'Akun sudah terdaftar/seluruh fiels harus diisi');
        }

        $data = [
            'name' => $req->nama,
            'email' => $req->email,
            'password' => Hash::make($req->password),
        ];

        if(User::create($data)) {
            return redirect('login')->with('success', 'Berhasil mendaftar akun');
        }else {
            return redirect()->back()->with('error', 'Tidak bisa mendaftar akun');
        }

    }

    public function logout() 
    {
        Auth::logout();

        return redirect('/');
    }
}
