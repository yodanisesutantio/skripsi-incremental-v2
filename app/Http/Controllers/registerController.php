<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class registerController extends Controller
{
    public function index() {
        return view('/register', [
            'pageName' => "Daftar Akun | "
        ]);
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'fullname' => ['required', 'max:255'],
            'username' => ['required', 'min:3', 'max:255', 'unique:users'],
            'phone_number' => ['required', 'min:10', 'max:20', 'unique:users'],
            'password' => ['required', 'min:5', 'max:255']
        ],[
            'fullname.required' => 'Kolom ini harus diisi',
            'fullname.max' => 'Nama terlalu panjang',
            'username.required' => 'Kolom ini harus diisi',
            'username.min' => 'Username terlalu pendek',
            'username.max' => 'Username terlalu panjang',
            'username.unique' => 'Username sudah digunakan',
            'phone_number.required' => 'Kolom ini harus diisi',
            'phone_number.min' => 'Nomor terlalu pendek',
            'phone_number.max' => 'Nomor terlalu panjang',
            'phone_number.unique' => 'Nomor sudah terdaftar, gunakan nomor berbeda',
            'password.required' => 'Kolom ini harus diisi',
            'password.min' => 'Password minimal berisi 5 karakter',
            'password.max' => 'Password terlalu panjang',
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['phone_number'] = preg_replace('/^(0|62)/', '+62', $validatedData['phone_number']);

        User::create($validatedData);

        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required']
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $role = $user->role;
          
            $request->session()->regenerate();
            Session::flash('success', 'Pendaftaran Akun Berhasil!');
          
            return redirect()->intended('/' . $role . '-index');
        }

        return back()->withErrors([
            'username' => 'Periksa kembali username anda',
        ])->onlyInput('username');
    }
}
