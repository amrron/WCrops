$(document).ready(function(){

    function successAlert(message){
        let target = $(`
        <div id="toast-top-right" class="z-70 fixed flex items-center w-full max-w-xs p-4 space-x-4 text-green-800 rounded-lg bg-green-50 divide-x rtl:divide-x-reverse divide-gray-200 shadow top-5 right-5 dark:text-gray-400 dark:divide-gray-700 space-x dark:bg-gray-800" role="alert" style="top: 120px; left: 50%; transform: translateX(-50%)">
            <div class="text-sm font-normal">${message}</div>
        </div>
        `);
        $('#main-content').prepend(target);
        console.log('alert');
        
        setTimeout(function() {
            target.hide();
            target.remove()
        }, 2000);
    }

    // successAlert('Hello dunia')

    

    function fetchData(query = "") {
        $.ajax({
            url: '/admin/produk?search='+query, 
            type: 'GET',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                $('#product-table tbody').empty();

                $.each(response.data, function(index, product) {
                    var hargaRupiah = 'Rp ' + product.harga.toString().split('').reverse().join('').match(/\d{1,3}/g).join('.').split('').reverse().join('')

                    var row = '<tr>' +
                        `<td class="w-4 p-4">
                            <div class="flex items-center">
                                <input id="checkbox-${product.id}" aria-describedby="checkbox-1" type="checkbox"
                                    class="checkbox-product w-4 h-4 border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:focus:ring-primary-600 dark:ring-offset-gray-800 dark:bg-gray-700 dark:border-gray-600" data-id="${product.id}">
                                <label for="checkbox-${product.id}" class="sr-only">checkbox</label>
                            </div>
                        </td>
                        <td class="p-4 text-sm font-normal text-gray-500 whitespace-nowrap dark:text-gray-400">
                            <div class="flex gap-2">
                                <img src="/storage/${product.gambar}" alt="" class="h-14 w-14 object-cover">
                                <div class="">
                                    <div class="text-base font-semibold text-gray-900 dark:text-white">${product.nama}</div>
                                    <div class="text-sm font-normal text-gray-500 dark:text-gray-400">${product.kategori}</div>
                                </div>
                            </div>
                        </td>
                        <td class="max-w-sm p-4 overflow-hidden text-base font-normal text-gray-500 truncate xl:max-w-xs dark:text-gray-400">${product.deskripsi}</td>
                        <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">${product.stok}</td>
                        <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white rupiah">${hargaRupiah}</td>
                        <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <label class="inline-flex items-center cursor-pointer">
                                <input type="hidden" name="status-display" value="0">
                                <input type="checkbox" value="1" id="status-display" data-id="${product.id}" name="status-display" class="sr-only peer status-display" ${product.status == 1 ? 'checked' : ''}>
                                <div class="relative w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                                <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300"></span>
                            </label>
                        </td>

                        <td class="p-4 space-x-2 whitespace-nowrap">
                            <button type="button" id="update-product" data-id="${product.id}" class="update-product inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-600 rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z"></path><path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd"></path></svg>
                                Ubah
                            </button>
                            <button type="button" id="deleteProductButton" data-id="${product.id}" class="delete-product inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-red-800 focus:ring-4 focus:ring-red-300 dark:focus:ring-red-900">
                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                Hapus
                            </button>
                        </td>` 
                        + '</tr>';

                    $('#product-table tbody').append(row);
                });
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    }

    fetchData();

    $('#products-search').on('change input', function(){
        let keyword = $(this).val();
        console.log(keyword);

        fetchData(keyword);
    })

    const drawerProduct = new Drawer(document.getElementById('drawer-product'),{ placement: 'right' }, {
        id: 'drawer-product',
        override: true
    });

    drawerProduct.updateOnHide(function(){
        console.log('drawer is hidden');

        $('form#product-form').trigger("reset");
        $('#id').val('');
        $('#preview-image').attr('');
        $('#preview-image').addClass('hidden');
        $('#change-image').addClass('hidden');
        $('#gambar').prop('required', true);

        $('#drawer-product #drawer-label').html('PRODUK BARU');
        $('#drawer-product #submit-product-form').html('Tambah Produk');
    });

    drawerProduct.updateOnShow(function(){
        console.log($('#id').val());
    });

    $('#create-new-product').on('click', function(){
        drawerProduct.show();
    });

    $('#product-table tbody').on('click', '.update-product', function(){
        drawerProduct.show();
        $('#drawer-product #drawer-label').html('UBAH PRODUK');
        $('#drawer-product #submit-product-form').html('Ubah data produk');


        console.log('klik');
        
        let id = $(this).data('id');
        
        $.ajax({
            url: '/admin/produk/' + id,
            method: 'GET',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response){
                let data = response.data;
                $('#id').val(data.id);
                $('#nama').val(data.nama);
                $('#harga').val(data.harga);
                $('#kategori_id').val(data.kategori_id);
                $('#stok').val(data.stok);
                $('#deskripsi').val(data.deskripsi);
                $('#status').prop('checked', data.status);
                $('#preview-image').attr('src', '/storage/' + data.gambar);
                $('#preview-image').removeClass('hidden');
                $('#change-image').removeClass('hidden');
                $('#gambar').prop('required', false);
            }
        })

    });

    $('#product-form').on('submit', function(e){
        e.preventDefault();

        let data = new FormData(this);

        let url = $('#id').val() == '' ? '/admin/produk' : '/admin/produk/' + $('#id').val();
        let method = $('#id').val() == '' ? 'POST' : 'POST';

        $.ajax({
            url : url,
            method: method,
            data: data,
            contentType: false,
            processData: false,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response){
                fetchData();
                console.log('BERHASIL');
                
                let message =  $('#id').val() == '' ? 'Produk baru berhasil ditambahkan' : 'Data produk berhasil diubah'
                drawerProduct.hide();
                successAlert(message)
            },
            error: function(error){
                let message =  $('#id').val() == '' ? 'Produk baru gagal ditambahkan' : 'Data produk gagal diubah'
                drawerProduct.hide();
                successAlert(message)
                console.error(error);
            },
        })
    });



    const drawerDeleteProduct = new Drawer(document.getElementById('drawer-delete-product'), {
        placement: 'right',
    }, {
        id: 'drawer-delete-product',
        override: true
    });

    $(document).off('click').on('click', '.delete-product', function(){
        drawerDeleteProduct.show();

        let id = $(this).data('id');

        if (drawerDeleteProduct.isVisible()) {
            $('#confirm-delete-product').off('click').on('click', function(){
                $.ajax({
                    url: '/admin/produk/' + id,
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function () {
                        successAlert('Produk berhasil dihapus')

                        console.log('berhasil hapus')
                        fetchData()
                    },
                    error: function (error) {
                        console.error(error);
                    },
                    complete: function(){
                        drawerDeleteProduct.hide();
                    }
                })
            });
        }

    })


    $('#product-table tbody').on('change', '.status-display', function(){
        console.log('switch');
        let id = $(this).data('id');

        let data = {
            status : $(this).is(':checked') ? 1 : 0
        }

        $.ajax({
            url: '/admin/produk/status/' + id,
            method: 'PUT',
            data: data,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                console.log('berhasil gantis status');
                successAlert('Status produk berhasil dirubah')
            },
            error: function (error) {
                console.error(error);
                successAlert('Status produk gagal dirubah')
            },
        })
    });

    $('#checkbox-all-product').on('change', function(){
        $('.checkbox-product').prop('checked', $(this).is(':checked'));
    })

    $(document).off('change').on('change', '.checkbox-product', function(){
        if(!$(this).prop("checked")){
            $("#checkbox-all-product").prop('checked', false);
        }

        // Periksa apakah semua checkbox individual dicentang
        if ($('.checkbox-product:checked').length == $('.checkbox-product').length - 1){
            $("#checkbox-all-product").prop('checked', true);
        }

        if ($('.checkbox-product:checked').length > 0){
            let jumlah = $('.checkbox-product').length - 1;
            let jumlahChecked = $('.checkbox-product:checked').length == $('.checkbox-product').length ?  $('.checkbox-product:checked').length - 1 : $('.checkbox-product:checked').length;
            let $content = $(`<div class="w-full flex items-center gap-4">
                <p>${jumlahChecked} / ${jumlah} produk dipilih</p>
                <button type="button" id="nonactive-products" class="px-3 py-2 text-xs font-medium text-gray-700 focus:outline-none bg-none rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100">Nonaktifkan produk</button>
                <div class="">
                    <button id="delete-products">
                        <svg class="w-6 h-6 text-gray-500 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 7h14m-9 3v8m4-8v8M10 3h4a1 1 0 0 1 1 1v3H9V4a1 1 0 0 1 1-1ZM6 7h12v13a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7Z"/>
                        </svg>
                    </button>
                </div>
            </div>`)

            $('#product-info').html($content);
            $('#product-info').nextAll().remove();
            $('#product-info').prop('colspan', 6);
        } else {
            revertTableHeader()
        }
    });

    function revertTableHeader(){
        $('#product-info').html('Info Produk');
        $('#product-info').prop('colspan', 1);
        $('#table-header-row').append(`
        <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
            Deskripsi
        </th>
        <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
            Stok
        </th>
        <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
            Harga
        </th>
        <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
            Status
        </th>
        <th scope="col" class="p-4 text-xs font-medium text-left text-gray-500 uppercase dark:text-gray-400">
            Aksi
        </th>
        `);
    }

    const confirmProductModal = new Modal(document.getElementById('product-confirm-modal'));

    $('#product-table thead').on('click', '#nonactive-products', function(){
        confirmProductModal.show();
        $('#title-modal-product').html('Nonaktifkan Produk?');
        $('#confirm-modal-product').data('action', 'nonactive');
    });

    $('#product-table thead').on('click', '#delete-products', function(){
        confirmProductModal.show();
        let jumlahChecked = $('.checkbox-product:checked').length == $('.checkbox-product').length ?  $('.checkbox-product:checked').length - 1 : $('.checkbox-product:checked').length;
        $('#title-modal-product').html(`Yakin Hapus ${jumlahChecked} Produk?`);
        $('#confirm-modal-product').data('action', 'delete');
    });

    confirmProductModal.updateOnShow(function(){
        let selectedId = [];
        $('.checkbox-product:checked').each(function(){
            $(this).data('id') != undefined ? selectedId.push($(this).data('id')) : '';
        });
        $.ajax({
            url: '/admin/produk/name',
            method: 'GET',
            data: {
                productId: selectedId,
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                console.log(response.data);
                let content = ''
                response.data.forEach(function(value){
                    content += `<div class="py-2 text-start">${value.nama}</div>`;
                })
                $('#product-names').html(content);
            },
            error: function(error){
                console.error(error);
            }
        });
    })

    confirmProductModal.updateOnHide(function(){
        $('#title-modal-product').html('');
        $('#product-names').html(`
        <div role="status" class="m-auto py-2 flex justify-center">
            <svg aria-hidden="true" class="w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor"/>
                <path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill"/>
            </svg>
            <span class="sr-only">Loading...</span>
        </div>
        `);
    });

    $('#confirm-modal-product').off('click').on('click', function(){
        let selectedId = [];
        $('.checkbox-product:checked').each(function(){
            $(this).data('id') != undefined ? selectedId.push($(this).data('id')) : '';
        });

        let url = '/admin/produk/' + ($(this).data('action') == 'nonactive' ? 'status' : 'delete');
        let method = $(this).data('action') == 'nonactive' ? 'PUT' : 'DELETE'
        
        console.log(url + " " + method);

        $.ajax({
            url: url,
            method: method,
            data: {
                productId: selectedId,
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response){
                let message =  method == 'PUT' ? 'Produk berhasil dinonaktifkan' : 'Produk berhasil dihapus'
                drawerProduct.hide();
                successAlert(message)

                console.log('berhasil nonaktifkan / delete');
                fetchData();
            },
            error: function(error){
                console.error(error);
            },
            complete: function(){
                confirmProductModal.hide();
                $('#checkbox-all-product').prop('checked', false);
                revertTableHeader();
            }
        });
    });

})