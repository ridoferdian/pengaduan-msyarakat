<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Register</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    @vite('resources/css/app.css')
</head>
<body>

        <section class="h-screen bg-primary " >
            <div class="px-4 flex justify-center relative">
                @if (Session::get('pesanNama'))
                <div class="absolute mt-10 font-poppins bg-gray-500 px-16 py-2 rounded text-white">
                    {{ Session::get('pesanNama') }}
                </div>
                @endif
                <div class="bg-[#fffffe] px-7 mt-24 rounded-lg  ">

                    <h1 class="font-nunito text-3xl font-bold py-6 mx-auto flex justify-center" >Daftar</h1>
                    <form action="{{ route('register') }}" method="POST" class="font-poppins" >
                        @csrf
                        <div class="mt-4">
                            <input type="number" name="nik" placeholder="NIK" class="border border-gray-600 py-1 px-2 rounded placeholder:text-gray-400 focus:outline-none focus:ring-1 focus:border-gray-600 focus:ring-secondary" autocomplete="off" value="{{ old('nik') }}" >
                        </div>
                        @error('nik')
                        <p class="ml-2 text-sm">{{ $message }}</p>
                        @enderror
                        <div class="mt-4">
                            <input type="text" name="name" placeholder="Nama Lengkap" class="border border-gray-600 py-1 px-2 rounded placeholder:text-gray-400 focus:outline-none focus:ring-1 focus:border-gray-600 focus:ring-secondary" value="{{ old('name') }}" autocomplete="off">
                        </div>
                        @error('name')
                        <p class="ml-2 text-sm">{{ $message }}</p>
                        @enderror
                        <div class="mt-4">
                            <input type="text" name="username" placeholder="Username" class="border border-gray-600 py-1 px-2 rounded placeholder:text-gray-400 focus:outline-none focus:ring-1 focus:border-gray-600 focus:ring-secondary" value="{{ old('username') }}" autocomplete="off">
                        </div>
                        @error('username')
                        <p class="ml-2 text-sm">{{ $message }}</p>
                        @enderror
                        <div class="mt-4">
                            <input type="tel" name="telp" placeholder="Telp" class="border border-gray-600 py-1 px-2  roundedplaceholder:text-gray-400 focus:outline-none focus:ring-1 focus:border-gray-600 focus:ring-secondary" value="{{ old('telp') }}" autocomplete="off">
                        </div>
                        @error('telp')
                        <p class="ml-2 text-sm">{{ $message }}</p>
                        @enderror
                        <div class="mt-4">
                            <input type="email" name="email" placeholder="Email" class="border border-gray-600 py-1 px-2 rounded placeholder:text-gray-400 focus:outline-none focus:ring-1 focus:border-gray-600 focus:ring-secondary" value="{{ old('email') }}">
                        </div>
                        @error('email')
                        <p class="ml-2 text-sm">{{ $message }}</p>
                        @enderror
                        <div class="mt-4">
                            <input type="password" name="password" placeholder="Password" class="border border-gray-600 py-1 px-2 rounded placeholder:text-gray-400 focus:outline-none focus:ring-1 focus:border-gray-600 focus:ring-secondary" value="{{ old('password') }}">
                        </div>
                        @error('password')
                        <p class="ml-2 text-sm">{{ $message }}</p>
                        @enderror

                        <input type="hidden" name="role" value="user">

                        <button type="submit" class="bg-primary my-4 w-full py-1 text-white tracking-wider rounded-md font-nunito "  >REGISTER</button>
                    </form>

                </div>
            </div>
            <div class="flex justify-center mt-7">
                <a href="{{ route('submit') }}" class="bg-gray-700 font-poppins rounded px-16 py-2 text-white mx-auto" >Kembali Ke Halaman Utama</a>
            </div>

    </section>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>

    <script src="script.js" ></script>
    <script>
          feather.replace();
    </script>


    </body>
    </html>
