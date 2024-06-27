<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class userController extends Controller
{
    public function index() {
        $view = 'home.user';
    
        return view($view, [
            "pageName" => "Beranda | ",
        ]);
    }

    public function profile() {
        return view('profile.user-profile', [
            "pageName" => "Profil Anda | ",
        ]);
    }

    public function editProfile() {
        return view('profile.edit-user-profile', [
            "pageName" => "Ubah Profil Anda | ",
        ]);
    }

    public function update(Request $request, User $user) {
        $rules = [
            'fullname' => ['required', 'max:255'],
            'username' => ['required', 'min:3', 'max:255', 'unique:users'],
            'age' => ['min:2', 'max:2'],
            'description' => ['max:255'],
            'phone_number' => ['required', 'min:10', 'max:20', 'unique:users'],
            'password' => ['required', 'min:5', 'max:255']
        ];

        if($request->username != $user->username) {
            $rules['username'] = 'required|min:3|max:255:unique:users';
        }

        $validatedData = $request->validate($rules);
    }

    public function destroy(Request $request)
    {
        $user = Auth::user();
        $request->session()->flash('success', 'Login Berhasil');

        Auth::logout();

        $user->delete();

        return redirect('/');
    }
}
