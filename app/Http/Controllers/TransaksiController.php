<?php

namespace App\Http\Controllers;

use App\Models\Alamat;
use App\Models\Produk;
use App\Models\Keranjang;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Models\TransaksiItem;
use Illuminate\Support\Facades\DB;
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
        $transaksis = Transaksi::where('user_id', auth()->id())->checkout()->latest()->get();
        return view('transaksi', [
            'transaksis' => $transaksis
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

            foreach ($data['transaksiItem'] as $item) {
                if (Produk::find($item['produk_id'])->stok < $item['jumlah']) {
                    return response()->json([
                        'status' => false,
                        'message' => 'Stok produk tidak tersedia',
                    ], 400);
                }
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
    public function edit(Transaksi $transaksi, Request $request)
    {
        $request->validate([
            'status' => 'required|string'
        ]);

        $transaksi->update([
            'status' => $request->status
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Status transaksi berhasil dirubah'
        ], 201);
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
        $alamat = Alamat::where('user_id', auth()->id())->where('selected', 1)->first() ?? Alamat::where('user_id', auth()->id())->first();
        $alamats = Alamat::where('user_id', auth()->id())->get();

        if (!$transaksi) {
            return view('checkout');
        }

        if (!$alamat) {
            return view('checkout', [
                'transaksi' => $transaksi,
                'alamats' => $alamats,
            ]);
        }
        $items = new ShipmentItemsResource($transaksi);

        $response = Http::withHeaders([
            'content-type' => 'application/json',
            'authorization' => env('BITSHIP_API_KEY'),
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
            'input' => "$alamat->kecamatan, $alamat->kota, $alamat->provinsi",
            'type' => 'single'
        ]);

        $destination = json_decode($get_destination->body());

        $destination_id =  $destination->areas[0]->id;

        $get_courire_rate = $response->post('https://api.biteship.com/v1/rates/couriers', [
            'origin_area_id' => $destination_id,
            'destination_area_id' => $origin_id,
            'origin_postal_code' => 16162,
            'destination_postal_code' => $alamat->kode_pos,
            'couriers' => 'jne',
            'items' => $items
        ]);

        $courire_rate = json_decode($get_courire_rate->body());

        // dd($courire_rate);

        // return response()->json($courire_rate);

        return view('checkout', [
            'transaksi' => $transaksi,
            'ongkir' => $courire_rate,
            'alamat' => $alamat,
            'alamats' => $alamats,
        ]);
    }

    public function pay(Request $request)
    {
        $request->validate([
            'id' => 'required|string',
            'total_barang' => 'required|numeric',
            'total_ongkir' => 'required|numeric',
            'kurir' => 'required|string',
        ]);

        DB::beginTransaction();

        try {

            $transaksi = Transaksi::where('id', $request->id)->first();

            if ($transaksi->status == 'pending') {
                return response()->json([
                    'status' => true,
                    'message' => 'Transaksi sudah ada.',
                    'data' => [
                        'id' => $transaksi->id,
                        'snap_token' => $transaksi->snap_token,
                    ]
                ], 201);
            }

            $alamat = Alamat::where('user_id', auth()->id())->where('selected', 1)->first();
            $transaksiItems = TransaksiItem::where('transaksi_id', $transaksi->id)->get();
            
            foreach ($transaksiItems as $item) {
                if ($item->jumlah > $item->produk->stok) {
                    return response()->json([
                        'status' => false,
                        'message' => 'Transaksi gagal! Terdapat item yang melebihi stok produk.',
                    ], 400);
                }

                $item->produk()->decrement('stok', $item->jumlah);
            }

            // Set your Merchant Server Key
            \Midtrans\Config::$serverKey = config('midtrans.serverKey');
            // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
            \Midtrans\Config::$isProduction = config('midtrans.isProduction');
            // Set sanitization on (default)
            \Midtrans\Config::$isSanitized = config('midtrans.isSanitized');
            // Set 3DS transaction for credit card to true
            \Midtrans\Config::$is3ds = config('midtrans.is3ds');

            $order_id = rand();

            $itemDetails = [];

            foreach ($transaksi->transaksiItems as $item) {
                array_push($itemDetails, [
                    "id" => $item->id,
                    "price" => $item->produk->harga,
                    "quantity" => $item->jumlah,
                    "name" => $item->produk->nama,
                    "brand" => "WCorps",
                    "category" => $item->produk->kategori->nama_kategori,
                    "url" => env('APP_URL') . '/produk/' . $item->produk->slug
                ]);
            }

            $params = array(
                'transaction_details' => array(
                    'order_id' => $order_id,
                    'gross_amount' => $request->total_barang + $request->total_ongkir,
                ),
                'customer_details' => array(
                    'first_name' => auth()->user()->name,
                    'email' => auth()->user()->email,
                    'phone' => auth()->user()->no_hp ?? '',
                    'shipping_address' => array(
                        'first_name' => $alamat->penerima,
                        'phone' => $alamat->hp_penerima,
                        'address' => $alamat->lengkap,
                        'city' => $alamat->kota,
                        'postal_code' => $alamat->kode_pos,
                        'country_code' => 'IDN'
                    )
                ),
                'item_details' => $itemDetails
            );

            $snapToken = \Midtrans\Snap::getSnapToken($params);

            $transaksi->total_barang = $request->total_barang;
            $transaksi->total_ongkir = $request->total_ongkir;
            $transaksi->alamat_id = $alamat->id;
            $transaksi->kurir = $request->kurir;
            $transaksi->status = 'pending';
            $transaksi->snap_token = $snapToken;
            $transaksi->midtrans_order_id = $order_id;

            $transaksi->save();

            Keranjang::where('user_id', auth()->id())->whereIn('produk_id', $transaksi->transaksiItems->select('produk_id'))->delete();

            DB::commit();

            return response()->json([
                'status' => true,
                'message' => 'Pembuatan transaksi berhasil.',
                'data' => [
                    'id' => $transaksi->id,
                    'snap_token' => $snapToken,
                ]
            ], 201);
            
        } catch (\Throwable $th) {
            DB::rollback();

            return response()->json([
                'status' => false,
                'message' => 'Terjadi kesalahan. ' . $th->getMessage(),
            ], 400);
        }

    }

    public function status(Transaksi $transaksi, Request $request)
    {
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.serverKey');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = config('midtrans.isProduction');
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = config('midtrans.isSanitized');
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = config('midtrans.is3ds');

        $status = \Midtrans\Transaction::status($transaksi->midtrans_order_id);

        $message = [
            'capture' => 'Transaksi diproses',
            'settlement' => 'Transaksi berhasil',
            'pending' => 'Transaksi belum dilaksanakan',
            'cancel' => 'Transaksi dibatalkan',
            'expired' => 'Transaksi kadaluarsa'
        ];
        
        if ($request->wantsJson() || $request->ajax()){

            if ($transaksi->status != $status->transaction_status && !in_array($transaksi->status, ['onprocess', 'ondelivery', 'arrive', 'finished'])) {
                $new_status = $status->transaction_status;
                $transaksi->update([
                    'status' => $new_status
                ]);
            }

            return response()->json([
                'status' => $status,
                'message' => $message[$status->transaction_status],
                'transaksi' => $transaksi,
            ], 201);
        }

        return view('status-transaksi', [
            'status' => $status,
            'message' => $message[$status->transaction_status],
            'transaksi' => $transaksi,
        ]);
    }

    public function statusNotification(){
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.serverKey');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = config('midtrans.isProduction');
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = config('midtrans.isSanitized');
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = config('midtrans.is3ds');

        try {
            $notif = new \Midtrans\Notification();
        }
        catch (\Exception $e) {
            exit($e->getMessage());
        }
        
        $notif = $notif->getResponse();
        $transaction = $notif->transaction_status;
        $type = $notif->payment_type;
        $order_id = $notif->order_id;
        
        $transaksi = Transaksi::where('midtrans_order_id', $order_id)->first();

        $transaksi->update([
            'status' => $transaction,
        ]);

        echo "Payment using " . $type . " for transaction order_id: " . $order_id . " is " . $transaction;

    }

    public function indexAdmin() {
        $transaksis = Transaksi::whereNot('status', 'onhold')->latest()->get();

        return view('admin.pesanan', [
            'transaksis' => $transaksis
        ]);
    }

    public function setResi(Transaksi $transaksi, Request $request) {
        $request->validate([
            'ekspedisi' => 'required|string',
            'resi' => 'required|string',
        ]);

        $transaksi->update([
            'status' => 'ondelivery',
            'ekspedisi' => $request->ekspedisi,
            'resi' => $request->resi
        ]);

        return back()->with('success', 'Status transaksi berhasil dirubah');
    }

    public function trackingHistory(Transaksi $transaksi, Request $request) {
        $response = Http::withHeaders([
            'content-type' => 'application/json',
            'authorization' => env('BITSHIP_API_KEY'),
        ]);

        $history = $response->get("https://api.biteship.com/v1/trackings/$transaksi->resi/couriers/$transaksi->ekspedisi");
        return response()->json(json_decode($history->body()), 201);
    }

    public function buyAgain(Transaksi $transaksi, Request $request) {
        // if(!$request->wantsJson() || !$request->ajax()){
        //     return abort(404);
        // }

        foreach($transaksi->transaksiItems as $item) {
            Keranjang::create([
                'user_id' => auth()->id(),
                'produk_id' => $item->produk_id,
                'jumlah' => $item->jumlah,
            ]);
        }

        return redirect('/keranjang');

        // return response()->json([
        //     'status' => true,
        //     'message' => 'Berhasil menambahkan barang ke keranjang'
        // ], 201);
    }

    public function getTransaksiItem(Transaksi $transaksi, Request $request) {
        if ($request->wantsJson() || $request->ajax()){
            $transaksiItems = TransaksiItem::where('transaksi_id', $transaksi->id)->with('produk')->get();
            
            return response()->json([
                'status' => true,
                'data' => $transaksiItems,
            ], 201);
        }

        return abort(404);
    }

    public function review(Request $request) {
        $request->validate([
            'id.*' => 'required|string',
            'nilai.*' => 'required|numeric',
            'ulasan.*' => 'required|string|max:255',
        ]);

        foreach ($request->id as $key=> $id) {
            $transaksiItem = TransaksiItem::find($id);

            $transaksiItem->update([
                'nilai' => $request->nilai[$key],
                'ulasan' => $request->ulasan[$key],
            ]);
        }

        return back()->with('success', 'Berhasil menyimpan ulasan');
    }

    public function cancel(Request $request, Transaksi $transaksi) {
        if ($request->wantsJson() || $request->ajax()){
            $request->validate([
                'alasan' => 'required|string'
            ]);

            if ($transaksi->status == 'settlement') {

                $params = array(
                    'refund_key' => 'ref-' . rand(1, 100) . '-' . date('Ymd'),
                    'amount' => ($transaksi->total_barang + $transaksi->total_ongkir),
                    'reason' => $request->alasan,
                );

                \Midtrans\Config::$serverKey = config('midtrans.serverKey');
                // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
                \Midtrans\Config::$isProduction = config('midtrans.isProduction');
                // Set sanitization on (default)
                \Midtrans\Config::$isSanitized = config('midtrans.isSanitized');
                // Set 3DS transaction for credit card to true
                \Midtrans\Config::$is3ds = config('midtrans.is3ds');

                $refund = \Midtrans\Transaction::refundDirect($transaksi->midtrans_order_id, $params);

                if ($refund->status_code == "200") {
                    $transaksi->update([
                        'status' => 'cancel'
                    ]);

                    return response()->json([
                        'status' => true,
                        'message' => 'Pesanan berhasil dibatalkan. Pengembalian dana akan segera diproses.',
                        'midtrans' => $refund
                    ], 201);
                }

                return response()->json([
                    'status' => true,
                    'message' => $refund->status_message,
                    'midtrans' => $refund
                ], 400);

            }
        }

        return abort(404);
    }
}
