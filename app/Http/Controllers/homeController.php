<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class homeController extends Controller
{
    public function tamu() {        
        // dd(auth()->user());
        return view('home.tamu', [
            "pageName" => "Selamat Datang di "
        ]);

    }
}
