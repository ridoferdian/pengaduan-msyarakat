<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @include('admin_instansi.partials.link')
    <title>@yield('title')</title>
    @vite('resources/css/app.css')
</head>
<body class=" antialiased leading-default bg-gray-50 text-slate-500">

    @include('admin_instansi.partials.navbar')
    @include('admin_instansi.partials.sidenav')

    <div class=" sm:ml-52 px-4">
        <div class="mt-20 bg-primary py-4 w-96 px-2 rounded flex text-white font-poppins">
           @yield('header')
        </div>
        <div class=" min-h-screen ">
           @yield('content')
        </div>
     </div>

     @include('admin_instansi.partials.script')
</body>
</html>
