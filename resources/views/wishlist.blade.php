@extends('layouts.app')

@section('content')
    <nav class="flex my-4 ms-4" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
            <li class="inline-flex items-center">
                <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                </svg>
                <a href="/" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                Beranda
                </a>
            </li>
            <li aria-current="page">
                <div class="flex items-center">
                <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <span class="ms-1 text-sm font-medium text-gray-500 md:ms-2 dark:text-gray-400">Wishlist</span>
                </div>
            </li>
        </ol>
    </nav>
    <h5 class="text-2xl font-semibold mb-4 px-4">Wishlist</h5>
    <div class="w-full grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3 md:gap-6 p-4">
        @foreach ($wishlists as $wishlist)
        <div class="w-full max-w-sm rounded-xl relative border shadow-md product-card">
            <a href="#" class="">
                <div class="">
                    <img class="w-full rounded-t-lg aspect-square object-cover" src="/storage/{{ $wishlist->produk->gambar }}" alt="product image" />
                </div>
                <div class="p-4">
                    <h5 class="font-normal capitalize tracking-tight text-gray-900">{{ $wishlist->produk->nama }}</h5>
                    <div class="flex flex-col gap-2 md:flex-row items-start md:items-center justify-between">
                        <span class="text-md md:text-xl font-bold text-gray-900 rupiah">{{ $wishlist->produk->harga }}</span>
                    </div>
                    <div class="flex items-center mt-2.5">
                        <div class="flex items-center space-x-1 rtl:space-x-reverse">
                            <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                            </svg>
                        </div>
                        <span class="text-xs font-semibold px-1 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ms-1">{{ $wishlist->produk->rating }}</span> | <span class="text-xs font-semibold ms-1">{{ $wishlist->produk->terjual }} Terjual</span>
                    </div>
                </div>
                <div class="flex flex-col md:flex-row gap-2 p-4 pt-0">
                    <button type="button" class="remove-from-wishlist flex items-center justify-center gap-1 text-gray-900 border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm p-2" data-id="{{ $wishlist->id }}">
                        <svg class="w-6 h-6 text-gray-400 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                        </svg>         
                        <span class="block md:hidden">Hapus</span>                     
                    </button>
                    <button type="button" class="add-to-cart text-white bg-wc-red-400 hover:bg-wc-red-300 focus:ring-4 focus:ring-wc-red-300 font-medium rounded-lg text-sm p-2 w-full" data-id="{{ $wishlist->produk_id }}">+ Keranjang</button>
                </div>
            </a>
        </div>
        @endforeach  
    </div>
@endsection

@section('script')
    <script>
        // Hapus dari keranjang
        $('.remove-from-wishlist').off('click').on('click', function(){

                let id = $(this).data('id');
                var itemToDelete = $(this).closest('.product-card');

                $.ajax({
                    url: '/wishlist/' + id,
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response){
                        console.log(response.message);
                        toast(response.message, 'Oke')
                        itemToDelete.remove();
                    },
                    error: function(error){
                        console.error(error);
                    }
                });

            });

            // Tambah ke keranjang
            $('.add-to-cart').off('click').on('click', function(){

                let id = $(this).data('id');

                $.ajax({
                    url: '/keranjang',
                    type: 'POST',
                    data: {
                        produk_id: id
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response){
                        console.log(response.message);
                        toast(response.message, 'Lihat', '/keranjang')
                    },
                    error: function(error){
                        console.error(error);
                    }
                });

            });
    </script>
@endsection