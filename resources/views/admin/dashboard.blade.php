@extends('layouts.admin')

@section('contain')
<div class="p-6 w-full min-h-dvh">
    {{-- <h5 class="text-2xl font-semibold">
        Dashboard
    </h5> --}}
    <div class="w-full grid grid-cols-3 gap-6">
        <div class="col-span-3 md:col-span-1 items-center justify-between p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:flex dark:border-gray-700 sm:p-6 dark:bg-gray-800">
            <div class="w-full">
                <h3 class="text-base font-normal text-gray-500 dark:text-gray-400">Total Produk</h3>
                <span class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl dark:text-white">{{ $total_produk }}</span>
                
            </div>
        </div>    

        <div class="col-span-3 md:col-span-1 items-center justify-between p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:flex dark:border-gray-700 sm:p-6 dark:bg-gray-800">
            <div class="w-full">
                <h3 class="text-base font-normal text-gray-500 dark:text-gray-400">Total User</h3>
                <span class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl dark:text-white">{{ $total_user }}</span>
                
            </div>
        </div>    

        <div class="col-span-3 md:col-span-1 items-center justify-between p-4 bg-white border border-gray-200 rounded-lg shadow-sm sm:flex dark:border-gray-700 sm:p-6 dark:bg-gray-800">
            <div class="w-full">
                <h3 class="text-base font-normal text-gray-500 dark:text-gray-400">Total Pendapatan</h3>
                <span class="text-2xl font-bold leading-none text-gray-900 sm:text-3xl dark:text-white rupiah">{{ $total_pendapatan }}</span>
                
            </div>
        </div> 
        
        <div class="col-span-3 md:col-span-2">
            <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm 2xl:col-span-2 dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                <div class="flex items-center justify-between mb-4">
                  <div class="flex-shrink-0">
                    <span class="text-xl font-bold leading-none text-gray-900 sm:text-2xl dark:text-white rupiah">{{ $total_pendapatan_seminggu }}</span>
                    <h3 class="text-base font-light text-gray-500 dark:text-gray-400">Penjualan Minggu ini</h3>
                  </div>
                  {{-- <div class="flex items-center justify-end flex-1 text-base font-medium text-green-500 dark:text-green-400">
                    12.5%
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                      <path fill-rule="evenodd"
                        d="M5.293 7.707a1 1 0 010-1.414l4-4a1 1 0 011.414 0l4 4a1 1 0 01-1.414 1.414L11 5.414V17a1 1 0 11-2 0V5.414L6.707 7.707a1 1 0 01-1.414 0z"
                        clip-rule="evenodd"></path>
                    </svg>
                  </div> --}}
                </div>
                <div id="main-chart"></div>
                <!-- Card Footer -->
                <div class="flex items-center justify-between pt-3 mt-4 border-t border-gray-200 sm:pt-6 dark:border-gray-700">
                  <div>
                    <select id="chart-time" class="cursor-pointer block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                        <option value="0">Hari ini</option>
                        <option value="1">Kemarin</option>
                        <option value="7">7 Hari lalu</option>
                        <option value="30">30 Hari lalu</option>
                        <option value="90">90 Hari terkahir</option>
                    </select>
                    {{-- <button class="inline-flex items-center p-2 text-sm font-medium text-center text-gray-500 rounded-lg hover:text-gray-900 dark:text-gray-400 dark:hover:text-white" type="button" data-dropdown-toggle="weekly-sales-dropdown">Last 7 days <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg></button>
                    <!-- Dropdown menu -->
                    <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600" id="weekly-sales-dropdown">
                        <ul class="py-1" role="none">
                          <li>
                            <a href="#" data-waktu="1" class="chart-time block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Kemarin</a>
                          </li>
                          <li>
                            <a href="#" data-waktu="0" class="chart-time block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Hari ini</a>
                          </li>
                          <li>
                            <a href="#" data-waktu="7" class="chart-time block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">7 Hari lalu</a>
                          </li>
                          <li>
                            <a href="#" data-waktu="30" class="chart-time block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">30 Hari lalu</a>
                          </li>
                          <li>
                            <a href="#" data-waktu="90" class="chart-time block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">90 Hari Terakhir</a>
                          </li>
                        </ul>
                    </div> --}}
                  </div>
                 
                </div>
            </div>
        </div>

        <div class="col-span-3 md:col-span-1">
            <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 sm:p-6 dark:bg-gray-800">
                <h3 class="flex items-center mb-4 text-lg font-semibold text-gray-900 dark:text-white">Statistik 
                {{-- <button data-popover-target="popover-description" data-popover-placement="bottom-end" type="button"><svg class="w-4 h-4 ml-2 text-gray-400 hover:text-gray-500" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path></svg><span class="sr-only">Show information</span></button> --}}
                </h3>
                <div data-popover id="popover-description" role="tooltip" class="absolute z-10 invisible inline-block text-sm font-light text-gray-500 transition-opacity duration-300 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 w-72 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400">
                  <div class="p-3 space-y-2">
                      <h3 class="font-semibold text-gray-900 dark:text-white">Statistics</h3>
                      <p>Statistics is a branch of applied mathematics that involves the collection, description, analysis, and inference of conclusions from quantitative data.</p>
                      <a href="#" class="flex items-center font-medium text-primary-600 dark:text-primary-500 dark:hover:text-primary-600 hover:text-primary-700">Read more <svg class="w-4 h-4 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg></a>
                  </div>
                  <div data-popper-arrow></div>
                </div>
                {{-- <div class="sm:hidden">
                    <label for="tabs" class="sr-only">Select tab</label>
                    <select id="tabs" class="bg-gray-50 border-0 border-b border-gray-200 text-gray-900 text-sm rounded-t-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option>Statistics</option>
                        <option>Services</option>
                        <option>FAQ</option>
                    </select>
                </div> --}}
                <ul class="text-sm font-medium text-center text-gray-500 divide-x divide-gray-200 rounded-lg flex dark:divide-gray-600 dark:text-gray-400" id="fullWidthTab" data-tabs-toggle="#fullWidthTabContent" role="tablist">
                    <li class="w-full">
                        <button id="faq-tab" data-tabs-target="#faq" type="button" role="tab" aria-controls="faq" aria-selected="true" class="inline-block w-full p-4 rounded-tl-lg bg-gray-50 hover:bg-gray-100 focus:outline-none dark:bg-gray-700 dark:hover:bg-gray-600">Top produk</button>
                    </li>
                    <li class="w-full">
                        <button id="about-tab" data-tabs-target="#about" type="button" role="tab" aria-controls="about" aria-selected="false" class="inline-block w-full p-4 rounded-tr-lg bg-gray-50 hover:bg-gray-100 focus:outline-none dark:bg-gray-700 dark:hover:bg-gray-600">Top user</button>
                    </li>
                </ul>
                <div id="fullWidthTabContent" class="border-t border-gray-200 dark:border-gray-600">
                    <div class="hidden pt-4" id="faq" role="tabpanel" aria-labelledby="faq-tab">
                      <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach ($produks as $produk)
                        <li class="py-3 sm:py-4">
                          <div class="flex items-center justify-between">
                            <div class="flex items-center min-w-0">
                              <img class="flex-shrink-0 w-10 h-10 object-cover" src="/storage/{{ $produk->gambar }}" alt="imac image">
                              <div class="ml-3">
                                <p class="font-medium text-gray-900 truncate dark:text-white">
                                  {{ $produk->nama }}
                                </p>
                                {{-- <div class="flex items-center justify-end flex-1 text-sm text-green-500 dark:text-green-400">
                                  <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path clip-rule="evenodd" fill-rule="evenodd" d="M10 17a.75.75 0 01-.75-.75V5.612L5.29 9.77a.75.75 0 01-1.08-1.04l5.25-5.5a.75.75 0 011.08 0l5.25 5.5a.75.75 0 11-1.08 1.04l-3.96-4.158V16.25A.75.75 0 0110 17z"></path>
                                  </svg>
                                  2.5% 
                                  <span class="ml-2 text-gray-500">vs last month</span>
                                </div> --}}
                              </div>
                            </div>
                            <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white rupiah">
                              {{ $produk->totalPenjualan }}
                            </div>
                          </div>
                        </li>  
                        @endforeach           
                      </ul>
                    </div>
                    <div class="hidden pt-4" id="about" role="tabpanel" aria-labelledby="about-tab">
                      <ul role="list" class="divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach ($users as $user)
                        <li class="py-3 sm:py-4">
                            <div class="flex items-center space-x-4">
                              <div class="flex-shrink-0">
                                <img class="w-8 h-8 rounded-full" src="/assets/images/profile-picture.jpg" alt="Profile">
                              </div>
                              <div class="flex-1 min-w-0">
                                <p class="font-medium text-gray-900 truncate dark:text-white">
                                  {{ $user->name }}
                                </p>
                                <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                                  {{ $user->email }}
                                </p>
                              </div>
                              <div class="inline-flex items-center text-base font-semibold text-gray-900 dark:text-white rupiah">
                                {{ $user->totalPembelian }}
                              </div>
                            </div>
                          </li>
                        @endforeach
                      </ul>
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

