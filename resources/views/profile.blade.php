@extends('layouts.app')

@section('content')
    <h5 class="text-2xl font-semibold mb-4">Keranjang</h5>
    <div class="grid grid-cols-12 gap-4 relative">
        <div class="col-span-12 md:col-span-4 rounded-xl flex flex-col gap-4">
            <div class="w-full rounded-xl bg-white flex gap-4 p-6">
                <img src="/assets/images/profile.png" alt="" class="w-20 aspec-square">
                <div class="flex flex-col justify-around">
                    <h1 class="text-xl font-semibold">Hai!</h1>
                    <h1 class="text-2xl font-semibold">{{ auth()->user()->name }}</h1>
                </div>
            </div>

            <div class="w-full rounded-xl bg-white p-6">
                <div class="w-full flex flex-row md:flex-col gap-4 list-none">
                    <a href="" class="flex gap-4 items-center font-semibold p-2 rounded-lg text-wc-red-400 hover:text-white hover:bg-wc-red-400">
                        <svg class="w-8 h-8 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-width="2" d="M7 17v1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1a3 3 0 0 0-3-3h-4a3 3 0 0 0-3 3Zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                        </svg> 
                        <span class="text-xl">Akun saya</span>                         
                    </a>
                    <a href="" class="flex gap-4 items-center font-semibold p-2 rounded-lg text-wc-red-400 hover:text-white hover:bg-wc-red-400">
                        <svg class="w-8 h-8 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-width="2" d="M11.083 5.104c.35-.8 1.485-.8 1.834 0l1.752 4.022a1 1 0 0 0 .84.597l4.463.342c.9.069 1.255 1.2.556 1.771l-3.33 2.723a1 1 0 0 0-.337 1.016l1.03 4.119c.214.858-.71 1.552-1.474 1.106l-3.913-2.281a1 1 0 0 0-1.008 0L7.583 20.8c-.764.446-1.688-.248-1.474-1.106l1.03-4.119A1 1 0 0 0 6.8 14.56l-3.33-2.723c-.698-.571-.342-1.702.557-1.771l4.462-.342a1 1 0 0 0 .84-.597l1.753-4.022Z"/>
                        </svg>                          
                        <span class="text-xl">Penilaian dan ulasan</span>                         
                    </a>
                    <a href="" class="flex gap-4 items-center font-semibold p-2 rounded-lg text-wc-red-400 hover:text-white hover:bg-wc-red-400">
                        <svg class="w-8 h-8 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14v3m-3-6V7a3 3 0 1 1 6 0v4m-8 0h10a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1v-7a1 1 0 0 1 1-1Z"/>
                        </svg>                          
                        <span class="text-xl">Ganti password</span>                         
                    </a>
                </div>
            </div>
        </div>

        <div class="col-span-12 md:col-span-8 rounded-xl">
            <ul class="flex gap-4 mb-4">
                <li>
                    <button type="button" class="w-full px-5 py-3 text-base font-medium text-center text-white bg-wc-red-400 rounded-lg hover:bg-wc-red-300 focus:ring-4 focus:ring-blue-300 sm:w-auto dark:bg-blue-600 dark:hover:bg-wc-red-400 dark:focus:ring-blue-800">Informasi pribadi</button>
                </li>
                <li>
                    <button type="button" class="w-full px-5 py-3 text-base font-medium text-center border border-wc-red-400 text-wc-red-400 rounded-lg hover:bg-wc-red-300 hover:text-white focus:ring-4 focus:ring-blue-300 sm:w-auto dark:bg-blue-600 dark:hover:bg-wc-red-400 dark:focus:ring-blue-800">Daftar Alamat</button>
                </li>
            </ul>

            <div class="bg-white p-8 rounded-lg flex flex-col md:gap-6">
                <div class="w-full bg-white rounded-lg flex gap-6">
                    <div class="flex flex-col items-center gap-4">
                        <img src="/assets/images/profile.png" class="aspec-square w-[150px] h-[150px] object-cover rounded-full" alt="">
                        <div class="flex gap-2 text-wc-black-000">
                            <svg class="w-6 h-6 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z"/>
                            </svg> 
                            <span class="">Edit Photo</span>
                        </div>                     
                    </div>
                    <div class="">
                        <div class="text-xl font-medium text-wc-black-400 flex flex-col gap-4 mb-4">
                            <div class="flex">
                                <p class="d-block w-40">Nama</p>
                                <p>{{ auth()->user()->name }}</p>
                            </div>
                            <div class="flex">
                                <p class="d-block w-40">Tanggal lahir</p>
                                <p>{!! auth()->user()->tgl_lahir ?? '<a href="#" class="text-base text-wc-red-400">Tambah tanggal lahir<a>' !!}</p>
                            </div>
                            <div class="flex">
                                <p class="d-block w-40">No. handphone</p>
                                <p>{!! auth()->user()->no_hp ?? '<a href="#" class="text-base text-wc-red-400">Tambah tanggal lahir<a>' !!}</p>
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
        </div>
    </div>
@endsection