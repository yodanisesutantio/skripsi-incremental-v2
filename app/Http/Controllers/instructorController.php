<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class instructorController extends Controller
{
    public function index() {
        $view = 'home.instructor';
    
        return view($view, [
            "pageName" => "Beranda | ",
        ]);
    }

    public function profile() {
        return view('profile.instructor-profile', [
            "pageName" => "Profil Anda | ",
        ]);
    }

    public function editProfile() {
        return view('profile.edit-instructor-profile', [
            "pageName" => "Ubah Profil Anda | ",
        ]);
    }
}
