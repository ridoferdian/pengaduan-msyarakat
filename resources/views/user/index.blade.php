@extends('user.layouts.main-layouts')

@section('title', 'PEKAT')

@section('content')


<section class="header" >

    <div class="text-center mt-28">
        <h2 class="text-2xl text-white mt-3 font-nunito md:text-4xl lg:text-5xl" >Layanan Pengaduan Masyarakat</h2>
        <p class="italic text-sm text-white mt-4 font-nunito md:text-lg lg:text-xl">Sampaikan laporan Anda langsung kepada yang pemerintah berwenang</p>
    </div>

    <div class="wave wave1"></div>
    <div class="wave wave2"></div>
    <div class="wave wave3"></div>
    <div class="wave wave4"></div>
</section>

 @if (session('success'))
    <div id="alert1" class="fixed top-32  right-0 bg-green-600 text-white px-4 py-6 rounded transition-transform duration-200 ease-out transform font-poppins translate-x-full">
        {{ session('success') }}
    </div>
    @endif

    @if (session('error'))

    <div id="alert2" class="fixed top-32  right-0 bg-red-800 text-white px-4 py-6 rounded transition-transform duration-200 ease-out transform font-poppins translate-x-full">
        {{ session('error') }}
    </div>
    @endif



<section class="absolute top-72 inset-0 z-[10]">

    <div class="max-w-sm mx-auto sm:max-w-xl md:max-w-2xl bg-white px-8 py-16 rounded shadow-2xl" >
        @if (Session::has('pengaduan'))
                <div class="alert alert-{{ Session::get('type') }}">{{ Session::get('pengaduan') }}</div>
            @endif
        <h1 class="text-2xl font-bold mb-4 font-ubuntu">Lapor Sekarang</h1>

        <div class="relative font-poppins" id="form1"  >
            <form id="mainForm" action="{{ route('submit.report') }}" method="post" enctype="multipart/form-data" class="space-y-4">
                @csrf
                <div>
                    <input type="text" placeholder="Ketik Judul Laporan Anda" name="title" class="block w-full py-3 px-3 text-sm border border-gray-300 rounded-md shadow-sm" value="{{ old('title') }}">
                </div>
                @error('title')
                <p class="ml-2 text-sm">{{ $message }}</p>
                @enderror
                <div>
                    <textarea name="report" id="" placeholder="Ketik Isi Laporan Anda" rows="5" class="mt-1 block w-full py-3 px-3 text-sm border border-gray-300 rounded-md shadow-sm" >{{ old('report') }}</textarea>
                </div>
                @error('report')
                <p class="ml-2 text-sm">{{ $message }}</p>
                @enderror


                <div class="mb-3 ">
                    <select name="category_id" id="category" class="mt-1 block w-full py-3 px-3 text-sm border border-gray-300 rounded-md shadow-sm" required>
                        <option value="">Pilih kategori Laporan Anda</option>
                        @foreach ($categorys as $category )
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id  }}>{{ $category->category_name }}</option>
                    @endforeach
                    </select>
                </div>
                <div class="mb-3 ">
                    <select name="agency_id" id="category" class="mt-1 block w-full py-3 px-3 text-sm border border-gray-300 rounded-md shadow-sm" required>
                        <option value="">Pilih instansi </option>
                        @foreach ($agencys as $agency )
                        <option value="{{ $agency->id }}" {{ old('agency_id') == $agency->id  }}>{{ $agency->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="border border-gray-300 py-1 px-1 rounded-md ">
                    <input type="file" name="photos[]" multiple class="cursor-pointer">

                </div>

                <input type="hidden" name="anonymous" value="0">

                <button type="submit"  class="mt-4 right-0 absolute bg-primary text-white py-2 px-6 font-bold rounded-md">LAPOR</button>
            </form>
        </div>

        <div  class="relative hidden  font-poppins"  id="form2" >
            <form  action="{{ route('submit.anonime') }}" method="post" enctype="multipart/form-data" class="space-y-4">
                @csrf
                <div>
                    <input type="text" placeholder="Ketik Judul Laporan Anda" name="title" class="block w-full py-3 px-3 text-sm border border-gray-300 rounded-md shadow-sm" value="{{ old('title') }}"  >
                </div>
                @error('title')
                <p class="ml-2 text-sm">{{ $message }}</p>
                @enderror
                <div>
                    <textarea name="report" id="" placeholder="Ketik Isi Laporan Anda" rows="5" class="mt-1 block w-full py-3 px-3 text-sm border border-gray-300 rounded-md shadow-sm"  >{{ old('report') }}</textarea>
                </div>
                @error('report')
                        <p class="ml-2 text-sm">{{ $message }}</p>
                @enderror
               

                <div class="mb-3 ">
                    <select name="category_id" id="category" class="mt-1 block w-full py-3 px-3 text-sm border border-gray-300 rounded-md shadow-sm" required>
                        <option value="">Pilih kategori Laporan Anda</option>
                        @foreach ($categorys as $category )
                        <option value="{{ $category->id }}" >{{ $category->category_name }}</option>
                    @endforeach
                    </select>
                </div>
                <div class="mb-3 ">
                    <select name="agency_id" id="category" class="mt-1 block w-full py-3 px-3 text-sm border border-gray-300 rounded-md shadow-sm" required>
                        <option value="">Pilih instansi </option>
                        @foreach ($agencys as $agency )
                        <option value="{{ $agency->id }}" {{ old('agency_id') == $agency->id  }}>{{ $agency->name }}</option>
                    @endforeach
                    </select>
                </div>

                <input type="email" placeholder="masukkan email" name="email"
                class="mt-1 block w-full py-3 px-3 text-sm border border-gray-300 rounded-md shadow-sm @error('email')  @enderror"  value="{{ old('email') }}" autocomplete="off" required>

                @error('email')
                        <p class="ml-2 text-sm">{{ $message }}</p>
                @enderror

                <div class="border border-gray-300 py-1 px-1 rounded-md">
                    <input type="file" name="photos[]" multiple class="cursor-pointer" >
                </div>
                @error('photo')
                        <p class="ml-2 text-sm">{{ $message }}</p>
                @enderror
                <input type="hidden" name="anonymous" value="1">



                <button type="submit"  class="mt-4 right-0 absolute bg-primary
                 text-white py-2 px-6 font-bold rounded-md">LAPOR</button>
            </form>
        </div>

        <div class=" items-center font-poppins mt-4 block">
            @if (Auth::guard('people')->check())

            @else
            <div class="" >
                <input type="radio" name="anonymous" id="checkbox1" class="cursor-pointer text-indigo-600" value="1" >
                <label class="cursor-pointer rounded-full" for="checkbox1">No Anonymous</label>
            </div>

            <div class=""  >
                <input type="radio" name="anonymous" id="checkbox2" class="cursor-pointer text-indigo-600" value="1" >
                <label class=" cursor-pointer" for="checkbox2" >Anonymous</label>
            </div>
            @endauth
        </div>
    </div>

</section>

{{-- jumlah laporan --}}
<section class="mt-[38rem] flex justify-center bg-primary"  >
    <div class="block py-7 ">
        <h1 class="text-white font-ubuntu text-3xl tracking-wider">JUMLAH LAPORAN </h1>
        <p class="flex justify-center mt-6 text-white font-ubuntu text-5xl "> {{ $jumlahLaporan }} </p>
    </div>
</section>
{{-- end jumlah laporan --}}

{{-- instansi --}}
<section class="bg-slate-100 py-10">
    <div class="text-center">
        <h1 class="uppercase text-xl font-nunito font-bold text-gray-500 md:text-2xl">instansi terhubung</h1>
    </div>
    <div class="mt-10 font-poppins grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5">
        <div class="text-center">
            <h1 class="text-6xl font-semibold">{{ $kementerian }}</h1>
            <p>Kementrian</p>
        </div>
        <div class="text-center pt-8 md:pt-0">
            <h1 class="text-6xl font-semibold">{{ $pemkot }}</h1>
            <p>Pemkot</p>
        </div>
        <div class="text-center pt-8 lg:pt-0">
            <h1 class="text-6xl font-semibold">{{ $lembaga }}</h1>
            <p>Lembaga</p>
        </div>
        <div class="text-center pt-8 lg:pt-0">
            <h1 class="text-6xl font-semibold">34</h1>
            <p>Kementrian</p>
        </div>
        <div class="text-center pt-8 lg:pt-0">
            <h1 class="text-6xl font-semibold">34</h1>
            <p>Kementrian</p>
        </div>
        <div class="mt-10 flex justify-center col-span-1 lg:col-span-1 lg:col-start-3">
            <a href="{{ route('instansi') }}" class="uppercase border border-primary py-2 px-4 rounded cursor-pointer hover:bg-primary hover:text-white duration-200 shadow-md tracking-wide">lihat selengkapnya</a>
        </div>
        <div class="">

        </div>
    </div>
</section>


{{-- laporan --}}
@if (Auth::guard('people')->check())
<section class="container  lg:px-28  my-20">
    <div class="">
        <div class="">
            <h1 class="text-4xl font-bold font-ubuntu" >Laporan Terhangat</h1>
        </div>



        <div class="h-[600px] px-3 mt-8 overflow-y-auto">
            @foreach ($messages as $message )
            <div class="border-b border-primary py-8 relative ">
            <div class="flex ml-4 justify-between">
                <img src="{{ asset('images/user_default.png') }}" alt="profil" width="40" class="rounded-full">
                <p class="text-sm">{{ $message->date->diffForHumans() }}</p>
            </div>
            <div class="ml-20 absolute top-5">
                <p class="text-2xl font-nunito">{{ $message->name === 'anonymous' ? 'Anonymous' : $message->name }}</p>
                <div class="flex">
                    <p class="text-xs font-light mt-2">{{ $message->date->format('d F') }}</p>
                    @if ($message->status == '0')
                    <p class="text-xs font-light mt-2 ml-3">Pending</p>
                    @else
                    <p class="text-xs font-light mt-2 ml-3">{{ ucwords($message->status) }}</p>
                    @endif
                    <p class="text-xs font-light mt-2 ml-3">{{ $message->category->category_name }}</p>
                </div>
            </div>
            <div class="mt-12 ml-10">
                <h3 class="text-lg ml-4 mb-2">{{ $message->title }}</h3>

                <p id="report-text-{{ $message->id_message }}" class="text-sm font-montserrat">{{ $message  ->report }}</p>


                @if ($message   ->photo)
                    @php
                        $photos = json_decode($message->photo);
                    @endphp
                    <div class="mt-3 flex ">
                    @foreach ($photos as $photo)
                        <img src="{{ asset('storage/' . $photo) }}" alt="User Photo" width="150" class="mr-2 mb-2 flex">
                    @endforeach
                    </div>
                @endif
            </div>
        </div>
            @endforeach
        </div>
    </div>
</section>
@else

@endauth

{{-- end laporan --}}

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


@endsection























