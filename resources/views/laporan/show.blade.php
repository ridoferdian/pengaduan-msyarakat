<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laporan</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Nunito:ital,wght@0,200..1000;1,200..1000&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/feather-icons"></script>
    @vite('resources/css/app.css')
</head>
<body class="h-screen" >


    <section class="bg-primary h-full pt-20" >
        <div class="container mx-auto max-w-sm md:max-w-xl lg:max-w-3xl mt-10 relative">
            <div class="bg-white p-6 rounded shadow-lg font-poppins">
                <div class="flex justify-between">
                    <img src="{{ asset('images/user_default.png') }}" alt="profil" width="40" class="rounded-full">
                    <p class="text-sm" >{{ $pengaduan->report_timestamp->diffForHumans() }}</p>
                </div>
                <div class="ml-16  absolute top-4 ">
                    <p class="text-2xl ">{{ $pengaduan->name }}</p>

                </div>
                <div class="mt-4 ml-10">
                    <h3 class="text-lg ml-4 mb-2" >{{ $pengaduan->title }}</h3>
                    <p class="text-md font-montserrat " >{{ $pengaduan->report }}</p>
                </div>
                <div class="flex ml-10 mt-5">
                    <i data-feather="calendar" class="mt-1 mr-2 w-[20px] " ></i>
                    <p class="text-sm font-light mt-2">{{ $pengaduan->report_timestamp->format('d F') }}</p>
                    @if ($pengaduan->status == 'pending')
                    <p class="text-sm font-light mt-2 ml-3" >pending</p>
                    @elseif($pengaduan->status == 'proses')
                    <p class="text-sm font-light mt-2 ml-3">{{ ucwords($pengaduan->status) }}</p>
                    @else
                    <p class="text-sm font-light mt-2 ml-3">{{ ucwords($pengaduan->status) }}</p>
                    @endif
                    <p class="text-sm font-light mt-2 ml-3">#{{ $pengaduan->code }}</p>

                </div>
            </div>
        </div>
    </section>

</body>
</html>
