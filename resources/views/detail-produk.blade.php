@extends('layouts.app')

@section('content')
    <div class="grid grid-cols-12 gap-6 mt-6 border-b border-gray-200 pb-8">
        <div class="col-span-12 md:col-span-3">
            <img src="/storage/{{ $produk->gambar }}" class="aspect-square object-cover rounded-none md:rounded-lg w-full" alt="">
        </div>
        <div class="col-span-12 md:col-span-5 relative px-4 pb-32 md:pb-0">
            <h5 class="font-medium text-3xl capitalize mb-2">{{ $produk->nama }}</h5>
            <div class="flex items-center mb-4">
                <span class="text-wc-black-200 me-2">Terjual 12</span>
                <div class="flex items-center space-x-1 rtl:space-x-reverse">
                    <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                    </svg>
                </div>
                <span class="text-wc-black-200 px-1 py-0.5 rounded">5.0</span>
            </div>
            <h3 class="text-3xl fonst-medium mb-4 rupiah">{{ $produk->harga }}</h3>
            <h6 class="text-xl font-medium mb-2">Detail</h6>
            <p>
                <span class="text-wc-black-200">Kondisi:</span> <span class="text-wc-black-400">Baru</span>
            </p>
            <p>
                <span class="text-wc-black-200">Min. Pemesanan:</span> <span class="text-wc-black-400">1</span>
            </p>
            <p class="mb-4">
                <span class="text-wc-black-200">Berat:</span> <span class="text-wc-black-400">{{ $produk->berat }} gr</span>
            </p>
            <p class="text-wc-black-400">{{ $produk->deskripsi }}</p>

            <button type="button" class="add-to-wishlist absolute top-0 right-0 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24" data-id="{{ $produk->id }}">
                <svg class="w-7 h-7 text-wc-red-400 dark:text-white hover:fill-wc-red-400 {{ $produk->isInWishlist ? 'fill-wc-red-400' : '' }}" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12.01 6.001C6.5 1 1 8 5.782 13.001L12.011 20l6.23-7C23 8 17.5 1 12.01 6.002Z"/>
                </svg>                                                 
                <span class="sr-only">Tambahkan ke wistlist</span>
            </button>
        </div>
        <div class="col-span-12 md:col-span-4">
            <div class="w-full rounded-xl bg-white shadow-md p-6 flex flex-col gap-4 fixed md:static bottom-0 left-0">
                <h6 class="hidden md:block font-semibold text-xl">Atur jumlah</h6>
                <div class="gap-2 items-center hidden md:flex">
                    <div class="relative flex items-center max-w-[8rem] border border-gray-500 rounded-lg">
                        <button type="button" id="decrement-button" data-input-counter-decrement="quantity-input" data-id="{{ $produk->id }}" class="decrease-amount rounded-s-lg p-2 h-8 focus:outline-none">
                            <svg class="w-3 h-3 text-wc-red-400 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16"/>
                            </svg>
                        </button>
                        <input type="text" inputmode="numeric" id="quantity-input" data-input-counter aria-describedby="helper-text-explanation" class="quantity-input  h-8 text-center text-gray-900 text-sm w-12 py-2.5 focus:outline-none focus:ring-0 border-none" data-input-counter-min="1" data-input-counter-max="{{ $produk->stok }}" value="1" data-id="{{ $produk->id }}" required />
                        <button type="button" id="increment-button" data-id="{{ $produk->id }}" data-input-counter-increment="quantity-input" class="increase-amonut rounded-e-lg p-2 h-8 focus:outline-none">
                            <svg class="w-3 h-3 text-wc-red-400 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                            </svg>
                        </button>
                    </div>
                    <span>Stok: {{ $produk->stok }}</span>
                </div>
                <div class="hidden md:flex items-center justify-between w-full">
                    <span class="text-md text-gray-500">Total:</span>
                    <span class="text-lg font-bold rupiah" id="total-price">{{ $produk->harga }}</span>
                </div>
                <button type="button" id="add-to-cart" data-id="{{ $produk->id }}" class="w-full text-white bg-wc-red-400 fonst-semibold hover:bg-wc-red-300 focus:ring-4 focus:ring-wc-red-300 cursor-pointer rounded-lg text-sm px-10 justify-center inline-flex gap-1 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" >+ Keranjang</button>
                <button type="button" id="buy-button" class="w-full text-wc-red-400 font-semibold border border-wc-red-400 hover:bg-wc-red-400 hover:text-white cursor-pointer focus:ring-4 focus:ring-wc-red-300 rounded-lg text-sm px-10 justify-center inline-flex gap-1 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" disabled>Beli</button>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        // Ketika tombol wishlist ditekan
        $('.add-to-wishlist').off('click').on('click', function(){
                
            $(this).find('svg').toggleClass('fill-wc-red-400');
            let produkId = $(this).data('id');

            $.ajax({
                url: '/wishlist',
                type: 'POST',
                data: {
                    produk_id: produkId
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response){
                    console.log(response.message);
                },
                error: function(error) {
                    console.error(error);
                }
            });

        });

        // tambah ke keranjang
        $('#add-to-cart').off('click').on('click', function(){

            let id = $(this).data('id');
            let jumlah = $('#quantity-input').val();

            if (jumlah > 0) {
                $.ajax({
                    url: '/keranjang',
                    type: 'POST',
                    data: {
                        produk_id: id,
                        jumlah: jumlah
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response){
                        console.log(response.message);
                        toast(response.message, 'Lihat', '/keranjang');
                    },
                    error: function(error){
                        console.error(error);
                        toast(error.responseJSON.message, 'Oke')
                    }
                });
            }
        });

        $('#quantity-input').on('change', function(){
            let total = parseInt($('#quantity-input').val());
            let totalPrice = {{ $produk->harga }} * total;

            $('#total-price').html('Rp ' + totalPrice.toString().split('').reverse().join('').match(/\d{1,3}/g).join('.').split('').reverse().join(''));
        });

        $('#decrement-button').on('click', function(){
            let total = parseInt($('#quantity-input').val()) - 1;
            if (total > 0) {
                let totalPrice = {{ $produk->harga }} * total;
    
                $('#total-price').html('Rp ' + totalPrice.toString().split('').reverse().join('').match(/\d{1,3}/g).join('.').split('').reverse().join(''));
            }
        });

        $('#increment-button').on('click', function(){
            let total = parseInt($('#quantity-input').val()) + 1;
            let totalPrice = {{ $produk->harga }} * total;

            $('#total-price').html('Rp ' + totalPrice.toString().split('').reverse().join('').match(/\d{1,3}/g).join('.').split('').reverse().join(''));
        });


    </script>
@endsection