@extends('profile.layout')

@section('cdn')
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/datepicker.min.js"></script>
@endsection

@section('section')

<div class="" id="default-tab-content">
    <div class="p-4 md:p-6 bg-white rounded-xl space-y-4" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <div class="flex items-center gap-2 mb-4">
            <a href="/profile">
                <svg class="w-8 h-8 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M5 12l4-4m-4 4 4 4"/>
                </svg>                  
            </a>
            <h5 class="text-2xl font-semibold">Ubah Data</h5>
        </div>
        @if (session('status') === 'profile-updated')
        <div class="font-medium text-sm text-green-600">
            Data profile berhasil diubah
        </div>
        @endif
        <form id="send-verification" method="post" action="{{ route('verification.send') }}">
            @csrf
        </form>
        <form action="/profile/setting" method="post" class="grid grid-cols-2 gap-6">
            @csrf
            @method('patch')

            <div class="col-span-2 md:col-span-1">
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-wc-red-400 focus:border-wc-red-400 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-wc-red-400 dark:focus:border-wc-red-400" value="{{ old('name', $user->name) }}" placeholder="Masukkan nama" autofocus required>
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
            
            <div class="col-span-2 md:col-span-1">
                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-wc-red-400 focus:border-wc-red-400 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-wc-red-400 dark:focus:border-wc-red-400" value="{{ old('email', $user->email) }}" placeholder="nama@domain.com" autofocus required>
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                {{-- @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                    <div>
                        <p class="text-sm mt-2 text-gray-800">
                            {{ __('Email Anda belum diverifikasi.') }}
    
                            <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                {{ __('Klik di sini untuk mengirim ulang email verifikasi.') }}
                            </button>
                        </p>
    
                        @if (session('status') === 'verification-link-sent')
                            <p class="mt-2 font-medium text-sm text-green-600">
                                {{ __('Link verifikasi email baru telah dikirim ke alamt email Anda.') }}
                            </p>
                        @endif
                    </div>
                @endif --}}
            </div>

            <div class="col-span-2 md:col-span-1">
                <label for="tanggal_lahir" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Lahir</label>
                <div class="relative ">
                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                       <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                          <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                        </svg>
                    </div>
                    <input datepicker datepicker-autohide datepicker-format="yyyy-mm-dd" type="text"  name="tanggal_lahir" id="tanggal_lahir" class="cursor-pointer bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-wc-red-400 focus:border-wc-red-400 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-wc-red-400 dark:focus:border-wc-red-400" value="{{ old('tanggal_lahir', $user->tanggal_lahir) }}" placeholder="Pilih tanggal">
                </div>
                {{-- <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-wc-red-400 focus:border-wc-red-400 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-wc-red-400 dark:focus:border-wc-red-400" value="{{ old('tanggal_lahir', $user->tanggal_lahir) }}" placeholder="" required> --}}
                <x-input-error :messages="$errors->get('tanggal_lahir')" class="mt-2" />
            </div>

            <div class="col-span-2 md:col-span-1">
                <label for="no_hp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No. Handphone</label>
                <input type="number" inputmode="numeric" pattern="[0-9]*" name="no_hp" id="no_hp" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-wc-red-400 focus:border-wc-red-400 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-wc-red-400 dark:focus:border-wc-red-400" value="{{ old('no_hp', $user->no_hp) }}" placeholder="08xxxx" autofocus>
                <x-input-error :messages="$errors->get('no_hp')" class="mt-2" />
            </div>

            <button type="submit" class="col-span-2 px-5 py-2.5 text-base font-medium text-center text-white rounded-lg bg-wc-red-400 hover:bg-wc-red-300">Ubah Data</button>
            
        </form>
    </div>
</div>

@endsection

@section('script')
    
@endsection