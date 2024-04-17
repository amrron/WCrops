<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use App\Models\KategoriProduk;
use App\Http\Resources\ProdukResource;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreProdukRequest;
use App\Http\Requests\UpdateProdukRequest;
use Illuminate\Validation\ValidationException;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProdukRequest $request)
    {
        try {
            $produk = $request->validated();

            if($request->file('gambar')){
                $produk['gambar'] = $request->file('gambar')->store('upload');
            }

            $produk = Produk::create($produk);

            return response()->json([
                'status' => true,
                'message' => 'Produk baru berhasil ditambahkan.',
            ], 201);
        } catch (ValidationException $e) {
            return response()->json([
                'status' => false,
                'errors' => $e->errors()
            ], 422);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Produk $produk, Request $request)
    {
        if($request->wantsJson() || $request->ajax()){
            return response()->json([
                'status' => true,
                'data' => new ProdukResource($produk),
            ], 201);
        }
        return abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produk $produk, UpdateProdukRequest $request)
    {
        if($request->wantsJson() || $request->ajax()){
            $request->validated();
            $produk->nama = $request->nama;
            $produk->harga = $request->harga;
            $produk->stok = $request->stok;
            $produk->kategori_id = $request->kategori_id;
            $produk->deskripsi = $request->deskripsi;
            $produk->status = $request->status;


            if($request->file('gambar')){
                Storage::delete($produk->gambar);
                
                $produk->gambar = $request->file('gambar')->store('upload');
            }

            $produk->save();

            return response()->json([
                'status' => true,
                'message' => 'Berhasil merubah data produk.'
            ], 201);
        }
        return abort(404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProdukRequest $request, Produk $produk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produk $produk, Request $request)
    {
        if($request->wantsJson() || $request->ajax()){
            $produk->delete();

            return response()->json([
                'status' => true,
                'message' => 'Berhasil menghapus produk.'
            ], 201);
        }
    }

    public function indexAdmin(Request $request) {
        if($request->wantsJson() || $request->ajax()){
            return response()->json([
                'status' => true,
                'data' => ProdukResource::collection(Produk::all()),
            ], 201);
        };
        return view('admin.produk', [
            'kategoris' => KategoriProduk::all(),
            'produks' => Produk::all(),
        ]);
    }

    public function changeStatus(Produk $produk, Request $request) {
        if($request->wantsJson() || $request->ajax()){
            $produk->update([
                'status' => $request->status
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Berhasil mengubah status produk.'
            ], 201);
        }
    }
}
