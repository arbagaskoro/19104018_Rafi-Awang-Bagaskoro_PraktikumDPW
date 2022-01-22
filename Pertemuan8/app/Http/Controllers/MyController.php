<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyController extends Controller
{
    // function untuk mengakses beranda
    public function index()
    {
        return view('beranda');
    }

    // function untuk mengakses beranda
    public function about()
    {
        return view('about');
    }


    // function untuk mengakses beranda
    public function mahasiswa()
    {
        return view('mahasiswa');
    }
}
