<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="script.js" ></script>
<script>
      feather.replace();

      document.addEventListener('DOMContentLoaded', function() {

    function showAlert(alertId, duration = 3000) {
        var alertBox = document.getElementById(alertId);
        alertBox.classList.remove('translate-x-full');
        alertBox.classList.add('translate-x-0');


        setTimeout(function() {
            alertBox.classList.remove('translate-x-0');
            alertBox.classList.add('translate-x-full');
        }, duration);
    }


    showAlert('alert1', 3000);
    showAlert('alert2', 3000);
});
</script>


