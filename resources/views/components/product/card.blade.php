@props(['produk'])

<div class="w-full max-w-sm rounded-xl relative border shadow-md">
    <a href="/produk/{{ $produk->slug }}" class="">
        <div class="">
            <img class="w-full rounded-t-lg aspect-square object-cover" src="/storage/{{ $produk->gambar }}" alt="product image" />
        </div>
        <div class="p-4">
            <h5 class="font-normal capitalize tracking-tight text-gray-900">{{ $produk->nama }}</h5>
            <div class="flex flex-col gap-2 md:flex-row items-start md:items-center justify-between">
                <span class="text-md md:text-xl font-bold text-gray-900 rupiah">{{ $produk->harga }}</span>
            </div>
            <div class="flex items-center mt-2.5">
                <div class="flex items-center space-x-1 rtl:space-x-reverse">
                    <svg class="w-4 h-4 text-yellow-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                    </svg>
                </div>
                <span class="text-xs font-semibold px-1 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800 ms-1">{{ $produk->rating }}</span> | <span class="text-xs font-semibold ms-1">{{ $produk->terjual }} Terjual</span>
            </div>
        </div>
    </a>
    @auth
    <button type="button" class="add-to-wishlist hidden md:block absolute bottom-4 right-4 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24" data-screen="lg" data-id="{{ $produk->id }}">
        <svg class="w-7 h-7 text-wc-red-400 dark:text-white hover:fill-wc-red-400 {{ $produk->isInWishlist ? 'fill-wc-red-400' : '' }}" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12.01 6.001C6.5 1 1 8 5.782 13.001L12.011 20l6.23-7C23 8 17.5 1 12.01 6.002Z"/>
        </svg>                                                 
        <span class="sr-only">Tambahkan ke wistlist</span>
    </button>
    <button class="absolute block md:hidden bottom-4 right-2" data-dropdown-toggle="dropdown-{{ $produk->id }}" id="">
        <svg class="w-[24px] h-[24px] text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-width="3" d="M12 6h.01M12 12h.01M12 18h.01"/>
        </svg>          
    </button>
    @endauth
    <div id="dropdown-{{ $produk->id }}" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
        <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
          <li>
            <button href="#" class="add-to-wishlist block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white" data-screen="sm" data-id="{{ $produk->id }}">{{ $produk->isInWishlist ? 'Hapus Dari wishlist' : 'Tambahkan ke wishlist' }}</button>
          </li>
        </ul>
    </div>
</div>