@extends('layouts.admin')

@section('contain')

<div class="p-4 bg-white block sm:flex items-center justify-between border-b border-gray-200 lg:mt-1.5 dark:bg-gray-800 dark:border-gray-700">
  <div class="w-full mb-1">
      <div class="mb-4">
          <nav class="flex mb-5" aria-label="Breadcrumb">
              <ol class="inline-flex items-center space-x-1 text-sm font-medium md:space-x-2">
                <li class="inline-flex items-center">
                  <a href="#" class="inline-flex items-center text-gray-700 hover:text-primary-600 dark:text-gray-300 dark:hover:text-white">
                    <svg class="w-5 h-5 mr-2.5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
                    Admin
                  </a>
                </li>
                <li>
                  <div class="flex items-center">
                    <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                    <a href="#" class="ml-1 text-gray-700 hover:text-primary-600 md:ml-2 dark:text-gray-300 dark:hover:text-white">E-commerce</a>
                  </div>
                </li>
                <li>
                  <div class="flex items-center">
                    <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                    <span class="ml-1 text-gray-400 md:ml-2 dark:text-gray-500" aria-current="page">Products</span>
                  </div>
                </li>
              </ol>
          </nav>
          <h1 class="text-xl font-semibold text-gray-900 sm:text-2xl dark:text-white">Semua Pesanan</h1>
      </div>
      
  </div>
