<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use App\Http\Requests\StoreKeranjangRequest;
use App\Http\Requests\UpdateKeranjangRequest;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class KeranjangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $keranjangs = Keranjang::where('user_id', auth()->id())->get();

        return view('keranjang', [
            'keranjangs' => $keranjangs,
        ]);
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
    public function store(StoreKeranjangRequest $request)
    {
        if ($request->wantsJson() || $request->ajax()) {
            try {
                $data = $request->validated();

                $data['user_id'] = auth()->id();
                $data['jumlah'] = 1;

                $keranjang = Keranjang::where('user_id', auth()->id())->where('produk_id', $data['produk_id'])->first();

                if ($keranjang) {
                    $keranjang->increment('jumlah');
                } else {
                    Keranjang::create($data);
                }

                return response()->json([
                    'status' => true,
                    'message' => 'Produk berhasil ditambahkan ke keranjang.',
                ], 201);
            } catch (ValidationException $e) {
                return response()->json([
                    'status' => false,
                    'errors' => $e->errors()
                ], 422);
            }
        }

        return abort(404);
    }

    /**
     * Display the specified resource.
     */
    public function show(Keranjang $keranjang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Keranjang $keranjang)
    {
        // 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKeranjangRequest $request, Keranjang $keranjang)
    {
        if ($request->wantsJson() || $request->ajax()) {
            $request->validated();

            $keranjang->update([
                'jumlah' => $request->jumlah
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Jumlah produk berhasil diubah.',
                'data' => [
                    'jumlah' => $keranjang->jumlah
                ]
            ], 201);
        }

        return abort(404);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Keranjang $keranjang, Request $request)
    {
        if ($request->wantsJson() || $request->ajax()) {
            $keranjang->delete();

            return response()->json([
                'status' => true,
                'message' => 'Produk berhasil dikeluarkan dari keranjang.',
            ], 201);
        }

        return abort(404);
    }

    public function decrease(Keranjang $keranjang, Request $request){
        if ($request->wantsJson() || $request->ajax()) {
            $keranjang->decrement('jumlah');

            return response()->json([
                'status' => true,
                'message' => 'Produk berhasil dikurangi dari keranjang.',
            ], 201);
        }

        return abort(404);
    }

    public function destroySelected(Request $request){
        if ($request->wantsJson() || $request->ajax()) {
            
            $keranjangs = Keranjang::whereIn('id', $request->keranjangId)->get();

            foreach ($keranjangs as $keranjang) {
                $keranjang->delete();
            }

            return response()->json([
                'status' => true,
                'message' => 'Produk dipilih berhasil dihapus dari keranjang.',
            ], 201);
        }

        return abort(404);
    }
}
