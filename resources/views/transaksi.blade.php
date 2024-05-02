@extends('layouts.app')

@section('content')
    <h5 class="text-2xl font-semibold mb-4">Transaksi</h5>
    <div class="grid grid-cols-12 gap-4 relative">
        <div class="col-span-12 md:col-span-8">
            @foreach ($transaksis as $transaksi)
            <div class="w-full bg-white p-6 flex gap-2 cart-card flex-wrap rounded-xl mb-4" data-produk="">
                <div class="w-full flex items-center gap-4">
                    <span class="">{{ $transaksi->created_at }}</span>
                    <span class="text-xs px-3 py-1 bg-wc-red-000 text-wc-red-400 font-semibold w-auto rounded">{{ $transaksi->status == 'settlement' ? 'Menunggu konfirmasi' : $transaksi->status}}</span>
                </div>
                <img src="/storage/{{ $transaksi->transaksiItems[0]->produk->gambar }}" class="aspect-square object-cover h-20" alt="">
                <div class="flex flex-col justify-between min-h-20 flex-grow">
                    <div class="w-full flex flex-col flex-wrap justify-between h-full">
                        <div class="">
                            <h5 class="text-xl font-medium capitalize tracking-tight text-gray-900 line-clamp-1 w-auto md:w-1/2">{{ $transaksi->transaksiItems[0]->produk->nama }}</h5>
                            <span class="text-wc-black-300">{{ $transaksi->transaksiItems[0]->jumlah }} barang</span>
                        </div>
                        @if ($transaksi->transaksiItems->count() > 1)
                        <span class="text-sm text-wc-black-000">+ {{ $transaksi->transaksiItems->count() - 1 }} barang lainnya</span>
                        @endif
                    </div>
                </div>
                <div class="flex flex-col justify-center">
                    <span class="text-sm text-wc-black-100">Total belanja</span>
                    <span class="text-md md:text-xl text-start md:text-end font-medium text-gray-900 w-auto md:w-1/2 whitespace-nowrap rupiah">{{ $transaksi->total_barang + $transaksi->total_ongkir }}</span>
                </div>
                <div class="flex-grow w-auto md:w-full flex justify-end gap-2">
                    @if ($transaksi->status == 'finished')
                    <button type="button" class="hover:text-white border border-wc-red-400 text-wc-red-400 hover:bg-wc-red-300 focus:ring-4 focus:ring-wc-red-300 font-medium rounded-lg text-sm px-6 md:px-10 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" >Ulas</button>
                    @endif
                    
                    @if ($transaksi->status == 'pending')
                    <button type="button" id="pay-button" data-snap="{{ $transaksi->snap_token }}" data-id="{{ $transaksi->id }}" class="pay-button hover:text-white border border-wc-red-400 text-wc-red-400 hover:bg-wc-red-300 focus:ring-4 focus:ring-wc-red-300 font-medium rounded-lg text-sm px-6 md:px-10 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" >Bayar</button>
                    @endif

                    <button type="button" class="text-white bg-wc-red-400 hover:bg-wc-red-300 focus:ring-4 focus:ring-wc-red-300 font-medium rounded-lg text-xs md:text-sm px-6 md:px-10 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" >Beli lagi</button>
                </div>
            </div>
            @endforeach
        </div>
    </div>
@endsection

@section('script')
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
    <script type="text/javascript">
        $('.pay-button').off('click').on('click', function(){
            let id = $(this).data('id');
            snap.pay($(this).data('snap'), {
                onSuccess: function(result){
                    // changeTransactionStatus(response.data.id, 'success');

                    console.log('pembayaran berhasil');

                    $.ajax({
                        url: '/transaksi/' + id,
                        type: 'PUT',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            status: 'settlement',
                        },
                        success: function(response){
                            console.log(response.message);
                            location.reload();
                        },
                        error: function(error){
                            console.error(error);
                        }
                    });


                    // window.location.href = "/transaksi/status/" + response.data.id;

                },
                onPending: function(result){
                    console.log('pembayaran dipending');
                    
                    window.location.href = "/transaksi/status/" + $(this).data('id');
                },
                onError: function(result){
                    console.log('pembayaran gagal');
                    // changeTransactiontransaksi/Status($(this).data('id'), 'failed');

                    window.location.href = "/transaksi/status/" + $(this).data('id');
                }
            });
        });
    </script>
@endsection