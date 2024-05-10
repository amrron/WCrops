@props(['transaksi'])

<div class="w-full bg-white shadow mb-6 rounded-xl">
    <div class="w-full p-3 border border-b-gray-200 flex gap-4 rounded-t-xl">
        <div class="flex items-center gap-2">
            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-width="1" d="M7 17v1a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1a3 3 0 0 0-3-3h-4a3 3 0 0 0-3 3Zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
            </svg>                              
            <h4 class="font-medium text-sm">{{ $transaksi->user->name }}</h4>
        </div>
        <div class="flex items-center gap-2">
            <svg class="w-5 h-5 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M12 8v4l3 3m6-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
            </svg>                                                           
            <h4 class="font-medium text-sm">{{ $transaksi->created_at }}</h4>
        </div>
    </div>
    <div class="grid grid-cols-12 p-4 gap-4 border-x">
        <div class="col-span-4">
            @foreach ($transaksi->transaksiItems as $item)
            <div class="flex gap-2">
                <img src="/storage/{{ $item->produk->gambar }}" class="w-12 h-12 object-cover" alt="">
                <div class="mb-2">
                    <h4 class="font-semibold">{{ $item->produk->nama }}</h4>
                    <span class="text-sm text-wc-black-200">{{ $item->jumlah }} x <span class="rupiah">{{ $item->produk->harga }}</span></span>
                </div>
            </div>
            @endforeach
        </div>
        <div class="col-span-4">
            <span class="text-sm text-wc-black-300 font-semibold">Alamat</span>
            <p class="text-sm text-wc-black-100">{{ $transaksi->alamat->lengkap }}, {{ $transaksi->alamat->kelurahan }}, {{ $transaksi->alamat->kecamatan }}, {{ $transaksi->alamat->kota }}, {{ $transaksi->alamat->provinsi }}, {{ $transaksi->alamat->kode_pos }}, {{ $transaksi->alamat->hp_penerima }}</p>
        </div>
        <div class="col-span-4">
            <span class="font-sm text-wc-black-300 font-semibold">Kurir</span>
            @php
                $total_berat = 0
            @endphp
            @foreach ($transaksi->transaksiItems as $item)
            @php
                $total_berat += $item->jumlah * $item->produk->berat
            @endphp
            @endforeach
            <p class="text-sm text-wc-black-100">{{ $transaksi->kurir }} (
               {{ $total_berat / 1000 }}
             kg)</p>
        </div>
    </div>
    <div class="w-full p-3 border border-t-gray-200 flex justify-end gap-4 rounded-b-xl">
        @if ($transaksi->status == 'settlement')
        <button type="button" class="confirm-order p-2.5 px-4 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 whitespace-nowrap" data-id="{{ $transaksi->id }}">
          Terima Pesanan
      </button>
        @endif
        @if ($transaksi->status == 'onprocess')
        <form action="/transaksi/delivery/{{ $transaksi->id }}" method="POST" id="form-deliver-order" class="flex gap-2 items-center">
            @method('PUT')
            @csrf
            <div class="flex">
              <select name="ekspedisi" id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-l-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                  <option selected value="jne">JNE</option>
                  <option value="jnt">J&T</option>
                  <option value="tiki">Tiki</option>
                  <option value="sicepat">Sicepat</option>
                  <option value="idexpress">IDExpress</option>
                  <option value="anteraja">Anter Aja</option>
                  <option value="wahana">Wahana</option>
                </select>
                <input type="text" name="resi" id="simple-search" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-r-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Masukan resi pengiriman" required />
            </div>
            <button type="submit" class="p-2.5 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 whitespace-nowrap">
                Kirim Pesanan
            </button>
        </form>
        @endif
        @if ($transaksi->status == 'ondelivery')
        <button type="button" data-modal-target="timeline-modal" data-modal-toggle="timeline-modal" class="track-button p-2.5 px-4 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 whitespace-nowrap" data-id="{{ $transaksi->id }}">
          Lacak
        </button>
        @endif
        @if ($transaksi->status == 'finished' && $transaksi->hasReview)
        @foreach ($transaksi->ulasan as $ulasan)
        <div class="">
            <span class="">{{ $ulasan->produk->nama }}</span>
            <div class="flex flex-row-reverse justify-start gap-1 items-center">
                @for ($i = 1; $i <= 5; $i++)
                    <svg class="w-4 h-4 {{ $i <= $ulasan->nilai ? 'text-yellow-300' : 'text-gray-300' }} me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                    </svg>
                @endfor
            </div>
        </div>
        @endforeach
        @endif
    </div>
</div>