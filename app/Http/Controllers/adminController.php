<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminController extends Controller
{
    public function index() {
        $view = 'home.admin';
    
        return view($view, [
            "pageName" => "Beranda | ",
        ]);
    }
}
