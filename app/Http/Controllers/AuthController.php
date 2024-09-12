<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal', 'Login gagal, silakan cek kembali data yang Anda masukkan.');
            return back()->withErrors($validator)->withInput();
        }

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            Alert::success('Hore!', 'Login berhasil');
            if(Auth::user()->role_type==0){
                return redirect()->route('home');
            }
            else if(Auth::user()->role_type==1){
                return redirect()->route('admin.home');
            }
            else if(Auth::user()->role_type==2){
                return redirect()->route('superadmin.home');
            }
            return redirect()->route('index');
        }

        Alert::error('Gagal', 'Email atau password salah.');
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->withInput();
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $messages = [
            'email.unique' => 'Email ini sudah pernah didaftarkan, silakan gunakan email lain.',
            'password.min' => 'Password harus terdiri dari minimal 8 karakter.',
            'password.confirmed' => 'Password dan konfirmasi password tidak sama.',
        ];

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ], $messages);

        if ($validator->fails()) {
            Alert::error('Gagal', 'Registrasi gagal, silakan cek kembali data yang Anda masukkan.');
            return back()->withErrors($validator)->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_type' => 0, 
        ]);

        Auth::login($user);

        Alert::success('Hore!', 'Registrasi berhasil');
        return redirect()->route('home');
    }
}
