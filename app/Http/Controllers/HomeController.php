<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        return view('dashboard', [
            'produks' => Produk::active()->get()
        ]);
    }
}
