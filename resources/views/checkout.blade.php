@extends('layouts.app')

@section('content')
    <h5 class="text-2xl font-semibold mb-4">Keranjang</h5>
    <div class="grid grid-cols-12 gap-4 relative">
        <div class="col-span-12 md:col-span-8 rounded-xl">
            <div class="w-full rounded-xl bg-white p-6 shadow mb-4">
                <h5 class="font-xl font-semibold text-wc-black-100 uppercase mb-4">Alamat Pengiriman</h5>
                <div class="flex items-center gap-2">
                    <svg class="w-4 h-4 text-wc-red-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd" d="M11.906 1.994a8.002 8.002 0 0 1 8.09 8.421 7.996 7.996 0 0 1-1.297 3.957.996.996 0 0 1-.133.204l-.108.129c-.178.243-.37.477-.573.699l-5.112 6.224a1 1 0 0 1-1.545 0L5.982 15.26l-.002-.002a18.146 18.146 0 0 1-.309-.38l-.133-.163a.999.999 0 0 1-.13-.202 7.995 7.995 0 0 1 6.498-12.518ZM15 9.997a3 3 0 1 1-5.999 0 3 3 0 0 1 5.999 0Z" clip-rule="evenodd"/>
                    </svg> 
                    <p class="font-medium">Rumah - Ali Imron</p>                     
                </div>
                <p class="text-sm">Kp. Anggrek lebak. Jln Pondok rumput 2, No 5 Rt 4 Rw 2, Kel. Kebon pedes (Rumah Bpk. Suyatno), Tanah Sereal, Kota Bogor, Jawa Barat, 6285648234765</p>
            </div>

            @foreach ($transaksi->transaksiItem as $item)
            <div class="w-full p-6 flex items-start gap-4 bg-white shasdow rounded-xl mb-4">
                <img src="/storage/{{ $item->produk->gambar }}" class="aspect-square object-cover h-20" alt="">
                <div class="flex flex-col justify-between min-h-20 flex-grow">
                    <div class="w-full flex flex-col md:flex-row flex-wrap justify-between">
                        <h5 class="text-xl font-medium capitalize tracking-tight text-gray-900 line-clamp-1 w-auto md:w-1/2">{{ $item->produk->nama }}</h5>
                        <span class=" text-start md:text-end font-medium text-gray-900 w-auto md:w-1/2 "> {{ $item->jumlah }} x <span class="rupiah">{{ $item->produk->harga }}</span></span>
                        <span class="">{{ $item->produk->berat }} g</span>
                        <span class="rupiah text-xl font-semibold">{{ $item->produk->harga * $item->jumlah }}</span>
                    </div>
                </div>
            </div>
            @endforeach

            <div class="w-full rounded-xl bg-white p-6 shadow mb-4">
                <h5 class="font-xl font-semibold text-wc-black-100 mb-4">Pilih Pengiriman</h5>
                <div class="flex flex-col gap-4 w-full">
                    @foreach ($ongkir->pricing as $ekspedisi)
                    <div class="flex items-center px-4 border border-gray-200 rounded cursor-pointer">
                        <input id="bordered-radio-1" type="radio" value="" name="bordered-radio" class="w-4 h-4 text-wc-red-400 bg-gray-100 border-gray-300 focus:ring-0">
                        <label for="bordered-radio-1" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                            <h6 class="font-semibold text-xl">{{ $ekspedisi->courier_name . ' - ' . $ekspedisi->courier_service_name }}</h6>
                            <span class="text-wc-black-000">Tiba dalam {{ $ekspedisi->shipment_duration_range }} hari</span>
                        </label>
                        <span id="reguler-price" class="whitespace-nowrap rupiah">{{ $ekspedisi->price }}</span>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-span-12 md:col-span-4">
            <div class="w-full bg-white border-t rounded-xl fixed md:static bottom-0 left-0 flex md:block">
                <div class="w-full p-6 pe-0 md:pe-6 flex items-center md:block border-b border-gray-200">
                    <h6 class="text-lg font-semibold mb-3 hidden md:block">Ringkasan Belanja</h6>
                    <div class="flex items-center justify-between w-full">
                        <span class="text-md text-gray-500">Total barang:</span>
                        <span class="text-lg font-bold rupiah" id="total-price">{{ $transaksi->total }}</span>
                    </div>
                </div>
                <div class="w-auto md:w-full flex items-center p-6 ps-4 md:ps-6">
                    <button type="button" id="buy-button" class="w-full text-white bg-wc-red-400 hover:bg-wc-red-300 focus:ring-4 focus:ring-wc-red-300 font-medium rounded-lg text-sm px-10 justify-center inline-flex gap-1 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Bayar</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
    </script>
@endsection