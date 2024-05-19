<nav class="bg-white dark:bg-gray-900 fixed top-0 left-0 w-full z-40 shadow-lg">
    <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl p-4 gap-4 border-b-gray-50">
        <div class="flex gap-2 md:gap-4 items-center w-1/2 justify-start">
          <button class="block md:hidden" id="links-button">
            <svg class="w-8 h-8 block md:hidden text-wc-red-400 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
              <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M5 7h14M5 12h14M5 17h14"/>
            </svg>
          </button>
          <a href="/" class="flex items-center">
              {{-- <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo" /> --}}
              <x-app.logo />             
              {{-- <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Menjamur</span> --}}
          </a>
          <form class="max-w-md flex-grow hidden md:block" method="get" action="/produk">   
            <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                </div>
                <input type="search" name="search" id="default-search" class="block w-full p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg   focus:border-wc-red-400 focus:ring-0" placeholder="Cari produk..." required />
            </div>
          </form>
        </div>
        <div class="flex items-center space-x-6">
            {{-- <a href="">
                <svg class="h-7 w-7 text-whte" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M16 27C16 27 3 20 3 11.75C3 9.95979 3.71116 8.2429 4.97703 6.97703C6.2429 5.71116 7.95979 5 9.75 5C12.5738 5 14.9925 6.53875 16 9C17.0075 6.53875 19.4262 5 22.25 5C24.0402 5 25.7571 5.71116 27.023 6.97703C28.2888 8.2429 29 9.95979 29 11.75C29 20 16 27 16 27Z" stroke="white" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                </svg> 
            </a>
            <a href="tel:5541251234" class="text-sm  text-gray-500">
                <svg class="h-7 w-7 text-white" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M20.7333 17.3333C21.7333 17.3333 22.6133 16.7866 23.0667 15.96L27.84 7.30663C27.9524 7.10453 28.01 6.87659 28.0072 6.64537C28.0045 6.41414 27.9414 6.18765 27.8242 5.98831C27.707 5.78896 27.5398 5.62367 27.3391 5.50878C27.1384 5.3939 26.9112 5.33341 26.68 5.33329H6.94666L5.69333 2.66663H1.33333V5.33329H3.99999L8.79999 15.4533L7 18.7066C6.02666 20.4933 7.30666 22.6666 9.33333 22.6666H25.3333V20H9.33333L10.8 17.3333H20.7333ZM8.21333 7.99996H24.4133L20.7333 14.6666H11.3733L8.21333 7.99996ZM9.33333 24C7.86666 24 6.68 25.2 6.68 26.6666C6.68 28.1333 7.86666 29.3333 9.33333 29.3333C10.8 29.3333 12 28.1333 12 26.6666C12 25.2 10.8 24 9.33333 24ZM22.6667 24C21.2 24 20.0133 25.2 20.0133 26.6666C20.0133 28.1333 21.2 29.3333 22.6667 29.3333C24.1333 29.3333 25.3333 28.1333 25.3333 26.6666C25.3333 25.2 24.1333 24 22.6667 24Z" fill="#ffffff"/>
                </svg>                                   
            </a> --}}
            <div class="flex gap-4 items-center">
                {{-- <button id="find-button" class="block md:hidden">
                  <svg class="w-6 h-6 text-wc-red-400 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m21 21-3.5-3.5M17 10a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z"/>
                  </svg>                  
                </button> --}}
                @guest
                <a href="/login" class="text-wc-red-400 font-semibold text-sm px-2 justify-center hidden md:inline-flex gap-1 " >Masuk</a>
                <a href="/register" class="text-white bg-wc-red-400 fonst-semibold hover:bg-wc-red-300 focus:ring-4 focus:ring-wc-red-300 cursor-pointer rounded-lg text-sm px-10 justify-center hidden md:inline-flex gap-1 py-2.5" >Daftar</a>
                @endguest
                @auth
                <a href="/wishlist" class="hidden md:block">
                    <svg class="w-8 h-8 text-wc-red-400 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12.01 6.001C6.5 1 1 8 5.782 13.001L12.011 20l6.23-7C23 8 17.5 1 12.01 6.002Z"/>
                    </svg>
                </a>
                <a href="/keranjang" class="hidden md:block">
                  <svg class="w-8 h-8 text-wc-red-400 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.25L19 7H7.312"/>
                  </svg>                                                        
                </a>
                <button type="button" class="flex text-sm  rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown" data-dropdown-placement="bottom">
                    <span class="sr-only">Open user menu</span>
                    <svg class="w-8 h-8  text-wc-red-400 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Zm0 0a8.949 8.949 0 0 0 4.951-1.488A3.987 3.987 0 0 0 13 16h-2a3.987 3.987 0 0 0-3.951 3.512A8.948 8.948 0 0 0 12 21Zm3-11a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                    </svg>                    
                    {{-- <svg class="w-8 h-8 block md:hidden text-wc-red-400 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                      <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M5 7h14M5 12h14M5 17h14"/>
                    </svg>                     --}}
                    {{-- <img class="w-8 h-8 rounded-full" src="/assets/images/profile-picture.jpg" alt="user photo"> --}}
                </button>
                <!-- Dropdown menu -->
                <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700 dark:divide-gray-600" id="user-dropdown">
                    <div class="px-4 py-3">
                      <span class="block text-sm text-gray-900 dark:text-white">{{ auth()->user()->name }}</span>
                      <span class="block text-sm  text-gray-500 truncate dark:text-gray-400">{{ auth()->user()->email }}</span>
                    </div>
                    <ul class="py-2" aria-labelledby="user-menu-button">
                      <li>
                        <a href="/profile" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Profile</a>
                      </li>
                      <li>
                        <a href="/transaksi" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Pesanan</a>
                      </li>
                      <li>
                        <a href="/keranjang" class="block md:hidden px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Keranjang</a>
                      </li>
                      <li>
                        <a href="/wishlist" class="block md:hidden px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Wishlist</a>
                      </li>
                    </ul>
                    <form action="/logout" class="py-2" method="post">@csrf <button type="submit" class="block px-4 py-2 w-full text-start text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Keluar</button></form>
                </div>
                @endauth
          </div>
        </div>
        
    </div>
    
    <div class="w-full h-[calc(100dvh-72px)] md:h-auto bg-[#fafbfc] md:bg-wc-red-400 hidden md:block shadow-lg relative" id="nav-links">
      <form class="px-4 w-full block md:hidden" method="get" id="find-form" action="/produk">   
        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
            </div>
            <input type="search" name="search" id="default-search" class="block w-full p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg   focus:border-wc-red-400 focus:ring-0" value="{{ request('search') }}" placeholder="Cari produk..." required />
        </div>
      </form>
      <div class="flex flex-col items-center justify-between h-[calc(100%-38px)]">
          <div class="w-full">
              <ul class="w-full md:w-auto flex flex-col gap-0 md:gap-8 md:flex-row justify-center text-start md:text-center font-bold md:font-medium mt-0 text-normal divide-y md:divide-y-0
              md:text-sm text-wc-red-400 md:text-white">
                  <li class="px-4 py-5 md:py-3">
                      <a href="/" class="w-full h-full hover:underline" aria-current="page">Beranda</a>
                  </li>
                  <li class="px-4 py-5 md:py-3">
                    <a href="/produk" class="w-full h-full hover:underline">Produk</a>
                  </li>
                  <li class="px-4 py-5 md:py-3">
                    <a href="/kemitraan" class="w-full h-full hover:underline">Kemitraan</a>
                  </li>
              </ul>
          </div>
          @guest
          <div class="w-full flex md:hidden flex-col gap-4 px-4 pb-14">
            <a href="/login" class="text-wc-red-400 font-semibold border border-wc-red-400 hover:bg-wc-red-400 hover:text-white cursor-pointer focus:ring-4 focus:ring-wc-red-300 rounded-lg text-sm px-10 justify-center inline-flex gap-1 py-2.5 " >Masuk</a>
            <a href="/register" class="text-white bg-wc-red-400 fonst-semibold hover:bg-wc-red-300 focus:ring-4 focus:ring-wc-red-300 cursor-pointer rounded-lg text-sm px-10 justify-center inline-flex gap-1 py-2.5" >Daftar</a>
          </div>
          @endguest
      </div>
  </div>
</nav>
