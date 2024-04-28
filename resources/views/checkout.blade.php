@extends('layouts.app')

@section('content')
    <h5 class="text-2xl font-semibold mb-4">Checkout</h5>
    <div class="grid grid-cols-12 gap-4">
        <div class="col-span-12 md:col-span-8 rounded-xl">
            <div class="w-full rounded-xl bg-white p-6 shadow mb-4">
                <h5 class="font-xl font-semibold text-wc-black-100 uppercase mb-4">Alamat Pengiriman</h5>

                <div class="">
                    @if (isset($alamat))
                    <div class="mb-4">
                        <div class="flex items-center gap-2">
                            <svg class="w-4 h-4 text-wc-red-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd" d="M11.906 1.994a8.002 8.002 0 0 1 8.09 8.421 7.996 7.996 0 0 1-1.297 3.957.996.996 0 0 1-.133.204l-.108.129c-.178.243-.37.477-.573.699l-5.112 6.224a1 1 0 0 1-1.545 0L5.982 15.26l-.002-.002a18.146 18.146 0 0 1-.309-.38l-.133-.163a.999.999 0 0 1-.13-.202 7.995 7.995 0 0 1 6.498-12.518ZM15 9.997a3 3 0 1 1-5.999 0 3 3 0 0 1 5.999 0Z" clip-rule="evenodd"/>
                            </svg> 
                            <p class="font-bold">{{ $alamat->label }} - {{ $alamat->penerima }}</p>                     
                        </div>
                        <p class="text-sm mb-2">{{ $alamat->lengkap }}, {{ $alamat->kelurahan }}, {{ $alamat->kota }}, {{ $alamat->provinsi }}, {{ $alamat->kode_pos }}, {{ $alamat->hp_penerima }}</p>  
                    </div>
                    @else
                    <div class="p-4 mb-4 text-sm text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300" role="alert">
                        Anda belum menambahkan alamat. Tambahkan alamat terlebihdahulu!
                      </div>
                    @endif
                </div>

                <button type="button" class="px-3 py-2 text-xs font-medium text-center text-wc-black-100 border border-wc-black-100 rounded-lg focus:ring-0 " data-modal-target="change-address-modal" data-modal-toggle="change-address-modal">Ganti Alamat</button>
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
                    @if (isset($alamat))
                    @php
                    $i = 1    
                    @endphp
                    @foreach ($ongkir->pricing as $ekspedisi)
                    <div class="flex items-center px-4 border border-gray-200 rounded cursor-pointer">
                        <input id="bordered-radio-{{ $i }}" type="radio" value="{{ $ekspedisi->price }}" name="bordered-radio" class="expedision-type w-4 h-4 text-wc-red-400 bg-gray-100 border-gray-300 focus:ring-0">
                        <label for="bordered-radio-{{ $i }}" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">
                            <h6 class="font-semibold text-xl">{{ $ekspedisi->courier_name . ' - ' . $ekspedisi->courier_service_name }}</h6>
                            <span class="text-wc-black-000">Tiba dalam {{ $ekspedisi->shipment_duration_range }} hari</span>
                        </label>
                        <span id="reguler-price" class="whitespace-nowrap rupiah">{{ $ekspedisi->price }}</span>
                    </div>
                    @php
                    $i++    
                    @endphp
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
        <div class="col-span-12 md:col-span-4">
            <div class="w-full bg-white border-t rounded-xl bottom-0 left-0 block">
                <div class="w-full p-6 block border-b border-gray-200">
                    <h6 class="text-lg font-semibold mb-3 hidden md:block">Ringkasan Belanja</h6>
                    <div class="flex items-center justify-between w-full">
                        <span class="text-md text-gray-500">Total Harga Barang</span>
                        <span class="text-lg font-bold rupiah" id="total-price">{{ $transaksi->total }}</span>
                    </div>
                    <div class="flex items-center justify-between w-full">
                        <span class="text-md text-gray-500">Total Ongkir</span>
                        <span class="text-lg font-bold rupiah" id="total-ongkir">0</span>
                    </div>
                    <div class="flex items-center justify-between w-full">
                        <span class="text-md text-gray-500">Total Belanja</span>
                        <span class="text-xl font-bold rupiah" id="total">{{ $transaksi->total }}</span>
                    </div>
                </div>
                <div class="w-auto md:w-full flex items-center p-6 ps-4 md:ps-6">
                    <button type="button" id="buy-button" class="w-full text-white bg-wc-red-400 hover:bg-wc-red-300 focus:ring-4 focus:ring-wc-red-300 font-medium rounded-lg text-sm px-10 justify-center inline-flex gap-1 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Bayar</button>
                </div>
            </div>
        </div>
    </div>

