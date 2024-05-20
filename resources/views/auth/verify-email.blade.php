<x-guest-layout>
    <div class="min-h-screen flex sm:justify-center md:justify-around items-center pt-6 sm:pt-0 bg-white">

        <div class="sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <div class="mb-4 text-sm text-wc-black-300">
                {{ __('Terima kasih telah mendaftar! Sebelum memulai, bisakah Anda memverifikasi alamat email Anda dengan mengeklik tautan yang baru saja kami kirimkan melalui email kepada Anda? Jika Anda tidak menerima email tersebut, kami dengan senang hati akan mengirimkan email lainnya.') }}
            </div>

            @if (session('status') == 'verification-link-sent')
                <div class="mb-4 font-medium text-sm text-green-600">
                    {{ __('Tautan verifikasi baru telah dikirim ke alamat email yang Anda berikan saat pendaftaran.') }}
                </div>
            @endif

            <div class="mt-4 flex items-center justify-between gap-4">
                <form method="POST" action="/email/verification-notification">
                    @csrf

                    <div>
                        <x-primary-button>
                            {{ __('Kirim Ulang Email Verifikasi') }}
                        </x-primary-button>
                    </div>
                </form>

                <div class="flex items-center gap-2">
                    <a href="/profile" class="underline text-sm text-wc-black-300 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Profile</a>
                    <form method="POST" action="/logout">
                        @csrf
    
                        <button type="submit" class="underline text-sm text-wc-black-300 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Keluar') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
