<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use App\Http\Requests\StoreWishlistRequest;
use App\Http\Requests\UpdateWishlistRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wishlists = Wishlist::where('user_id', auth()->id())->get();

        return view('wishlist', [
            'wishlists' => $wishlists
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
    public function store(StoreWishlistRequest $request)
    {
        if ($request->wantsJson() || $request->ajax()) {
            try {

                $data = $request->validated();
                $data['user_id'] = auth()->id();
                
                $wishlist = Wishlist::where('user_id', $data['user_id'])
                                    ->where('produk_id', $data['produk_id'])->first();

                $successMessage = 'Produk berhasil ditambahkan ke wishlist.';

                if ($wishlist) {
                    $wishlist->delete();
                    $successMessage = 'Produk berhasil dihapus dari wishlist.';
                }
                else {
                    Wishlist::create($data);
                }

                return response()->json([
                    'status' => true,
                    'message' => $successMessage,
                ], 201);

            } catch (ValidationException $e) {
                return response()->json([
                    'status' => false,
                    'message' => $e->getMessage(),
                ], 422);
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Wishlist $wishlist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Wishlist $wishlist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWishlistRequest $request, Wishlist $wishlist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Wishlist $wishlist, Request $request)
    {
        if ($request->wantsJson() || $request->ajax()) {
            $wishlist->delete();

            return response()->json([
                'status' => true,
                'message' => 'Produk berhasil dikeluarkan dari wishlist.',
            ], 201);
        }

        return abort(404);
    }
}