<div id="change-address-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Ganti Alamat pengiriman
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm h-8 w-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="change-address-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <form class="p-4 md:p-5" id="change-address-form">
                <p class="text-gray-500 dark:text-gray-400 mb-4">Pilih alamat:</p>
                <ul class="space-y-4 mb-4">
                    @foreach ($alamats as $alamat)                        
                    <li>
                        <input type="radio" id="address-{{ $alamat->id }}" name="id" value="{{ $alamat->id }}" class="hidden peer select-address" {{ $alamat->selected ? 'checked' : '' }} required />
                        <label for="address-{{ $alamat->id }}" class="inline-flex flex-col items-start justify-between w-full p-5 text-gray-900 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-500 dark:peer-checked:text-blue-500 peer-checked:border-wc-red-400 hover:text-gray-900 hover:bg-gray-100 dark:text-white dark:bg-gray-600 dark:hover:bg-gray-500">                           
                            <div class="flex items-center gap-2">
                                <svg class="w-4 h-4 text-wc-red-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd" d="M11.906 1.994a8.002 8.002 0 0 1 8.09 8.421 7.996 7.996 0 0 1-1.297 3.957.996.996 0 0 1-.133.204l-.108.129c-.178.243-.37.477-.573.699l-5.112 6.224a1 1 0 0 1-1.545 0L5.982 15.26l-.002-.002a18.146 18.146 0 0 1-.309-.38l-.133-.163a.999.999 0 0 1-.13-.202 7.995 7.995 0 0 1 6.498-12.518ZM15 9.997a3 3 0 1 1-5.999 0 3 3 0 0 1 5.999 0Z" clip-rule="evenodd"/>
                                </svg> 
                                <p class="font-bold">{{ $alamat->label }} - {{ $alamat->penerima }}</p>                     
                            </div>
                            <p class="text-sm mb-2">{{ $alamat->lengkap }}, {{ $alamat->kelurahan }}, {{ $alamat->kota }}, {{ $alamat->provinsi }}, {{ $alamat->kode_pos }}, {{ $alamat->hp_penerima }}</p>
                        </label>
                    </li>
                    @endforeach
                </ul>
                <button type="submit" class="text-white inline-flex w-full justify-center bg-wc-red-400 hover:bg-wc-red-300 focus:ring-4 focus:outline-none focus:ring-wc-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Ubah
                </button>
            </form>
        </div>
    </div>
</div> 
@endsection

@section('script')
    <script>
        $('.expedision-type').on('change', function(){
            let ongkir = parseInt($('.expedision-type:checked').val());
            
            $('#total-ongkir').html('Rp ' + ongkir.toString().split('').reverse().join('').match(/\d{1,3}/g).join('.').split('').reverse().join(''));

            let total = ongkir + {{ $transaksi->total }};
            $('#total').html('Rp ' + total.toString().split('').reverse().join('').match(/\d{1,3}/g).join('.').split('').reverse().join(''));
        });

        $('#change-address-form').on('submit', function(e){
            e.preventDefault();
            
            let data = {
                id: $('.select-address:checked').val()
            };

            $.ajax({
                url: '/alamat',
                method: 'PUT',
                data: data,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },

                success: function(response){
                    console.log(response.message);

                    location.reload();
                },
                error: function(error){
                    console.error(error);
                }
            });
        });
    </script>
@endsection