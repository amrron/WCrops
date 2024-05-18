@extends('layouts.app')
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}
@section('content')
    
    <h5 class="text-2xl font-semibold mb-4 px-4 mt-6">Produk</h5>
    <div class="w-full px-4 flex justify-end md:justify-between items-center flex-wrap pb-2 border-b">
        <p class="hidden md:block text-sm flex-1 w-full md:w-auto">Menampilkan <strong>{{ $produks->count() }}</strong> produk @if (request('search')) pencarian <strong>"{{ request('search') }}"</strong>     @endif</p>
        <div class="flex gap-2 items-center">
            <span>Kategori: </span>
            <select id="category" class="block py-2 px-0 w-full text-sm text-gray-500 bg-transparent border-0 appearance-none focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                <option value="">Semua</option>
                @foreach ($kategoris as $kategori)
                <option value="{{ $kategori->id }}" @selected($kategori->id == request('kategori'))>{{ $kategori->nama_kategori }}</option>
                @endforeach
              </select>
        </div>
    </div>
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
                if ($(this).text() == 'Hapus Dari wishlist') {
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

            $('#category').on('change', function(){
                let kategori = $(this).val();

                var currentUrl = new URL(window.location.href);
                kategori == "" ? currentUrl.searchParams.delete('kategori') : currentUrl.searchParams.set('kategori', kategori);
                window.location.href = currentUrl.toString();
            });
            
            
        })()
    </script>
@endsection