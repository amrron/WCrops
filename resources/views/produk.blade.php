@extends('layouts.app')
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}
@section('content')
    
    <h5 class="text-2xl font-semibold mb-4 px-4">Produk</h5>
    <div class="w-full grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3 md:gap-6 p-4">
        @foreach ($produks as $produk)
        <x-product.card :produk="$produk" />
        @endforeach  
    </div>
    
@endsection

@section('script')
    <script>
        (function(){
            
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
                        console.log(response);
                    },
                    error: function(error){
                        console.error(error);
                    }
                });

            });

            // Ketika tombol wishlist ditekan
            $('.add-to-wishlist').off('click').on('click', function(){

                if ($(this).text() == 'Tambahkan ke wishlist') {
                    $(this).text('Hapus Dari wishlist');
                }
                else {
                    $(this).text('Tambahkan ke wishlist')
                }
                
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

            
            
        })()
    </script>
@endsection