<script src="https://code.jquery.com/jquery-3.7.1.slim.min.js" integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.js" ></script>
<script src="{{ asset('script.js') }}" ></script>

<script>

document.addEventListener('DOMContentLoaded', function() {
    const page1Alert = document.querySelector('#alert1');
    const page2Alert = document.querySelector('#alert2');
    const page3Alert = document.querySelector('#alert3');
    const page4Alert = document.querySelector('#alert4');

    function showAlert(alertElement, duration = 3000) {
        alertElement.classList.remove('translate-x-full');
        alertElement.classList.add('translate-x-0');


        setTimeout(function() {
            alertElement.classList.remove('translate-x-0');
            alertElement.classList.add('translate-x-full');
        }, duration);
    }

    if (page1Alert) {
        showAlert(page1Alert);
    }

    if (page2Alert) {
        showAlert(page2Alert);
    }
    if (page3Alert) {
        showAlert(page3Alert);
    }
    if (page4Alert) {
        showAlert(page4Alert);
    }
});

new DataTable('#table');

feather.replace();

</script>