</div>
<div class="flex flex-col">
  <div class="overflow-x-auto">
      <div class="inline-block min-w-full align-middle">
          <div class="overflow-hidden shadow p-6 min-h-screen">

            <div class="mb-4 border-b border-gray-200 dark:border-gray-700 bg-white rounded-lg px-1 shadow-sm">
                <ul class="flex flex-wrap -mb-px text-sm font-medium text-center" id="default-tab" data-tabs-toggle="#default-tab-content" role="tablist">
                    <li class="me-2" role="presentation">
                        <button class="inline-block p-4 border-b-2 rounded-t-lg" id="profile-tab" data-tabs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Semua Pesanan</button>
                    </li>
                    <li class="me-2" role="presentation">
                        <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="dashboard-tab" data-tabs-target="#dashboard" type="button" role="tab" aria-controls="dashboard" aria-selected="false">Pesanan Baru</button>
                    </li>
                    <li class="me-2" role="presentation">
                        <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="settings-tab" data-tabs-target="#settings" type="button" role="tab" aria-controls="settings" aria-selected="false">Diproses</button>
                    </li>
                    <li class="me-2" role="presentation">
                        <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="contacts-tab" data-tabs-target="#contacts" type="button" role="tab" aria-controls="contacts" aria-selected="false">Dalam Pengiriman</button>
                    </li>
                    <li class="me-2" role="presentation">
                        <button class="inline-block p-4 border-b-2 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="finish-tab" data-tabs-target="#finish" type="button" role="tab" aria-controls="finish" aria-selected="false">Selesai</button>
                    </li>
                </ul>
            </div>
            <div id="default-tab-content">
                <div class="hidden rounded-lg bg-gray-50 dark:bg-gray-800" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    @foreach ($transaksis as $transaksi)                
                    <div class="w-full bg-white shadow mb-6 rounded-xl">
                          <div class="w-full p-3 border border-b-gray-200 flex gap-4 rounded-t-xl">
                              <div class="flex items-center gap-2">
                                  <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                      <path stroke="currentColor" stroke-width="1" d="M7 17v1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1a3 3 0 0 0-3-3h-4a3 3 0 0 0-3 3Zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                  </svg>                              
                                  <h4 class="font-medium text-sm">{{ $transaksi->user->name }}</h4>
                              </div>
                              <div class="flex items-center gap-2">
                                  <svg class="w-5 h-5 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 8v4l3 3m6-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                                  </svg>                                                           
                                  <h4 class="font-medium text-sm">{{ $transaksi->created_at }}</h4>
                              </div>
                          </div>
                          <div class="grid grid-cols-12 p-4 gap-4 border-x">
                              <div class="col-span-4">
                                  @foreach ($transaksi->transaksiItems as $item)
                                  <div class="flex gap-2">
                                      <img src="/storage/{{ $item->produk->gambar }}" class="w-12 h-12 object-cover" alt="">
                                      <div class="mb-2">
                                          <h4 class="font-semibold">{{ $item->produk->nama }}</h4>
                                          <span class="text-sm text-wc-black-200">{{ $item->jumlah }} x <span class="rupiah">{{ $item->produk->harga }}</span></span>
                                      </div>
                                  </div>
                                  @endforeach
                              </div>
                              <div class="col-span-4">
                                  <span class="text-sm text-wc-black-300 font-semibold">Alamat</span>
                                  <p class="text-sm text-wc-black-100">{{ $transaksi->alamat->lengkap }}, {{ $transaksi->alamat->kelurahan }}, {{ $transaksi->alamat->kecamatan }}, {{ $transaksi->alamat->kota }}, {{ $transaksi->alamat->provinsi }}, {{ $transaksi->alamat->kode_pos }}, {{ $transaksi->alamat->hp_penerima }}</p>
                              </div>
                              <div class="col-span-4">
                                  <span class="font-sm text-wc-black-300 font-semibold">Kurir</span>
                                  @php
                                      $total_berat = 0
                                  @endphp
                                  @foreach ($transaksi->transaksiItems as $item)
                                  @php
                                      $total_berat += $item->jumlah * $item->produk->berat
                                  @endphp
                                  @endforeach
                                  <p class="text-sm text-wc-black-100">{{ $transaksi->kurir }} (
                                     {{ $total_berat / 1000 }}
                                   kg)</p>
                              </div>
                          </div>
                          <div class="w-full p-3 border border-t-gray-200 flex justify-end gap-4 rounded-b-xl">
                              @if ($transaksi->status == 'settlement')
                              <button type="button" class="confirm-order p-2.5 px-4 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 whitespace-nowrap" data-id="{{ $transaksi->id }}">
                                Terima Pesanan
                            </button>
                              @endif
                              @if ($transaksi->status == 'onprocess')
                              <form action="/transaksi/delivery/{{ $transaksi->id }}" method="POST" id="form-deliver-order" class="flex gap-2 items-center">
                                  @method('PUT')
                                  @csrf
                                  <div class="flex">
                                    <select name="ekspedisi" id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-l-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                        <option selected value="jne">JNE</option>
                                        <option value="jnt">J&T</option>
                                        <option value="tiki">Tiki</option>
                                        <option value="sicepat">Sicepat</option>
                                        <option value="idexpress">IDExpress</option>
                                        <option value="anteraja">Anter Aja</option>
                                        <option value="wahana">Wahana</option>
                                      </select>
                                      <input type="text" name="resi" id="simple-search" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-r-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukan resi pengiriman" required />
                                  </div>
                                  <button type="submit" class="p-2.5 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 whitespace-nowrap">
                                      Kirim Pesanan
                                  </button>
                              </form>
                              @endif
                              @if ($transaksi->status == 'ondelivery')
                              <button type="button" data-modal-target="timeline-modal" data-modal-toggle="timeline-modal" class="track-button p-2.5 px-4 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 whitespace-nowrap" data-id="{{ $transaksi->id }}">
                                Lacak
                              </button>
                              @endif
                          </div>
                    </div>
                    @endforeach
                </div>
                <div class="hidden rounded-lg bg-gray-50 dark:bg-gray-800" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                    <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong class="font-medium text-gray-800 dark:text-white">Dashboard tab's associated content</strong>. Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling.</p>
                </div>
                <div class="hidden rounded-lg bg-gray-50 dark:bg-gray-800" id="settings" role="tabpanel" aria-labelledby="settings-tab">
                    <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong class="font-medium text-gray-800 dark:text-white">Settings tab's associated content</strong>. Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling.</p>
                </div>
                <div class="hidden rounded-lg bg-gray-50 dark:bg-gray-800" id="contacts" role="tabpanel" aria-labelledby="contacts-tab">
                    <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong class="font-medium text-gray-800 dark:text-white">Contacts tab's associated content</strong>. Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling.</p>
                </div>
                <div class="hidden rounded-lg bg-gray-50 dark:bg-gray-800" id="finish" role="tabpanel" aria-labelledby="finish-tab">
                    <p class="text-sm text-gray-500 dark:text-gray-400">This is some placeholder content the <strong class="font-medium text-gray-800 dark:text-white">finish tab's associated content</strong>. Clicking another tab will toggle the visibility of this one for the next. The tab JavaScript swaps classes to control the content visibility and styling.</p>
                </div>
            </div>

          </div>
      </div>
  </div>
