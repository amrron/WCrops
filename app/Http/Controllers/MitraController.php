<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMitraRequest;
use App\Models\Mitra;
use Illuminate\Http\Request;

class MitraController extends Controller
{
    public function store(Request $request) {
        $data = $request->validate([
            'nama' => 'required|string',
            'nama_usaha' => 'required|string',
            'alamat_usaha' => 'required|string',
            'no_hp' => 'required|string',
            'email' => 'required|string'
        ]);

        $mitra = Mitra::create($data);

        if ($mitra) {
            return back()->with('status', 'Berhasil mendaftarkan mitra! Anda akan segera dihubungi untuk konfirmasi.');
        } 

        return back()->with('fail', 'Gagal mendaftarkan mitra!');
    }

    public function index() {
        return view('mitra');
    }
}
