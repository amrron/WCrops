@extends('layouts.app')

@section('content')
    <h5 class="text-2xl font-semibold mb-4">Profile</h5>
    <div class="grid grid-cols-12 gap-6 relative">
        <div class="col-span-12 md:col-span-3">
            <div class="w-full rounded-xl flex flex-col gap-4 border">
                <div class="w-full rounded-xl bg-white gap-4 p-6 hidden md:flex">
                    <img src="/assets/images/profile.png" alt="" class="w-20 aspect-square">
                    <div class="flex flex-col justify-around">
                        <h1 class="text-xl font-semibold">Hai!</h1>
                        <h1 class="text-2xl font-semibold">{{ auth()->user()->name }}</h1>
                    </div>
                </div>
    
                <div class="w-full rounded-xl bg-white p-6">
                    <div class="w-full flex flex-row md:flex-col gap-4 list-none text-sm md:text-normal">
                        <a href="" class="flex gap-4 items-center font-semibold p-2 rounded-lg text-wc-red-400 hover:text-white hover:bg-wc-red-400">
                            <svg class="hidden md:block w-6 h-6 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-width="2" d="M7 17v1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1a3 3 0 0 0-3-3h-4a3 3 0 0 0-3 3Zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                            </svg> 
                            <span class="text-base md:text-lg text-center">Akun saya</span>                         
                        </a>
                        <a href="" class="flex gap-4 items-center font-semibold p-2 rounded-lg text-wc-red-400 hover:text-white hover:bg-wc-red-400">
                            <svg class="hidden md:block w-6 h-6 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-width="2" d="M11.083 5.104c.35-.8 1.485-.8 1.834 0l1.752 4.022a1 1 0 0 0 .84.597l4.463.342c.9.069 1.255 1.2.556 1.771l-3.33 2.723a1 1 0 0 0-.337 1.016l1.03 4.119c.214.858-.71 1.552-1.474 1.106l-3.913-2.281a1 1 0 0 0-1.008 0L7.583 20.8c-.764.446-1.688-.248-1.474-1.106l1.03-4.119A1 1 0 0 0 6.8 14.56l-3.33-2.723c-.698-.571-.342-1.702.557-1.771l4.462-.342a1 1 0 0 0 .84-.597l1.753-4.022Z"/>
                            </svg>                          
                            <span class="text-base md:text-lg text-center">Penilaian dan ulasan</span>                         
                        </a>
                        <a href="" class="flex gap-4 items-center font-semibold p-2 rounded-lg text-wc-red-400 hover:text-white hover:bg-wc-red-400">
                            <svg class="hidden md:block w-6 h-6 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14v3m-3-6V7a3 3 0 1 1 6 0v4m-8 0h10a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1v-7a1 1 0 0 1 1-1Z"/>
                            </svg>                          
                            <span class="text-base md:text-lg text-center">Ganti password</span>                         
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-span-12 md:col-span-9">
            <div class="border-b border-gray-200 bg-white rounded-t-xl">
                <ul class="flex gap-4" id="default-tab" data-tabs-toggle="#default-tab-content" data-tabs-active-classes="text-wc-red-400 hover:text-wc-red-400 border-b-2 border-wc-red-400" data-tabs-inactive-classes="text-gray-500 hover:text-gray-600 hover:border-gray-300 dark:border-gray-700" role="tablist">
                    <li role="presentation">
                        <button class="inline-block p-4 px-8 rounded-t-lg" id="profile-tab" data-tabs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Profile</button>
                    </li>
                    <li role="presentation">
                        <button class="inline-block p-4 px-8 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="address-tab" data-tabs-target="#address" type="button" role="tab" aria-controls="address" aria-selected="false">Alamat</button>
                    </li>
                </ul>
            </div>

            <div class="" id="default-tab-content">
                <div class="p-8 bg-white rounded-b-xl flex flex-col md:gap-6" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="w-full rounded-lg flex flex-col md:flex-row gap-6">
                        <div class="flex flex-col items-center gap-4">
                            <img src="/assets/images/profile.png" class="aspect-square w-[150px] object-cover rounded-full" alt="">
                            <div class="flex gap-2 text-wc-black-000">
                                <svg class="w-6 h-6 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
                                </svg> 
                                <span class="">Edit Photo</span>
                            </div>                     
                        </div>
                        <div class="">
                            <div class="text-lg font-medium text-wc-black-400 flex flex-col gap-4 mb-4">
                                <div class="flex">
                                    <p class="d-block w-40">Nama</p>
                                    <p>{{ auth()->user()->name }}</p>
                                </div>
                                <div class="flex">
                                    <p class="d-block w-40">Tanggal lahir</p>
                                    <p>{!! auth()->user()->tgl_lahir ?? '<a href="#" class="text-base text-wc-red-400">Atur<a>' !!}</p>
                                </div>
                                <div class="flex">
                                    <p class="d-block w-40">No. handphone</p>
                                    <p>{!! auth()->user()->no_hp ?? '<a href="#" class="text-base text-wc-red-400">Atur<a>' !!}</p>
                                </div>
                            </div>
                            {{-- <div class="">
                                <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    <svg class="w-5 h-5 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
                                    </svg>
                                    Ubah informasi pribadi
                                </button>
                            </div> --}}
                        </div>
                    </div>
                    <div class="">
                        <h5 class="text-xl font-semibold">
                            Alamat
                        </h5>
                    </div>
                </div>
                
                <div class="rounded-b-xl bg-white p-6" id="address" role="tabpanel" aria-labelledby="dashboard-tab">
                    <button type="submit" class="w-full px-5 py-3 text-base font-medium text-center text-white bg-wc-red-400 rounded-lg hover:bg-wc-red-300 focus:ring-4 focus:ring-blue-300 sm:w-auto dark:bg-blue-600 dark:hover:bg-wc-red-400 dark:focus:ring-blue-800 mb-4" data-modal-target="address-modal" data-modal-toggle="address-modal">+ Tambah alamat baru</button>
                    <ul>
                        @foreach ($alamats as $alamat)
                        <li>
                            <input type="radio" id="address-{{ $alamat->id }}" name="id" value="{{ $alamat->id }}" class="hidden peer select-address" {{ $alamat->selected ? 'checked' : '' }} required />
                            <div class="p-6 rounded-lg bg-white flex justify-between items-center shadow-lg mb-4 border peer-checked:border-wc-red-400 peer">
                                <div class="">
                                    <div class="flex items-center gap-2">
                                        <svg class="w-4 h-4 text-wc-red-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                                            <path fill-rule="evenodd" d="M11.906 1.994a8.002 8.002 0 0 1 8.09 8.421 7.996 7.996 0 0 1-1.297 3.957.996.996 0 0 1-.133.204l-.108.129c-.178.243-.37.477-.573.699l-5.112 6.224a1 1 0 0 1-1.545 0L5.982 15.26l-.002-.002a18.146 18.146 0 0 1-.309-.38l-.133-.163a.999.999 0 0 1-.13-.202 7.995 7.995 0 0 1 6.498-12.518ZM15 9.997a3 3 0 1 1-5.999 0 3 3 0 0 1 5.999 0Z" clip-rule="evenodd"/>
                                        </svg> 
                                        <p class="font-medium">{{ $alamat->label }} - {{ $alamat->penerima }}</p>                     
                                    </div>
                                    <p class="text-sm mb-2">{{ $alamat->lengkap }}, {{ $alamat->kelurahan }}, {{ $alamat->kota }}, {{ $alamat->provinsi }}, {{ $alamat->kode_pos }}, {{ $alamat->hp_penerima }}</p>
                                </div>
                                <div class="flex flex-col gap-2">
                                    <label label for="address-{{ $alamat->id }}" class="px-4 py-2 text-xs font-medium text-center text-white bg-wc-red-400 rounded-lg hover:bg-wc-red-300 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-wc-red-400 dark:focus:ring-blue-800 cursor-pointer peer-checked:hidden">Pilih</label>
                                    <button type="button" class="px-4 py-2 text-xs font-medium text-center  text-wc-red-400 rounded-lg border border-wc-red-400  focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-wc-red-400 dark:focus:ring-blue-800" data-id="{{ $alamat->id }}">Ubah</button>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div id="address-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                        Tambah alamat baru
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="address-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form class="p-4 md:p-5" id="address-form">
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2">
                            <label for="label" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Label alamat</label>
                            <input type="text" name="label" id="label" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-wc-red-400 focus:border-wc-red-400 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-wc-red-400 dark:focus:border-wc-red-400" placeholder="" required="">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="penerima" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama penerima</label>
                            <input type="text" name="penerima" id="penerima" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-wc-red-400 focus:border-wc-red-400 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-wc-red-400 dark:focus:border-wc-red-400" placeholder="" required="">
                        </div>
                        <div class="col-span-2 sm:col-span-1">
                            <label for="hp_penerima" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No. HP penerima</label>
                            <input type="text" inputmode="numeric" name="hp_penerima" id="hp_penerima" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-wc-red-400 focus:border-wc-red-400 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-wc-red-400 dark:focus:border-wc-red-400" placeholder="" required="">
                        </div>
                        <div class="col-span-2">
                            <label for="lengkap" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat lengkap</label>
                            <textarea id="lengkap" name="lengkap" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-wc-red-400 focus:border-wc-red-400 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-wc-red-400 dark:focus:border-wc-red-400" placeholder=""></textarea>
                        </div>
                        <div class="col-span-2">
                            <label for="provinsi" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Provinsi</label>
                            <select id="provinsi" name="provinsi" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-wc-red-400 focus:border-wc-red-400 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-wc-red-400 dark:focus:border-wc-red-400">
                                <option selected hidden disabled>Pilih provinsi</option>
                            </select>
                        </div>
                        <div class="col-span-2">
                            <label for="kota" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kota</label>
                            <select id="kota" name="kota" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-wc-red-400 focus:border-wc-red-400 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-wc-red-400 dark:focus:border-wc-red-400">
                                <option selected hidden disabled>Pilih kota</option>
                            </select>
                        </div>
                        <div class="col-span-2">
                            <label for="kecamatan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kecamatan</label>
                            <select id="kecamatan" name="kecamatan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-wc-red-400 focus:border-wc-red-400 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-wc-red-400 dark:focus:border-wc-red-400">
                                <option selected hidden disabled>Pilih kecamatan</option>
                            </select>
                        </div>
                        <div class="col-span-2">
                            <label for="kelurahan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kelurahan</label>
                            <select id="kelurahan" name="kelurahan" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-wc-red-400 focus:border-wc-red-400 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-wc-red-400 dark:focus:border-wc-red-400">
                                <option selected hidden disabled>Pilih kelurahan</option>
                            </select>
                        </div>
                        <div class="col-span-2">
                            <label for="kode_pos" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kode Pos</label>
                            <input type="text" inputmode="number" name="kode_pos" id="kode_pos" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-wc-red-400 focus:border-wc-red-400 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-wc-red-400 dark:focus:border-wc-red-400" placeholder="" required="">
                        </div>
                    </div>
                    <button type="submit" class="text-white inline-flex items-center bg-wc-red-400 hover:bg-wc-red-300 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" data-modal-target="address-modal" data-modal-toggle="address-modal">
                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                        Tambah alamat baru
                    </button>
                </form>
            </div>
        </div>
    </div> 
