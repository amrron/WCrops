@extends('profile.layout')

@section('section')

<div class="" id="default-tab-content">
    <div class="p-4 md:p-6 bg-white rounded-xl space-y-4" id="profile" role="tabpanel" aria-labelledby="profile-tab">
        <x-auth-session-status class="my-4" :status="session('status')" />
        <form action="/password" method="post" class="space-y-6">
            @csrf
            @method('put')
            <!-- Old Password -->
            <div>
                <label for="current_password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password Saat Ini</label>
                <input type="password" name="current_password" id="current_password" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-wc-red-400 focus:border-wc-red-400 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-wc-red-400 dark:focus:border-wc-red-400" placeholder="" autofocus required>
                <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
            </div>
            
            <!-- New Password -->
            <div>
                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password Baru</label>
                <input type="password" name="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-wc-red-400 focus:border-wc-red-400 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-wc-red-400 dark:focus:border-wc-red-400" placeholder="" autofocus required>
                {{-- <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" /> --}}
            </div>

            <!-- New Password Confirmation -->
            <div>
                <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Konfirmasi Password Baru</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-wc-red-400 focus:border-wc-red-400 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-wc-red-400 dark:focus:border-wc-red-400" placeholder="" required>
                <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
            </div>

            <button type="submit" class="w-full px-5 py-2.5 text-base font-medium text-center text-white rounded-lg bg-wc-red-400 hover:bg-wc-red-300">Ubah Password</button>
            
        </form>
    </div>
</div>

@endsection

@section('script')
    <script>
        
    </script>
@endsection