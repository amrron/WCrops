<?php

namespace App\Http\Controllers;

use App\Models\KategoriProduk;
use App\Models\Produk;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        return view('produk', [
            'produks' => Produk::active()->filter(request(['search', 'kategori']))->get(),
            'kategoris' => KategoriProduk::all()
        ]);
    }

    public function home() {
        return view('home', [
            'produks' => Produk::active()->take(4)->get()
        ]);
    }
}
