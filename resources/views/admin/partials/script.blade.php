<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="script.js" ></script>
<script>
      feather.replace();

      document.addEventListener('DOMContentLoaded', function() {
    // Menampilkan setiap alert satu per satu
    function showAlert(alertId, duration = 3000) {
        var alertBox = document.getElementById(alertId);
        alertBox.classList.remove('translate-x-full'); // Memunculkan dari kanan
        alertBox.classList.add('translate-x-0'); // Menampilkan pesan di tempatnya

        // Menghilangkan alert ke kanan lagi setelah beberapa detik
        setTimeout(function() {
            alertBox.classList.remove('translate-x-0'); // Geser ke kanan
            alertBox.classList.add('translate-x-full'); // Menghilang ke kanan
        }, duration); // Waktu tampil
    }

    // Menampilkan alert 1 dan alert 2 secara terpisah
    showAlert('alert1', 3000); // Misalnya alert pertama tampil selama 3 detik
    showAlert('alert2', 3000); // Alert kedua tampil selama 4 detik, bisa disesuaikan
});
</script>


