<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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
            'password' => ['required', 'min:5', 'max:255']
        ],[
            'fullname.required' => 'Kolom ini harus diisi',
            'fullname.max' => 'Nama terlalu panjang',
            'username.required' => 'Kolom ini harus diisi',
            'username.min' => 'Username terlalu pendek',
            'username.max' => 'Username terlalu panjang',
            'username.unique' => 'Username sudah digunakan',
            'password.required' => 'Kolom ini harus diisi',
            'password.min' => 'Password minimal berisi 5 karakter',
            'password.max' => 'Password terlalu panjang',
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);

        User::create($validatedData);

        return redirect('/app-intro');
    }
}
