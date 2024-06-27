<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
}
