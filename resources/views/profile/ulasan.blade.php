@extends('profile.layout')

@section('section')
<div class="border-b border-gray-200 bg-white rounded-t-xl">
    <ul class="flex gap-4" id="default-tab" data-tabs-toggle="#default-tab-content" data-tabs-active-classes="text-wc-red-400 hover:text-wc-red-400 border-b-2 border-wc-red-400" data-tabs-inactive-classes="text-gray-500 hover:text-gray-600 hover:border-gray-300 dark:border-gray-700" role="tablist">
        <li role="presentation">
            <button class="inline-block p-4 px-8 rounded-t-lg" id="profile-tab" data-tabs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Belum diulas</button>
        </li>
        <li role="presentation">
            <button class="inline-flex p-4 px-8 rounded-t-lg hover:text-gray-600 hover:border-gray-300 dark:hover:text-gray-300" id="address-tab" data-tabs-target="#address" type="button" role="tab" aria-controls="address" aria-selected="false">Riwayat  <span class="hidden md:block ms-2"> ulasan</span></button>
        </li>
    </ul>
</div>

<div class="" id="default-tab-content">
    <div class="p-4 md:p-6 bg-white rounded-b-xl space-y-4" id="profile" role="tabpanel" aria-labelledby="profile-tab">

        @foreach($transaksisNoReview as $transaksi)
        <div class="w-full flex flex-col gap-4 p-4 border rounded-xl">
            <span class="">Transaksi {{ $transaksi->createdDate }}</span>

            @foreach ($transaksi->transaksiItems as $items)
            <div class="flex gap-4">
                <img src="/storage/{{ $items->produk->gambar }}" alt="" class="aspect-square object-cover h-20 rounded-lg">
                <div class="flex-grow">
                    <h5 class="text-xl mb-2 font-medium capitalize tracking-tight text-gray-900 line-clamp-1 w-auto md:w-1/2">{{ $items->produk->nama }}</h5>
                    <div class="flex gap-1 items-center mb-2">
                        @for ($i = 1; $i <= 5; $i++)
                        <svg class="w-6 h-6 {{ $i <= $items->nilai ? 'text-yellow-300' : 'text-white stroke-yellow-300' }} dark:text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                            <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                        </svg>
                        @endfor
                    </div>
                    <p class="text-sm">{{ $items->ulasan }}</p>
                </div>
            </div>
            @endforeach
            <button type="button" class="review-button text-white bg-wc-red-400 hover:bg-wc-red-300 focus:ring-4 focus:ring-wc-red-300 font-medium rounded-lg text-xs md:text-sm px-6 md:px-10 py-2 self-center lg:self-start w-full lg:w-auto" data-modal-target="rating-modal" data-modal-toggle="rating-modal" data-id="{{ $transaksi->id }}">Beri ulasan</button>
        </div>
        @endforeach
    </div>
    
    <div class="rounded-b-xl bg-white p-4 md:p-6 space-y-4" id="address" role="tabpanel" aria-labelledby="dashboard-tab">
        @foreach ($transaksis as $transaksi)
        <div class="w-full flex flex-col gap-4 p-4 border rounded-xl">
            <span class="">Transaksi {{ $transaksi->createdDate }}</span>

            @foreach ($transaksi->ulasan as $ulasan)
            <div class="flex gap-4">
                <img src="/storage/{{ $ulasan->produk->gambar }}" alt="" class="aspect-square object-cover h-20 rounded-lg">
                <div class="flex-grow">
                    <a href="/produk/{{ $ulasan->produk->slug }}" class="text-xl mb-2 font-medium capitalize tracking-tight text-gray-900 line-clamp-1 w-auto md:w-1/2">{{ $ulasan->produk->nama }}</a>
                    <div class="flex gap-1 items-center mb-2">
                        @for ($i = 1; $i <= 5; $i++)
                        <svg class="w-6 h-6 {{ $i <= $ulasan->nilai ? 'text-yellow-300' : 'text-gray-300' }} dark:text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                            <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                        </svg>
                        @endfor
                    </div>
                    <p class="text-sm">{{ $ulasan->ulasan }}</p>
                </div>
            </div>
            @endforeach
        </div>
        @endforeach
    </div>
</div>

