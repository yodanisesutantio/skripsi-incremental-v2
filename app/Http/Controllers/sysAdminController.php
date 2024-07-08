<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class sysAdminController extends Controller
{
    public function index() {
        $view = 'home.kemudi';
        $users = User::all();
    
        return view($view, [
            "pageName" => "Dashboard Sistem | ",
            "users" => $users
        ]);
    }
}
