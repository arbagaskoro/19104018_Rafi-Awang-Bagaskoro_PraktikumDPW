<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyController extends Controller
{
    //membuat view dengan nama beranda
    public function index() {
        return view('beranda');
    }

    //mendefisikan isi dari @yield sehingga kode html pada file beranda.blade.php dan base.blade.php dapat saling terhubung
    public function about() {
        return view('about');
    }
}
