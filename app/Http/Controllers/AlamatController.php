<?php

namespace App\Http\Controllers;

use App\Models\Alamat;
use App\Http\Requests\StoreAlamatRequest;
use App\Http\Requests\UpdateAlamatRequest;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AlamatController extends Controller
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
    public function store(StoreAlamatRequest $request)
    {
        if ($request->wantsJson() || $request->ajax()) {
            try {
                $alamat = $request->validated();
                $alamat['user_id'] = auth()->id();
                $alamat['selected'] = Alamat::where('user_id', auth()->id())->where('selected', 1)->exists() ? 0 : 1;
                $alamat = Alamat::create($alamat);

                return response()->json([
                    'status' => true,
                    'message' => 'Alamat baru berhasil ditambahkan.',
                ], 201);
            } catch (ValidationException $e) {
                return response()->json([
                    'status' => false,
                    'errors' => $e->errors()
                ], 422);
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Alamat $alamat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alamat $alamat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAlamatRequest $request, Alamat $alamat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alamat $alamat)
    {
        //
    }

    public function changeSelected(Request $request)
    {
        if ($request->wantsJson() || $request->ajax()) {
            Alamat::where('user_id', auth()->id())->update([
                'selected' => 0
            ]);

            Alamat::where('id', $request->id)->update([
                'selected' => 1
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Berhasil merubah alamat pengiriman',
            ], 201);
        }
    }
}
