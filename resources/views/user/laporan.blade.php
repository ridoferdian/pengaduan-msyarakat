@extends('user.layouts.main-layouts')

@section('title', 'PEKAT')

@section('content')

<section class="header bg-primary" >

</section>

<section class="container ">
    <div class="absolute top-72 inset-0 ">
        <div class="grid grid-cols-1 lg:grid-cols-3 px-10  gap-6">
            <!-- Div pertama -->
            <div class="lg:col-span-2">
                <div class="max-w-sm mx-auto sm:max-w-xl md:max-w-2xl bg-white px-8 py-8 rounded-md shadow-2xl">
                    @if (Session::has('pengaduan'))
                        <div class="alert alert-{{ Session::get('type') }}">{{ Session::get('pengaduan') }}</div>
                    @endif
                    <h1 class="text-2xl font-bold mb-4 font-ubuntu">Lapor Sekarang</h1>

                    <div id="" class="">
                        <form id="mainForm" action="{{ route('submit.report') }}" method="post" enctype="multipart/form-data" class="space-y-4">
                            @csrf
                            <div>
                                <input type="text" placeholder="Ketik Judul Laporan Anda" name="title" class="block w-full py-3 px-3 text-sm border border-gray-300 rounded-md shadow-sm" value="{{ old('title') }}" >
                            </div>
                            @error('title')
                            <p class="ml-2 text-sm">{{ $message }}</p>
                            @enderror
                            <div>
                                <textarea name="report" id="" placeholder="Ketik Isi Laporan Anda" rows="5" class="mt-1 block w-full py-3 px-3 text-sm border border-gray-300 rounded-md shadow-sm">{{ old('report') }}</textarea>

                            </div>
                            @error('report')
                            <p class="ml-2 text-sm">{{ $message }}</p>
                            @enderror
                            <div class="mb-3 ">
                                <select name="category_id" id="category" class="mt-1 block w-full py-3 px-3 text-sm border border-gray-300 rounded-md shadow-sm" required>
                                    <option value="">Pilih kategori Laporan Anda</option>
                                    @foreach ($categorys as $category )
                                    <option value="{{ $category->id }} " >{{ $category->category_name }}</option>
                                @endforeach
                                </select>
                            </div>
                            <div class="mb-3 ">
                                <select name="agency_id" id="category" class="mt-1 block w-full py-3 px-3 text-sm border border-gray-300 rounded-md shadow-sm" required>
                                    <option value="">Pilih agency </option>
                                    @foreach ($agencys as $agency )
                                    <option value="{{ $agency->id }}" {{ old('agency_id') == $agency->id  }}>{{ $agency->name }}</option>
                                @endforeach
                                </select>
                            </div>
                            <div class="border border-gray-300 py-1 px-1 rounded-md">
                                <input type="file" name="photos[]" multiple >
                            </div>
                            @error('photos.*')
                            <p class="ml-2 text-sm">{{ $message }}</p>
                            @enderror
                            <input type="hidden" name="anonime" value="0">

                            <button type="submit" class="mt-4 flex justify-end bg-primary text-white py-2 px-6 font-bold rounded-md">LAPOR</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Div kedua -->
            <div class="mt-10 lg:mt-0 ">
                <div class="bg-white py-8 px-8 max-w-sm mx-auto sm:max-w-xl md:max-w-2xl lg:max-w-sm rounded-md shadow-2xl">
                    <div class="flex ">
                        <div class="">
                            <img src="{{ asset('images/user_default.svg') }}" alt="user profile" width="60" class="rounded-full">
                        </div>
                        <div class="ml-4 font-poppins ">
                            <h5 class="text-lg tracking-wide" ><a href="#" >{{ Auth::guard('people')->user()->name }}</a></h5>
                            <p class="text-dark py-2">{{ Auth::guard('people')->user()->username }}</p>
                        </div>
                    </div>
                    <div class="mt-5 text-sm flex justify-between  font-montserrat ">
                        <div class="">
                            <p>Terverifikasi</p>
                            <div class="text-center">
                                {{ $hitung[0] }}
                            </div>
                        </div>
                        <div class="">
                            <p>Proses</p>
                            <div class="text-center">
                                {{ $hitung[1] }}
                            </div>
                        </div>
                        <div class="">
                            <p>Selesai</p>
                            <div class="text-center">
                                {{ $hitung[2] }}
                            </div>
                        </div>
                    </div>

                </div>
            </div>





        </div>
    </div>

    <div class="lg:mt-[30rem] mt-[42rem]  lg:col-span-2 pb-20" >
        <div class="">
            <div class="pb-3 pl-3 border-b-2 text-xl mx-auto">
                <a class=" {{ $siapa != 'me' ? 'tab-active' : ''}} mr-4 hover:border-b-sky-800 hover:text-sky-800 hover: pb-3 hover:border-b-2" href="{{ route('laporan') }}">
                    Semua
                </a>
                <a class=" {{ $siapa == 'me' ? 'tab-active' : ''}} hover:border-b-sky-800 hover:text-sky-800 hover: pb-3 hover:border-b-2" href="{{ route('laporan', 'me') }}">
                    Laporan Saya
                </a>

            </div>

            @if ($siapa == 'me')
            @foreach ($pengaduan as $k => $v)
            <div id="report-container-{{ $v->id_message }}" class="mt-7 relative pb-3 border-b-2 font-poppins">
                <div class="flex ml-4 justify-between">
                    <img src="{{ asset('images/user_default.png') }}" alt="profil" width="40" class="rounded-full">
                    <p class="text-sm">{{ $v->date->diffForHumans() }}</p>
                </div>
                <div class="ml-20 absolute top-0">
                    <p class="text-2xl font-nunito">{{ $v->user->name }}</p>
                    <div class="flex">
                        <p class="text-xs font-light mt-2">{{ $v->date->format('d F') }}</p>
                        @if ($v->status == 'pending')
                        <p class="text-xs font-light mt-2 ml-3">Pending</p>
                        @else
                        <p class="text-xs font-light mt-2 ml-3">{{ ucwords($v->status) }}</p>
                        @endif
                        <p class="text-xs font-light mt-2 ml-3">{{ $v->category->category_name }}</p>
                        <p class="text-xs font-light mt-2 ml-3">#{{ $v->code }}</p>
                    </div>
                </div>
                <div class="mt-12 ml-10">
                    <h3 class="text-lg ml-4 mb-2">{{ $v->title }}</h3>

                    <!-- Paragraf laporan -->
                    <p id="report-text-{{ $v->id_message }}" class="text-sm font-montserrat">{{ $v->report }}</p>

                    <!-- Form tersembunyi untuk mengubah laporan -->
                    <form id="form-{{ $v->id_message }}" action="{{ route('laporan.update', $v->id_message) }}" method="post" class="mt-3" style="display: none;">
                        @csrf
                        @method('PUT')
                        <div class="mt-2">
                            <textarea name="report" class="mt-1 block w-full py-3 px-3 text-sm border border-gray-300 rounded-md shadow-sm" rows="4">{{ $v->report }}</textarea>
                        </div>
                        <div class="mt-2">
                            <button type="submit" class="bg-primary text-white p-2 rounded">Simpan Laporan</button>

                        </div>
                    </form>
                    @if ($v->photo)
                        @php
                            $photos = json_decode($v->photo);
                        @endphp
                        <div class="mt-3 flex j">
                        @foreach ($photos as $photo)
                            <img src="{{ asset('storage/' . $photo) }}" alt="User Photo" width="150" class="mr-2 mb-2 flex">
                        @endforeach
                        </div>
                    @endif
                    <div class="mt-4 text-primary">
                        <div class="mt- py-3">
                            @if ($v->response)
                                <p class="text-sm">{{ 'Tanggapan dari: ' . $v->response->officer->name_officer }}</p>
                                <p class="text-sm">{{ $v->response->response }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="flex mt-5">
                        <button type="button" class="text-sm content-center edit-btn" data-id="{{ $v->id_message }}">Ubah Laporan</button>
                        <form action="{{ route('laporan.destroy', $v->id_message) }}" method="post" class="ml-3">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="w-full rounded-md flex text-sm">
                                <i data-feather="x-circle" class="flex ml-3 w-4"></i>
                                <p class="ml-2 content-center">Hapus</p>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
            @else
            @foreach ($message as $k => $v)
            <div  class="mt-7 relative pb-3 border-b-2 font-poppins">
                <div class="flex ml-4 justify-between">
                    <img src="{{ asset('images/user_default.png') }}" alt="profil" width="40" class="rounded-full">
                    <p class="text-sm">{{ $v->date->diffForHumans() }}</p>
                </div>
                <div class="ml-20 absolute top-0">
                    <p class="text-2xl font-nunito">{{ $v->name }}</p>
                    <div class="flex">
                        <p class="text-xs font-light mt-2">{{ $v->date->format('d F') }}</p>
                        @if ($v->status == 'pending')
                        <p class="text-xs font-light mt-2 ml-3">Pending</p>
                        @else
                        <p class="text-xs font-light mt-2 ml-3">{{ ucwords($v->status) }}</p>
                        @endif
                        <p class="text-xs font-light mt-2 ml-3">{{ $v->category->category_name }}</p>
                    </div>
                </div>
                <div class="mt-12 ml-10">
                    <h3 class="text-lg ml-4 mb-2">{{ $v->title }}</h3>

                    <!-- Paragraf laporan -->
                    <p id="report-text-{{ $v->id_message }}" class="text-sm font-montserrat">{{ $v->report }}</p>

                    <!-- Form tersembunyi untuk mengubah laporan -->

                    @if ($v->photo)
                        @php
                            $photos = json_decode($v->photo);
                        @endphp
                        <div class="mt-3 flex j">
                        @foreach ($photos as $photo)
                            <img src="{{ asset('storage/' . $photo) }}" alt="User Photo" width="150" class="mr-2 mb-2 flex">
                        @endforeach
                        </div>
                    @endif
                </div>
            </div>
        @endforeach
            @endif



        </div>
    </div>

</section>


<script>
     document.querySelectorAll('.edit-btn').forEach(button => {
        button.addEventListener('click', function() {
            const id = button.getAttribute('data-id'); // Mendapatkan id laporan dari atribut data-id
            const container = document.getElementById('report-container-' + id); // Mendapatkan elemen container berdasarkan id laporan

            const reportText = container.querySelector('#report-text-' + id); // Temukan paragraf laporan dalam container
            const form = container.querySelector('#form-' + id); // Temukan form dalam container

            reportText.style.display = 'none'; // Sembunyikan paragraf laporan
            form.style.display = 'block'; // Tampilkan form input
        });
    });
</script>


@endsection
