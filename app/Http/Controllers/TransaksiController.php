<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\TransaksiItem;
use Illuminate\Support\Facades\Http;
use App\Http\Requests\StoreTransaksiRequest;
use App\Http\Requests\UpdateTransaksiRequest;
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

    public function checkoutIndex() {
        $transaksi = Transaksi::where('user_id', auth()->id())->where('status', 'onhold')->first();

        $response = Http::withHeaders([
            'content-type' => 'application/json',
            'authorization' => 'biteship_test.eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJuYW1lIjoidGVzdCIsInVzZXJJZCI6IjY2MmIxZGY5OWQ5N2E0MDAxMTAyOGFkYyIsImlhdCI6MTcxNDEwMjg1Nn0.TfYCdNg5y6q0fdvmvnWRMsbssEG9cu60NhWOvFvTIVc',
        ]);

        $get_origin = $response->get('https://api.biteship.com/v1/maps/areas', [
            'countries' => 'ID',
            'input' => 'Tanah Sareal, Bogor, Jawa Barat. 16162',
            'type' => 'double'
        ]);
        
        $origin = json_decode($get_origin->body());

        $origin_id =  $origin->areas[0]->id;

        $get_destination = $response->get('https://api.biteship.com/v1/maps/areas', [
            'countries' => 'ID',
            'input' => 'Nogosari, Boyolai, Jawa Tengah',
            'type' => 'double'
        ]);

        $destination = json_decode($get_destination->body());

        $destination_id =  $destination->areas[0]->id;

        $get_courire_rate = $response->post('https://api.biteship.com/v1/rates/couriers', [
            'origin_area_id' => $origin_id,
            'destination_area_id' => $destination_id,
            'couriers' => 'jne,jnt,tiki,ninja,wahna,pos,anteraja',
            'items' => [
                [
                    'name' => 'Jamur',
                    'value' => 'value',
                    'quantity' => 1,
                    'weight' => 1000
                ]
            ]
        ]);

        $courire_rate = json_decode($get_courire_rate->body());

        // dd($courire_rate);

        // return response()->json($courire_rate->pricing);

        return view('checkout', [
            'transaksi' => $transaksi,
            'ongkir' => $courire_rate
        ]);
    }
}
