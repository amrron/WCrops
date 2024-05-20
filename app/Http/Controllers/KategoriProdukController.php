<?php

namespace App\Http\Controllers;

use App\Models\KategoriProduk;
use Illuminate\Http\Request;

class KategoriProdukController extends Controller
{
    public function update(Request $request) {
        $request->validate([
            'id' => 'required|string',
            'nama_kategori' => 'required|string'
        ]);

        KategoriProduk::whereId($request->id)->update([
            'nama_kategori' => $request->nama_kategori
        ]);

        // return response()->json([
        //     'status' => true,
        //     'message' => 'Berhasil merubah nama kategori'
        // ], 201);

        return back()->with('status', 'Berhasil merubah nama kategori');
    }

    public function show(KategoriProduk $kategori) {
        return response()->json([
            'status' => true,
            'nama_katgori' => $kategori->nama_kategori
        ], 201); 
    }

    public function store(Request $request) {
        $data = $request->validate([
            'nama_kategori' => 'required|string'
        ]);

        KategoriProduk::create($data);

        // return response()->json([
        //     'status' => true,
        //     'message' => 'Berhasil membuat kategori'
        // ], 201);

        return back()->with('status', 'Berhasil menambahkan kategori');
    }
}
