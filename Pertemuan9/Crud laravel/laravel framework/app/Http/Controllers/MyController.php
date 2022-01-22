<?php

namespace App\Http\Controllers;

use Facade\FlareClient\View;
use Illuminate\Http\Request;

class MyController extends Controller
{
    // function untuk mengakses beranda
    public function index(){
        return view('beranda');
    }

    // function untuk mengakses beranda
    public function about(){
        return view('about');
    }
}
