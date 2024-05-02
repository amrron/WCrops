<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        <script src="/assets/js/jquery-3.7.1.min.js"></script>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            <main>
                <div class="">
                    <div class="max-w-7xl mx-auto min-h-dvh">
                        <div class="overflow-hidden sm:rounded-lg flex justify-center items-center">
                            <div class="w-full h-dvh flex justify-center items-center">
                                <div class="p-6 flex flex-col items-center gap-6 w-full md:w-1/3 m-auto">
                                    <svg width="110" height="110" viewBox="0 0 110 110" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <mask id="mask0_546_2892" style="mask-type:luminance" maskUnits="userSpaceOnUse" x="9" y="7" width="92" height="96">
                                        <path d="M54.9999 9.16663L67.0381 17.9483L81.9408 17.9208L86.5172 32.1016L98.5897 40.8375L93.9583 55L98.5897 69.1625L86.5172 77.8983L81.9408 92.0791L67.0381 92.0516L54.9999 100.833L42.9618 92.0516L28.0591 92.0791L23.4827 77.8983L11.4102 69.1625L16.0416 55L11.4102 40.8375L23.4827 32.1016L28.0591 17.9208L42.9618 17.9483L54.9999 9.16663Z" fill="white" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M55.5 12L66.6848 20.143L80.5312 20.1175L84.7832 33.267L96 41.3675L91.6968 54.5L96 67.6325L84.7832 75.733L80.5312 88.8825L66.6848 88.857L55.5 97L44.3152 88.857L30.4688 88.8825L26.2168 75.733L15 67.6325L19.3032 54.5L15 41.3675L26.2168 33.267L30.4688 20.1175L44.3152 20.143L55.5 12Z" fill="white" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M38.958 55L50.4163 66.4583L73.333 43.5416" stroke="black" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                                        </mask>
                                        <g mask="url(#mask0_546_2892)">
                                        <path d="M0 0H110V110H0V0Z" fill="#FB473C"/>
                                        </g>
                                    </svg>
                                    <h5 class="font-semibold capitalize	">{{ $message }}</h5>
                                    @if ($transaksi->status == 'settlement')
                                    <h5 class="font-semibold w-full text-start">Detail</h5>
                                    <div class="w-full">
                                        <div class="flex justify-between">
                                            <span class="text-sm text-wc-black-100">Harga Barang</span>
                                            <span class="text-sm text-wc-black-100 rupiah">{{ $transaksi->total_barang }}</span>
                                        </div>
                                        <div class="flex justify-between">
                                            <span class="text-sm text-wc-black-100">Harga Ongkir</span>
                                            <span class="text-sm text-wc-black-100 rupiah">{{ $transaksi->total_ongkir }}</span>
                                        </div>
                                    </div>
                                    <div class="w-full flex justify-between">
                                        <span class="text-sm text-wc-black-100">Total Pembayaran</span>
                                        <span class="text-sm text-wc-black-100 rupiah">{{ $transaksi->total_barang + $transaksi->total_ongkir }}</span>
                                    </div>
                                    @endif
                                    <div class="w-full flex flex-col gap-4">
                                        <a href="/transaksi" class="w-full text-wc-red-400 border border-wc-red-400 hover:bg-wc-red-300 hover:text-white focus:ring-4 focus:ring-wc-red-300 font-medium rounded-lg text-sm px-10 justify-center inline-flex gap-1 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Daftar Transaksi</a>
                                        <a href="/produk" class="w-full text-white bg-wc-red-400 hover:bg-wc-red-300 focus:ring-4 focus:ring-wc-red-300 font-medium rounded-lg text-sm px-10 justify-center inline-flex gap-1 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Belanja Lagi</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>

        @include('js.script')
        @yield('script')
    </body>
</html>
