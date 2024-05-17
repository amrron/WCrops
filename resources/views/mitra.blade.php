@extends('layouts.app')

@section('content')
<div class="w-full flex items-center justify-center gap-6 h-[calc(100dvh-116px)]">
    <div class="w-8/12 mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
        <div class="w-full rounded-lg bg-white p-6 space-y-8 sm:p-8">
            <h2 class="text-2xl font-bold text-gray-900 text-center dark:text-white">
                Masuk 
            </h2>
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />
            <form class="mt-8 space-y-6" method="POST" action="">
                @csrf
                <div>
                    <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Lengkap</label>
                    <input type="text" name="nama" id="nama" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:border-wc-red-400 focus:ring-0 outline-none block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark dark:focus:border-wc-red-400" placeholder="Masukan nama/instansi usaha Anda" value="{{ old('nama') }}" required>
                    <x-input-error :messages="$errors->get('nama')" class="mt-2" />
                </div>
                <div>
                    <label for="nama_usaha" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Usaha</label>
                    <input type="text" name="nama_usaha" id="nama_usaha" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:border-wc-red-400 focus:ring-0 outline-none block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark dark:focus:border-wc-red-400" placeholder="Masukan nama/instansi usaha Anda" value="{{ old('nama_usaha') }}" required>
                    <x-input-error :messages="$errors->get('nama_usaha')" class="mt-2" />
                </div>
                <div>
                    <label for="alamat_usaha" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat Usaha</label>
                    <textarea type="text" name="alamat_usaha" id="alamat_usaha" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:border-wc-red-400 focus:ring-0 outline-none block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark dark:focus:border-wc-red-400" placeholder="Tempat tingaal, nama jalan, kelurahan, kecamatan, kota, provinsi, kode pos" value="{{ old('alamat_usaha') }}" rows="3" required></textarea>
                    <x-input-error :messages="$errors->get('alamat_usaha')" class="mt-2" />
                </div>
                <div class="flex gap-4">
                    <div class="flex-1">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                        <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:border-wc-red-400 focus:ring-0 outline-none block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark dark:focus:border-wc-red-400" placeholder="xxx@xxx.xx" value="{{ old('email') }}" required>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    <div class="flex-1">
                        <label for="no_hp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No. Handphone</label>
                        <input type="number" name="no_hp" id="no_hp" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:border-wc-red-400 focus:ring-0 outline-none block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark dark:focus:border-wc-red-400" placeholder="08xxxxx" value="{{ old('no_hp') }}" required>
                        <x-input-error :messages="$errors->get('no_hp')" class="mt-2" />
                    </div>
                </div>
                <button type="submit" class="w-full px-5 py-2.5 text-base font-medium text-center text-white bg-wc-red-400 rounded-lg hover:bg-wc-red-300 focus:ring-4">Daftar</button>
                
            </form>
        </div>
    </div>
</div>
@endsection