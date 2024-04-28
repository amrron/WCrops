<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\TransaksiItem;
use Illuminate\Support\Facades\Http;
use App\Http\Requests\StoreTransaksiRequest;
use App\Http\Requests\UpdateTransaksiRequest;
use App\Http\Resources\ShipmentItemsResource;
use Illuminate\Validation\ValidationException;

class TransaksiController extends Controller
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
    public function store(StoreTransaksiRequest $request)
    {
        try {
            $data = $request->validated();

            $data['user_id'] = auth()->id();
            $data['status'] = 'onhold';

            $oldTransaksi = Transaksi::where('user_id', auth()->id())->where('status', 'onhold')->first();
            if ($oldTransaksi) {
                TransaksiItem::where('transaksi_id', $oldTransaksi->id)->delete();
                $oldTransaksi->delete();
            }

            $transaksi = Transaksi::create($data);

            foreach ($data['transaksiItem'] as $item) {
                TransaksiItem::create([
                    'transaksi_id' => $transaksi->id,
                    'produk_id' => $item['produk_id'],
                    'jumlah' => $item['jumlah']
                ]);
            }

            return response()->json([
                'status' => true,
                'message' => 'Transaksi berhasil dibuat.',
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
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTransaksiRequest $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaksi $transaksi)
    {
        //
    }

    public function checkoutIndex()
    {
        $transaksi = Transaksi::where('user_id', auth()->id())->where('status', 'onhold')->first();

        $items = new ShipmentItemsResource($transaksi);

        $response = Http::withHeaders([
            'content-type' => 'application/json',
            'authorization' => 'biteship_live.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJuYW1lIjoidGVzdCBub24gdGVzdGluZyIsInVzZXJJZCI6IjY2MmIxZGY5OWQ5N2E0MDAxMTAyOGFkYyIsImlhdCI6MTcxNDExMDM4NX0.YOCleAAP4MDDCuH5FVWoeB6Mikc8MN8hXHKkmD8X_Y8',
        ]);

        $get_origin = $response->get('https://api.biteship.com/v1/maps/areas', [
            'countries' => 'ID',
            'input' => 'Tanah Sareal, Bogor, Jawa Barat. 16162',
            'type' => 'single'
        ]);

        $origin = json_decode($get_origin->body());

        $origin_id =  $origin->areas[0]->id;

        $get_destination = $response->get('https://api.biteship.com/v1/maps/areas', [
            'countries' => 'ID',
            'input' => 'Cikarang Selatan, Bekasi, Jawa Barat',
            'type' => 'single'
        ]);

        $destination = json_decode($get_destination->body());

        $destination_id =  $destination->areas[0]->id;

        $get_courire_rate = $response->post('https://api.biteship.com/v1/rates/couriers', [
            'origin_area_id' => $destination_id,
            'destination_area_id' => $origin_id,
            // 'origin_postal_code' => 16162,
            // 'destination_postal_code' => 17530,
            'couriers' => 'jne,jnt,sicepat,tiki,ninja',
            'items' => $items
        ]);

        $courire_rate = json_decode($get_courire_rate->body());

        // dd($courire_rate);

        // return response()->json($courire_rate);

        return view('checkout', [
            'transaksi' => $transaksi,
            'ongkir' => $courire_rate
        ]);
    }
}