<div id="rating-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <form action="/transaksi/ulas" id="review-form" method="POST" enctype="multipart/form-data" class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            @csrf
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Beri Ulasan
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="rating-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4 flex flex-col gap-4" id="review-modal-body">
                
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                <button type="submit" class="text-white bg-wc-red-400 hover:bg-wc-red-300 focus:ring-4 focus:ring-wc-red-300 font-medium rounded-lg text-xs md:text-sm px-6 md:px-10 py-2.5">Simpan</button>
                <button data-modal-hide="rating-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Batal</button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('script')
    <script>
        const formatDate = (isoDate) => {
            const date = new Date(isoDate);
            const options = { day: 'numeric', month: 'long', year: 'numeric' };
            return new Intl.DateTimeFormat('id-ID', options).format(date);
        }

        $('.review-button').off('click').on('click', function(){
            $('#review-modal-body').empty();

            let id = $(this).data('id');

            $.ajax({
                url: '/transaksi/' + id + '/items',
                method: 'GET',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response){
                    console.log(response.data);
                    $('#review-modal-body').append(`<input type="hidden" name="transaksi_id" value="${response.data[0].transaksi_id}">`);
                    $.each(response.data, function(index, item){
                        let card = `
                        <div class="grid grid-cols-12 gap-x-4 gap-y-2 p-4 rounded-lg border">
                            <input type="hidden" name="produk_id[]" value="${item.produk_id}">
                            <img src="/storage/${item.produk.gambar}" class="col-span-2 aspect-square object-cover rounded" alt="">
                            <div class="col-span-10">
                                <span class="text-sm text-gray-500">${formatDate(item.created_at)}</span>
                                <h5 class="text-xl font-medium capitalize tracking-tight text-gray-900 line-clamp-1 w-auto md:w-1/2 mb-2">${item.produk.nama}</h5>
                                <div class="flex flex-row-reverse justify-end gap-1 items-center">
                                    <input id="hs-ratings-readonly-1" type="radio" name="nilai[${index}]" class="peer -ms-5 size-5 bg-transparent border-0 text-transparent cursor-pointer appearance-none checked:bg-none focus:bg-none focus:ring-0 focus:ring-offset-0" value="5" checked required>
                                    <label for="hs-ratings-readonly-1" class="peer-checked:text-yellow-300 text-gray-300 pointer-events-none dark:peer-checked:text-yellow-600 dark:text-neutral-600">
                                    <svg class="w-8 h-8 dark:text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                    </svg>
                                    </label>
                                    <input id="hs-ratings-readonly-2" type="radio" name="nilai[${index}]" class="peer -ms-5 size-5 bg-transparent border-0 text-transparent cursor-pointer appearance-none checked:bg-none focus:bg-none focus:ring-0 focus:ring-offset-0" value="4" required>
                                    <label for="hs-ratings-readonly-2" class="peer-checked:text-yellow-300 text-gray-300 pointer-events-none dark:peer-checked:text-yellow-600 dark:text-neutral-600">
                                    <svg class="w-8 h-8 dark:text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                    </svg>
                                    </label>
                                    <input id="hs-ratings-readonly-3" type="radio" name="nilai[${index}]" class="peer -ms-5 size-5 bg-transparent border-0 text-transparent cursor-pointer appearance-none checked:bg-none focus:bg-none focus:ring-0 focus:ring-offset-0" value="3" required>
                                    <label for="hs-ratings-readonly-3" class="peer-checked:text-yellow-300 text-gray-300 pointer-events-none dark:peer-checked:text-yellow-600 dark:text-neutral-600">
                                    <svg class="w-8 h-8 dark:text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                    </svg>
                                    </label>
                                    <input id="hs-ratings-readonly-4" type="radio" name="nilai[${index}]" class="peer -ms-5 size-5 bg-transparent border-0 text-transparent cursor-pointer appearance-none checked:bg-none focus:bg-none focus:ring-0 focus:ring-offset-0" value="2" required>
                                    <label for="hs-ratings-readonly-4" class="peer-checked:text-yellow-300 text-gray-300 pointer-events-none dark:peer-checked:text-yellow-600 dark:text-neutral-600">
                                    <svg class="w-8 h-8 dark:text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                    </svg>
                                    </label>
                                    <input id="hs-ratings-readonly-5" type="radio" name="nilai[${index}]" class="peer -ms-5 size-5 bg-transparent border-0 text-transparent cursor-pointer appearance-none checked:bg-none focus:bg-none focus:ring-0 focus:ring-offset-0" value="1" required>
                                    <label for="hs-ratings-readonly-5" class="peer-checked:text-yellow-300 text-gray-300 pointer-events-none dark:peer-checked:text-yellow-600 dark:text-neutral-600">
                                    <svg class="w-8 h-8 dark:text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                                    </svg>
                                    </label>
                                </div>
                                
                            </div>
                            <textarea id="message" name="ulasan[]" rows="3" maxlength="255" class="col-span-12 block mt-2 p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Tulis ulasan anda..."></textarea>
                        </div> 
                        `;

                        $('#review-modal-body').append(card);
                    });
                },
                error: function(error){
                    console.error(error);
                },
            });
        });
    </script>
@endsection