</div>



<!-- Modal toggle -->
{{-- <button data-modal-target="timeline-modal" data-modal-toggle="timeline-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
    Toggle modal
  </button> --}}
  
  <!-- Main modal -->
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
                                <h5 class="w-2/3 font-semibold capitalize" id="status_pengiriman">Dikirim</h5>
                            </div>
                            <div class="flex">
                                <h5 class="w-1/3 text-gray-400">Kurir:</h5>
                                <h5 class="w-2/3 font-semibold uppercase" id="kurir">JNE</h5>
                            </div>
                        </div>
                        <div class="mb-4">
                            <h5 class="text-gray-400">Resi:</h5>
                            <h3 class="font-semibold text-md" id="no_resi">JT0339918280</h3>
                        </div>
                        <div class="mb-4">
                            <h5 class="text-gray-400">Tujuan:</h5>
                            <h5 class="font-semibold" id="penerima">Ali Imron</h5>
                            <h5 id="alamat_tujuan">Kp. Anggrek lebak. Jln Pondok rumput 2, No 5 Rt 4 Rw 2, Kel. Kebon pedes (Rumah Bpk. Suyatno), Tanah Sereal, Kota Bogor</h5>
                        </div>
                    </div>
                    <div class="col-span-9 md:col-span-5">
                        <ol id="modal-track-body" class="relative border-s border-gray-200 dark:border-gray-700">                  
                            <li class="mb-4 ms-4">
                                <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -start-1.5 border border-white dark:border-gray-900 dark:bg-gray-700"></div>
                                <time class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">February 2022</time>
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Paket Diterima di Konter</h3>
                                <p class="mb-4 text-base font-normal text-gray-500 dark:text-gray-400">Jakarta</p>
                            </li>
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
    <script>
        $('.confirm-order').off('click').on('click', function(){
            $(this).prop('disabled', true);

            let id = $(this).data('id');

            $.ajax({
                url: '/transaksi/' + id,
                type: 'PUT',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    status: 'onprocess',
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

        const formatDateTime = (isoDateTime) => {
            const dateTime = new Date(isoDateTime);
            const day = dateTime.getUTCDate();
            const monthIndex = dateTime.getUTCMonth();
            const year = dateTime.getUTCFullYear();
            const hour = dateTime.getUTCHours();
            const minute = dateTime.getUTCMinutes();

            const months = [
                'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
                'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
            ];

            return `${day} ${months[monthIndex]} ${year} ${hour}:${minute}`;
        }


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
                        
                        let desc = history.note.split('[')[0];
                        let place = history.note.split('[')[1];
                        place = place ? place.split(']').join('') : '';

                        let time = `<li class="mb-4 ms-4">
                            <div class="absolute w-3 h-3 ${index == maxIndex ? 'bg-wc-red-400' : 'bg-gray-200'} rounded-full mt-1.5 -start-1.5 border border-white dark:border-gray-900 dark:bg-gray-700"></div>
                            <time class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">${formatDateTime(history.updated_at)}</time>
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