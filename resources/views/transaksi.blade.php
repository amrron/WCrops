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

                    @if ($transaksi->status == 'ondelivery')
                    <button type="button" data-modal-target="timeline-modal" data-modal-toggle="timeline-modal" class="track-button text-wc-red-400 border border-wc-red-400 focus:ring-4 focus:ring-wc-red-300 font-medium rounded-lg text-xs md:text-sm px-6 md:px-10 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" data-id="{{ $transaksi->id }}">Lacak</button>
                    <button type="button" class="text-white bg-wc-red-400 hover:bg-wc-red-300 focus:ring-4 focus:ring-wc-red-300 font-medium rounded-lg text-xs md:text-sm px-6 md:px-10 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" >Selesaikan Pesanan</button>
                    @endif

                    @if ($transaksi->status == 'finished')
                    <button type="button" class="text-white bg-wc-red-400 hover:bg-wc-red-300 focus:ring-4 focus:ring-wc-red-300 font-medium rounded-lg text-xs md:text-sm px-6 md:px-10 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" >Beli lagi</button>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>


    <div id="timeline-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-4xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                            Lacak Pengiriman
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm h-8 w-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="timeline-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-4 grid grid-cols-9 gap-8 md:p-5">
                      <div class="col-span-9 md:col-span-4">
                          <div class="mb-6">
                              <div class="flex">
                                  <h5 class="w-1/3 text-gray-400">Status:</h5>
                                  <h5 class="w-2/3 font-semibold capitalize" id="status_pengiriman"></h5>
                              </div>
                              <div class="flex">
                                  <h5 class="w-1/3 text-gray-400">Kurir:</h5>
                                  <h5 class="w-2/3 font-semibold uppercase" id="kurir"></h5>
                              </div>
                          </div>
                          <div class="mb-4">
                              <h5 class="text-gray-400">Resi:</h5>
                              <h3 class="font-semibold text-md" id="no_resi"></h3>
                          </div>
                          <div class="mb-4">
                              <h5 class="text-gray-400">Tujuan:</h5>
                              <h5 class="font-semibold" id="penerima"></h5>
                              <h5 id="alamat_tujuan"></h5>
                          </div>
                      </div>
                      <div class="col-span-9 md:col-span-5">
                          <ol id="modal-track-body" class="relative border-s border-gray-200 dark:border-gray-700">                  
                              {{-- <li class="mb-4 ms-4">
                                  <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -start-1.5 border border-white dark:border-gray-900 dark:bg-gray-700"></div>
                                  <time class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">February 2022</time>
                                  <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Paket Diterima di Konter</h3>
                                  <p class="mb-4 text-base font-normal text-gray-500 dark:text-gray-400">Jakarta</p>
                              </li> --}}
                          </ol>
                      </div>
                        {{-- <button class="text-white inline-flex w-full justify-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        My Downloads
                        </button> --}}
                    </div>
                </div>
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

        $('.track-button').off('click').on('click', function(){
            let id = $(this).data('id');

            $('#status_pengiriman').text('');
            $('#kurir').text('');
            $('#no_resi').html('');
            $('#penerima').html('');
            $('#alamat_tujuan').html('');

            $('#modal-track-body').empty();
            
            $.ajax({
                url : '/transaksi/track/' + id,
                method: 'GET',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response){

                    console.log(response);

                    $('#status_pengiriman').text(response.status == 'dropping_off' ? 'Sedang Dikirim' : response.status);
                    $('#kurir').text(response.courier.company);
                    $('#no_resi').html(response.waybill_id);
                    $('#penerima').html(response.destination.contact_name);
                    $('#alamat_tujuan').html(response.destination.address);

                    var maxIndex = response.history.length - 1;

                    $.each(response.history, function(index, history){

                        var tanggal_objek = new Date(history.updated_at);
                        var tahun = tanggal_objek.getFullYear();
                        var bulan = tanggal_objek.getMonth() + 1; // Perlu ditambah 1 karena indeks bulan dimulai dari 0
                        var tanggal = tanggal_objek.getDate();

                        var jam = tanggal_objek.getHours();
                        var menit = tanggal_objek.getMinutes();

                        var tanggal_hasil = tahun + '-' + (bulan < 10 ? '0' : '') + bulan + '-' + (tanggal < 10 ? '0' : '') + tanggal;
                        var waktu_hasil = (jam < 10 ? '0' : '') + jam + ':' + (menit < 10 ? '0' : '') + menit;

                        var tanggal_akhir = tanggal_hasil + ' ' + waktu_hasil;
                        
                        let desc = history.note.split('[')[0];
                        let place = history.note.split('[')[1];
                        place = place ? place.split(']').join('') : '';

                        let time = `<li class="mb-4 ms-4">
                            <div class="absolute w-3 h-3 ${index == maxIndex ? 'bg-wc-red-400' : 'bg-gray-200'} rounded-full mt-1.5 -start-1.5 border border-white dark:border-gray-900 dark:bg-gray-700"></div>
                            <time class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">${tanggal_akhir}</time>
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white capitalize">${desc}</h3>
                            <p class="mb-4 text-base font-normal text-gray-500 dark:text-gray-400 capitalize">${place}</p>
                        </li>`;

                        $('#modal-track-body').prepend(time);
                    })
                },
                error: function(error){
                    console.error(error);
                }
            });
        });
    </script>
@endsection