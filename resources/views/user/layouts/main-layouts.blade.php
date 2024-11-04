<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css">
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/feather-icons"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    @vite('resources/css/app.css')

    @yield('style')

    <style>
         .transition-transform {
            transition: transform 1s ease-in-out;
        }

        .preview-img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 0.375rem;
            margin-right: 0.5rem;
        }
        .landscape {
            height: 150px;
            width: auto;
        }
        .portrait {
            height: 300px;
            width: 200px;
        }
        .preview-container img {
            object-fit: cover;
            border-radius: 0.5rem;
        }
    </style>
</head>
<body>

    <header class="bg-transparent absolute top-0 left-0 w-full z-[999] " >
    <nav class="mt-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-around h-16">
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('submit') }}" class="text-3xl font-nunito font-bold text-white">Lapor</a>
        </div>

                @if (Auth::guard('people')->check())
                <div class="hidden sm:flex sm:items-center sm:ml-6 font-poppins" id="menu-links">
                    <form action="{{ route('search') }}" >
                        <input type="text"  placeholder="Cari Berdasarkan Kode Pengaduan" name="q" class="cari hidden py-3 px-3 text-sm border border-gray-700 rounded-md shadow-sm w-96" value="{{ request('q') }}">
                    </form>
                    <button type="button" class="BCari text-white hover:text-sky-200 px-3 py-2 rounded-md text-md font-medium mr-3 flex" ><i data-feather="search" class="mr-2"></i>Cari </button>
                    <a href="{{ route('laporan') }}" class="text-white hover:text-sky-200 px-3 py-2 rounded-md text-md font-medium mr-3">Laporan</a>
                    <a href="{{ route('pekat.logout') }}" class="text-white  px-3 py-2 rounded-md text-md font-medium border border-white hover:bg-white hover:text-primary ">{{ Auth::guard('people')->user()->name }}</a>
                </div>
                @else
            <div class="">
                <div class="-mr-2 flex items-center sm:hidden ">
                    <button id="hamburger" type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500" aria-controls="mobile-menu" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                        <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
                <div class="hidden sm:flex sm:items-center sm:ml-6 font-poppins" id="menu-links">
                    <form action="{{ route('search') }}" >
                        <input type="text"  placeholder="Cari Berdasarkan Kode Pengaduan" name="q" class="cari hidden py-3 px-3 text-sm border border-gray-700 rounded-md shadow-sm w-96" value="{{ request('q') }}">
                    </form>
                    <button type="button" class="BCari text-white hover:text-sky-200 px-3 py-2 rounded-md text-md font-medium mr-3 flex" ><i data-feather="search" class="mr-2"></i>Cari </button>
                    <button type="button" id="loginButton" class="text-white hover:text-sky-200 px-3 py-2 rounded-md text-md font-medium mr-3">MASUK</button>
                    <a href="{{ route('formRegister') }}" class="text-white  px-3 py-2 rounded-md text-md font-medium border border-white hover:bg-white hover:text-primary ">DAFTAR</a>
                </div>
            </div>
            @endauth
        </div>
        <!-- Mobile menu, show/hide based on menu state. -->
        <div class="hidden sm:hidden overflow-hidden transition-height ease-out duration-300 text-center font-poppins " id="menu">
            <form action="{{ route('search') }}" >
                <input type="text"  placeholder="Cari Berdasarkan Kode Pengaduan" name="q" class="  py-3 px-3 text-sm border border-gray-700 rounded-md shadow-sm w-96" value="{{ request('q') }}">
            </form>
            <div class="px-2 pt-2 pb-3 space-y-1 bg-gray-600">
                <button type="button" id="loginMobile" class="block w-full py-2 mx-auto rounded-md text-base font-medium text-white  hover:bg-primary">Masuk</button>
                <a href="{{ route('formRegister') }}" class="block px-3 py-2 rounded-md text-base font-medium text-white  hover:bg-primary">Daftar</a>

                </div>
            </div>
        </div>
    </nav>


</header>


@yield('content')

<div id="loginModal" class="hidden fixed inset-0 z-[10000] flex items-center justify-center bg-gray-800 bg-opacity-75 w-full box-border">
    <div class="bg-white p-8 rounded-md shadow-2xl relative max-w-md w-full">
        @if (Session::has('pesan'))
            <div class="mt-2">
                {{ Session::get('pesan') }}
            </div>
        @endif
        <h2 class="text-xl font-bold mb-4 font-nunito">Login</h2>
        <form action="{{ route('login') }}" method="post" class="font-poppins">
            @csrf
            <div class="mb-4">
                <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                <input type="text" name="username" id="username" class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm" required autocomplete="off" value="{{ old('username') }}">
            </div>
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" name="password" id="password" class="mt-1 block w-full py-2 px-3 border border-gray-300 rounded-md shadow-sm" required>
            </div>
            <button type="submit" class="bg-blue-500 flex text-white py-2 px-4 rounded-md">Login</button>
        </form>
        <button id="closeModal" class="mt-4 bg-red-500 text-white px-4 py-2 rounded absolute left-32 bottom-8">Close</button>

        @if (Session::has('error'))
        <div class="relative">
            <a href="{{ route('password.request') }}" class="text-sm text-blue-500 hover:underline absolute right-0 -top-10">Lupa password?</a>
        </div>
        @endif

    </div>
</div>


<footer class="bg-slate-200 pt-24 pb-6 ">
    <div class="container">
        <div class="flex justify-center pb-4 font-poppins">
            <a href="{{ route('submit') }}" class="uppercase" >Privacy</a>
            <a href="{{ route('submit') }}" class="uppercase mx-5" >Beranda</a>
            <a href="{{ route('submit') }}" class="uppercase" >Hubungi Kami</a>
        </div>
      <div class="w-full pt-10 border-t border-slate-700">
      <p class="font-medium text-xs text-slate-500 text-center font-nunito">&copy; 23-8-2024  </p>
      </div>
    </div>
  </footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.4.1/dist/flowbite.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.js" ></script>

<script src="{{ asset('script.js') }}" ></script>
<script>
      feather.replace();

        let table = new DataTable('#in');


      const BCariButtons = document.querySelectorAll(".BCari");
      const cariInputs = document.querySelectorAll(".cari");

      BCariButtons.forEach((button, index) => {
        button.addEventListener("click", function () {
        cariInputs[index].classList.toggle("hidden");



    });
});


document.addEventListener('DOMContentLoaded', function() {
    const page1Alert = document.querySelector('#alert1');
    const page2Alert = document.querySelector('#alert2');

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
});


</script>

<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script>
   $(document).ready(function() {
        $('#searchKeyword').on('keyup', function() {
            var keyword = $(this).val();

            $.ajax({
                url: "{{ route('instansi.search') }}",
                type: "GET",
                data: { keyword: keyword },
                success: function(data) {
                    $('#resultsTableBody').html(data);
                }
            });
        });
    });
</script>

</body>
</html>
