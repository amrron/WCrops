<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Ulasan;
use Illuminate\Http\Request;

class UlasanController extends Controller
{
    public function store(Request $request) {
        $request->validate([
            'transaksi_id' => 'required|string',
            'produk_id.*' => 'required|string',
            'nilai.*' => 'required|numeric',
            'ulasan.*' => 'required|string',
        ]);

        foreach ($request->nilai as $key=> $nilai) {
            Ulasan::create([
                'transaksi_id' => $request->transaksi_id,
                'produk_id' => $request->produk_id[$key],
                'nilai' => $request->nilai[$key],
                'ulasan' => $request->ulasan[$key],
            ]);
        }

        return back()->with('success', 'Berhasil menyimpan ulasan');
    }
}
