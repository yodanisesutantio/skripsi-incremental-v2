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
}
