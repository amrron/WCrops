<script>
    // Ambil semua elemen dengan kelas "rupiah"
    var elements = document.getElementsByClassName('rupiah');

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
</script>