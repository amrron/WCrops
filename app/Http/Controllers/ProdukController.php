<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\KategoriProduk;
use App\Http\Resources\ProdukResource;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreProdukRequest;
use App\Http\Requests\UpdateProdukRequest;
use App\Models\TransaksiItem;
use App\Models\Ulasan;
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

            $produk['slug'] = Str::slug($produk['nama'], '-') . '-' . rand(10, 99);

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
        else {
            $ulasans = Ulasan::where('produk_id', $produk->id)->get();
            return view('detail-produk', [
                'produk' => $produk,
                'ulasans' => $ulasans
            ]);
        }
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
            $produk->berat = $request->berat;
            $produk->kategori_id = $request->kategori_id;
            $produk->deskripsi = $request->deskripsi;
            $produk->status = $request->status;
            
            if ($produk->nama != $request->nama) {
                $produk->slug = Str::slug($request->nama, '-') . '-' . rand(10, 99);
            }

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
            Storage::delete($produk->gambar);
            $produk->delete();

            return response()->json([
                'status' => true,
                'message' => 'Berhasil menghapus produk.'
            ], 201);
        }
    }

    public function indexAdmin(Request $request) {
        if($request->wantsJson() || $request->ajax()){
            $produks = Produk::filter(request(['search']))->get();

            return response()->json([
                'status' => true,
                'data' => ProdukResource::collection($produks),
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

    public function getProductName(Request $request) {
        if($request->wantsJson() || $request->ajax()){
            $namaProduk = Produk::whereIn('id', $request->productId)
                    ->select('nama')->get();
            
            return response()->json([
                'status' => true,
                'data' => $namaProduk,
            ], 201);
        }
    }

    public function nonactiveStatus(Request $request) {
        if($request->wantsJson() || $request->ajax()){
            Produk::whereIn('id', $request->productId)
                    ->update([
                        'status' => 0,
                    ]);

            return response()->json([
                'status' => true,
            ], 201);
        }
    }

    public function deleteSelected(Request $request) {
        if($request->wantsJson() || $request->ajax()){
            $produks = Produk::whereIn('id', $request->productId)->get();

            foreach ($produks as $produk) {
                Storage::delete($produk->gambar);
                $produk->delete();
            }

            return response()->json([
                'status' => true,
            ], 201);
        }
    }
}