@endsection

@section('script')
    <script>
        $.getJSON('https://www.emsifa.com/api-wilayah-indonesia/api/provinces.json', function(areas) {
            $.each(areas, function(index, area) {
                $('#provinsi').append('<option value="' + area.id + '">' + area.name + '</option>');
            });
        });

        $('#provinsi').on('change', function(){
            $('#kota').empty();
            $('#kota').val('');
            $('#kota').append('<option selected hidden disabled>Pilih kota</option>');
            $('#kecamatan').empty();
            $('#kecamatan').val('');
            $('#kecamatan').append('<option selected hidden disabled>Pilih kecamatan</option>');
            $('#kelurahan').empty();
            $('#kelurahan').val('');
            $('#kelurahan').append('<option selected hidden disabled>Pilih kelurahan</option>');
            let provinsi_id = $('#provinsi').val();
            if (provinsi_id) {
                $.getJSON(`https://www.emsifa.com/api-wilayah-indonesia/api/regencies/${provinsi_id}.json`, function(areas) {
                    $.each(areas, function(index, area) {
                        $('#kota').append('<option value="' + area.id + '">' + area.name + '</option>');
                    });
                });
            }
        });

        $('#kota').on('change', function(){
            $('#kecamatan').empty();
            $('#kecamatan').val('');
            $('#kecamatan').append('<option selected hidden disabled>Pilih kecamatan</option>');
            $('#kelurahan').empty();
            $('#kelurahan').val('');
            $('#kelurahan').append('<option selected hidden disabled>Pilih kelurahan</option>');
            let kota_id = $('#kota').val();
            if (kota_id) {
                $.getJSON(`https://www.emsifa.com/api-wilayah-indonesia/api/districts/${kota_id}.json`, function(areas) {
                    $.each(areas, function(index, area) {
                        $('#kecamatan').append('<option value="' + area.id + '">' + area.name + '</option>');
                    });
                });
            }
        });

        $('#kecamatan').on('change', function(){
            $('#kelurahan').empty();
            $('#kelurahan').val('');
            $('#kelurahan').append('<option selected hidden disabled>Pilih kelurahan</option>');
            let kecamatan_id = $('#kecamatan').val();
            if (kecamatan_id) {
                $.getJSON(`https://www.emsifa.com/api-wilayah-indonesia/api/villages/${kecamatan_id}.json`, function(areas) {
                    $.each(areas, function(index, area) {
                        $('#kelurahan').append('<option value="' + area.id + '">' + area.name + '</option>');
                    });
                });
            }
        });

        $('#address-form').off('submit').on('submit', function(e){
            e.preventDefault();

            let namaProvinsi = '';
            $.ajax({
                url: 'https://www.emsifa.com/api-wilayah-indonesia/api/province/' + $('#provinsi').val() + '.json',
                async: false,
                success: function(response){
                    namaProvinsi = response.name;
                }
            })

            let namaKota = '';
            $.ajax({
                url: 'https://www.emsifa.com/api-wilayah-indonesia/api/regency/' + $('#kota').val() + '.json',
                async: false,
                success: function(response){
                    namaKota = response.name;
                }
            })

            let namaKecamatan = '';
            $.ajax({
                url: 'https://www.emsifa.com/api-wilayah-indonesia/api/district/' + $('#kecamatan').val() + '.json',
                async: false,
                success: function(response){
                    namaKecamatan = response.name;
                }
            })

            let namaKelurahan = '';
            $.ajax({
                url: 'https://www.emsifa.com/api-wilayah-indonesia/api/village/' + $('#kelurahan').val() + '.json',
                async: false,
                success: function(response){
                    namaKelurahan = response.name;
                }
            })
          
            
            let data = {
                label: $('#label').val(),
                lengkap: $('#lengkap').val(),
                penerima: $('#penerima').val(),
                hp_penerima: $('#hp_penerima').val(),
                kode_pos: $('#kode_pos').val(),
                provinsi: namaProvinsi,
                kota: namaKota,
                kecamatan: namaKecamatan,
                kelurahan: namaKelurahan
            };

            console.log(data);  

            $.ajax({
                url: '/alamat',
                type: 'POST',
                data: data,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response){
                    console.log(response);
                    toast('Berhasil menambahkan alamat baru!', 'Oke');
                    location.reload();
                },
                error: function(error){
                    console.error(error);
                },
                complete: function(){
                    $('#address-form').trigger("reset");
                }
            });

        });

        $('.edit-button').on('click', function(){
            let id = $(this).data('id');
        });

        $('.select-address').on('change', function(){
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
                    toast('Berhasil merubah alamat default.', 'Oke');

                },
                error: function(error){
                    console.error(error);
                }
            });
        });
    </script>
@endsection