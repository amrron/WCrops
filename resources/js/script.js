$(document).ready(function(){

    function fetchData() {
        $.ajax({
            url: '/admin/produk', // Sesuaikan dengan rute yang tepat di Laravel Anda
            type: 'GET',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(response) {
                $('#data-table tbody').empty();

                $.each(response.data, function(index, product) {
                    var row = '<tr>' +
                        `<td class="w-4 p-4">
                            <div class="flex items-center">
                                <input id="checkbox-${product.id}" aria-describedby="checkbox-1" type="checkbox"
                                    class="w-4 h-4 border-gray-300 rounded bg-gray-50 focus:ring-3 focus:ring-primary-300 dark:focus:ring-primary-600 dark:ring-offset-gray-800 dark:bg-gray-700 dark:border-gray-600">
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
                        <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white rupiah">${product.harga}</td>
                        <td class="p-4 text-base font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <label class="inline-flex items-center cursor-pointer">
                                <input type="hidden" name="status-display" value="0">
                                <input type="checkbox" value="1" id="status-display" data-id="${product.id}" name="status-display" class="sr-only peer status-display" ${product.status == 1 ? 'checked' : ''}>
                                <div class="relative w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                                <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300"></span>
                            </label>
                        </td>

                        <td class="p-4 space-x-2 whitespace-nowrap">
                            <button type="button" id="updateProductButton" data-id="${product.id}" class="update-product inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-600 rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">
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

    $('#create-new-product').off('click').on('click', function(){
        drawerProduct.show();
    });

    $('.update-product').off('click').on('click', function(){
        drawerProduct.show();
        $('#drawer-product #drawer-label').html('UBAH PRODUK');
        $('#drawer-product #submit-product-form').html('Ubah data produk');


        console.log('klik');
        
        let id = $(this).data('id');
        console.log(id);
        
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
                console.log('BERHASIL');
                fetchData();
                drawerProduct.hide();
            },
            error: function(error){
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
                    success: function (response) {
                        console.log('berhasil hapus')
                        fetchData();
                        drawerDeleteProduct.hide();
                    },
                    error: function (error) {
                        console.error(error);
                    },
                })
            });
        }

    })


    $(document).off('change').on('change', '.status-display', function(){

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
            },
            error: function (error) {
                console.error(error);
            },
        })
    });

})