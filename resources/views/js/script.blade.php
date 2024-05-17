<script>
    // Ambil semua elemen dengan kelas "rupiah"
    var elements =  $('.rupiah');

    // Fungsi untuk mengubah format ke rupiah
    function formatRupiah(angka) {
        var reverse = angka.toString().split('').reverse().join(''),
        ribuan = reverse.match(/\d{1,3}/g);
        ribuan = ribuan.join('.').split('').reverse().join('');
        return "Rp " + ribuan;
    }

    // Untuk setiap elemen, ubah formatnya
    for(var i = 0; i < elements.length; i++) {
        var element = elements[i];
        var angka = parseInt(element.textContent.trim().replace('Rp ', '').replace('.', ''));
        var formatted = formatRupiah(angka);
        element.textContent = formatted;
    }

    function toast(message, action, url = '#') {
        const toast = $('#toast');
        const toastMessage = $('#toast-message');
        const toastAction = $('#toast-action');

        toastMessage.html(message);
        toastAction.html(action);
        toastAction.prop('href', url);

        toast.removeClass('hidden');
        toast.addClass('flex')

        toastAction.on('click', function(e){
            if (url == '#') {
                e.preventDefault()

                toastMessage.html('');
                toastAction.html('');
                toastAction.prop('href', '#');

                toast.addClass('hidden');
                toast.removeClass('flex')
            }
        });

        setTimeout(function() {
            toastMessage.html('');
            toastAction.html('');
            toastAction.prop('href', '#');

            toast.addClass('hidden');
            toast.removeClass('flex')
        }, 4000);
    }

    $('#find-button').on('click', function () {
        $('#find-form').toggleClass('hidden')
    });

    $('#links-button').on('click', function () {
        $('#nav-links').toggleClass('hidden')
    });
</script>