<script>

    var options = {
        chart: {
            sparkline: {
                enabled: false
            },
            height: "100%",
            width: "100%",
            type: "area",
            fontFamily: "Inter, sans-serif",
            dropShadow: {
                enabled: false,
            },
            toolbar: {
                show: false,
            },
        },
        series: [
            {
                name: "Total Pendapatan",
                data: [0],
                color: "#1A56DB",
            }
        ],
        xaxis: {
            show: true,
            categories: [],
            labels: {
                show: true,
                style: {
                    fontFamily: "Inter, sans-serif",
                    cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
                }
            },
            axisBorder: {
                show: false,
            },
            axisTicks: {
                show: false,
            },
        },
        yaxis: {
            show: true,
            labels: {
                show: true,
                style: {
                    fontFamily: "Inter, sans-serif",
                    cssClass: 'text-xs font-normal fill-gray-500 dark:fill-gray-400'
                },
                formatter: function (value) {
                    return 'Rp' + value.toLocaleString('id-ID');
                }
            }
        },
        tooltip: {
            enabled: true,
            x: {
                show: false,
            },
            y: {
                formatter: function (value) {
                    return 'Rp' + value.toLocaleString('id-ID');
                }
            }
        },
        fill: {
            type: "gradient",
            gradient: {
                opacityFrom: 0.55,
                opacityTo: 0,
                shade: "#1C64F2",
                gradientToColors: ["#1C64F2"],
            },
        },
        dataLabels: {
            enabled: false,
        },
        stroke: {
            width: 6,
        },
        legend: {
            show: false
        },
        grid: {
            show: false,
        }
    };

    var chart = new ApexCharts(document.querySelector("#main-chart"), options);
    chart.render();

    function showChart(day = 7) {
        fetch('/admin/pendapatan?waktu=' + day)
        .then(response => response.json())
        .then(data => {
            const dates = data.map(item => {
                const date = new Date(item.date);
                return date.toLocaleDateString('id-ID', { day: '2-digit', month: 'short' });
            });
            const totalIncomes = data.map(item => item.total_income);
            
            chart.updateOptions({
                xaxis: {
                    categories: dates, // Kategori baru dari data
                }
            });

            chart.updateSeries([{
                data: totalIncomes
            }]);
        });
    }

    showChart();

    $('#chart-time').on('change', function(){

        let waktu = $(this).val();

        showChart(waktu);
    });
    
</script>
@endsection