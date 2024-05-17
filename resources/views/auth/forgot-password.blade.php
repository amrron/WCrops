<x-guest-layout>
    {{-- <div class="mb-4 text-sm text-gray-600">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-blue-button>
                {{ __('Email Password Reset Link') }}
            </x-blue-button>
        </div>
    </form> --}}

    {{-- <div class="flex flex-col items-center justify-center px-6 pt-8 mx-auto md:h-screen pt:mt-0 dark:bg-gray-900"> --}}
        {{-- <a href="{{< ref "/" >}}" class="flex items-center justify-center mb-8 text-2xl font-semibold lg:mb-10 dark:text-white">
            <img src="/images/logo.svg" class="mr-4 h-11" alt="FlowBite Logo">
            <span>Flowbite</span>  
        </a> --}}
    <div class="min-h-screen flex sm:justify-center md:justify-around items-center pt-6 sm:pt-0 bg-white">
        <div class="sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <!-- Card -->
            <div class="w-full">
                <div class="w-full p-6 sm:p-8">
                    <h2 class="mb-3 text-2xl font-bold text-gray-900 dark:text-white">
                        Lupa Password?
                    </h2>
                    <p class="text-base font-normal text-gray-500 dark:text-gray-400">
                        Jangan khawatir! Cukup ketik email Anda dan kami akan mengirimkan Anda kode untuk mengatur ulang kata sandi Anda!
                    </p>
                    <form class="mt-8 space-y-6" action="#">
                        <div>
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email Anda</label>
                            <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@company.com" required>
                        </div>
                        {{-- <div class="flex items-start">
                            <div class="flex items-center h-5">
                                <input id="remember" aria-describedby="remember" name="remember" type="checkbox" class="w-4 h-4 border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-blue-300 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:bg-gray-700 dark:border-gray-600" required>
                            </div>
                            <div class="ml-3 text-sm">
                                <label for="remember" class="font-medium text-gray-900 dark:text-white">I accept the <a href="#" class="text-blue-700 hover:underline dark:text-blue-500">Terms and Conditions</a></label>
                            </div>
                        </div> --}}
                        <button type="submit" class="w-full px-5 py-2.5 text-base font-medium text-center text-white rounded-lg bg-wc-red-400 hover:bg-wc-red-300">Reset password</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- </div> --}}
</x-guest-layout>
