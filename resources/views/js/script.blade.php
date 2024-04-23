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

        toast.removeClass('right-[-100%]');
        toast.removeClass('hidden');
        toast.addClass('right-12')
        toast.addClass('flex')

        setTimeout(function() {
            toastMessage.html('');
            toastAction.html('');
            toastAction.prop('href', '#');

            toast.addClass('right-[-100%]');
            toast.addClass('hidden');
            toast.removeClass('right-12')
            toast.removeClass('flex')
        }, 4000);
    }
</script>