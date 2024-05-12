@extends('layouts.app')

@section('content')
    {{-- <h5 class="text-2xl font-semibold mb-4">Profile</h5> --}}
    <div class="grid grid-cols-12 gap-6 mt-6 relative">
        <div class="col-span-12 md:col-span-3">
            <div class="w-full rounded-none md:rounded-xl shadow-lg flex flex-col border">
                <div class="w-full gap-4 p-6 flex">
                    <img src="/assets/images/profile.png" alt="" class="w-20 aspect-square">
                    <div class="flex flex-col justify-around">
                        <h1 class="text-xl font-semibold">Hai!</h1>
                        <h1 class="text-2xl font-semibold">{{ auth()->user()->name }}</h1>
                    </div>
                </div>
    
                <div class="w-full p-6">
                    <div class="w-full flex flex-row justify-between md:flex-col gap-4 list-none text-sm md:text-normal">
                        <a href="/profile" class="flex gap-4 items-center font-semibold p-2 rounded-lg text-wc-red-400 hover:text-white hover:bg-wc-red-400">
                            <svg class="hidden md:block w-6 h-6 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-width="2" d="M7 17v1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1a3 3 0 0 0-3-3h-4a3 3 0 0 0-3 3Zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                            </svg> 
                            <span class="text-base md:text-lg text-center">Akun</span>                         
                        </a>
                        <a href="/profile/ulasan" class="flex gap-4 items-center font-semibold p-2 rounded-lg text-wc-red-400 hover:text-white hover:bg-wc-red-400">
                            <svg class="hidden md:block w-6 h-6 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-width="2" d="M11.083 5.104c.35-.8 1.485-.8 1.834 0l1.752 4.022a1 1 0 0 0 .84.597l4.463.342c.9.069 1.255 1.2.556 1.771l-3.33 2.723a1 1 0 0 0-.337 1.016l1.03 4.119c.214.858-.71 1.552-1.474 1.106l-3.913-2.281a1 1 0 0 0-1.008 0L7.583 20.8c-.764.446-1.688-.248-1.474-1.106l1.03-4.119A1 1 0 0 0 6.8 14.56l-3.33-2.723c-.698-.571-.342-1.702.557-1.771l4.462-.342a1 1 0 0 0 .84-.597l1.753-4.022Z"/>
                            </svg>                          
                            <span class="text-base md:text-lg text-center">Ulasan</span>                         
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

        <div class="col-span-12 md:col-span-9 bg-white rounded-none md:rounded-xl shadow-lg border">
            @yield('section')
        </div>
    </div>
@endsection

@section('script')
    @yield('script')
@endsection