
@extends('user.layouts.main-layouts')

@section('title', 'Detail Instansi')

@section('style')
  <style>
    body {
        height: 200px;
    }
  </style>
@endsection

@section('content')


<section class="py-14 bg-primary">
</section>

<section class="">
    <div class="bg-[#0ea5e9] relative" >
        <div class="md:flex md:items-center md:flex-row md:ml-72  flex flex-col items-center pt-20 pb-2">
            <img src="{{ asset('images/user_default.png') }}" width="" alt="" class="rounded w-24  md:w-32 ">
            <p class="mt-4 md:mt-0 md:ml-8 text-xl text-white font-poppins ">Kementerian</p>
        </div>
    </div>
</section>

<section>
    
</section>

@if (Auth::guard('people')->check())
<section class="container mx-auto my-5">
    <div class="">
        <div class="py-4 px-2 bg-primary w-full max-w-2xl text-white font-poppins flex justify-between">
            <p>Sampaikan Laporan Anda</p>
            <a
          class="cursor-pointer transition duration-500 ease-in-out right-0 relative"
          id="skill-up">
          <i data-feather="chevron-up"></i>
        </a>
        </div>
        <div class="w-full max-w-2xl mt-3 hidde" id="form-klik">
            <div class="relative font-poppins bg-white px-8 py-16 rounded shadow-2xl">

        <h1 class="text-2xl font-bold mb-4 font-ubuntu">Lapor Sekarang</h1>

                <form id="" action="{{ route('submit.report') }}" method="post" enctype="multipart/form-data" class="space-y-4">
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

                    <div>
                        <input type="date"  name="date" id="tanggal" class="block w-full py-3 px-3 text-sm border border-gray-300 rounded-md shadow-sm" value="{{ old('date') }}" >
                    </div>

                    <div class="mb-3 ">
                       <input type="hidden" name="agency_id" value="{{ $instansi->id }}" >
                    </div>

                    <div class="border border-gray-300 py-1 px-1 rounded-md ">
                        <input type="file" name="photos[]" multiple class="cursor-pointer">

                    </div>

                    <input type="hidden" name="anonymous" value="0">

                    <button type="submit" class="mt-4 right-0 absolute bg-primary text-white py-2 px-6 font-bold rounded-md">LAPOR</button>
                </form>
            </div>
        </div>
    </div>

    <div class="mt-20">
        <div class="">
            <div class="pb-3 pl-3 border-b-2 text-xl mx-auto">
                <a class="mr-4 hover:border-b-sky-800 hover:text-sky-800 pb-3 hover:border-b-2 {{ $status == null ? 'tab-active' : '' }}"
                   href="{{ route('instansi.show', $instansi->slug) }}">
                    Semua
                </a>
                <a class="mr-4 hover:border-b-sky-800 hover:text-sky-800 pb-3 hover:border-b-2 {{ $status == 'pending' ? 'tab-active' : '' }}"
                href="{{ route('instansi.show', ['slug' => $instansi->slug, 'status' => 'pending']) }}">
                 Belum
             </a>
             <a class="mr-4 hover:border-b-sky-800 hover:text-sky-800 pb-3 hover:border-b-2 {{ $status == 'proses' ? 'tab-active' : '' }}"
                href="{{ route('instansi.show', ['slug' => $instansi->slug, 'status' => 'proses']) }}">
                 Proses
             </a>
                <a class="hover:border-b-sky-800 hover:text-sky-800 pb-3 hover:border-b-2 {{ $status == 'done' ? 'tab-active' : '' }}"
                   href="{{ route('instansi.show', ['slug' => $instansi->slug, 'status' => 'done']) }}">
                    Selesai
                </a>
            </div>



        @foreach ($pengaduan as $k => $v)
            <div  class="mt-7 relative pb-3 border-b-2 font-poppins">
                <div class="flex ml-4 justify-between">
                    <img src="{{ asset('images/user_default.png') }}" alt="profil" width="40" class="rounded-full">
                    <p class="text-sm">{{ $v->date->diffForHumans() }}</p>
                </div>
                <div class="ml-20 absolute top-0">
                    <p class="text-2xl font-nunito">{{ $v->name }}</p>
                    <div class="flex">
                        <p class="text-xs font-light mt-2">{{ $v->date->format('d F') }}</p>
                        @if ($v->status == '0')
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
        </div>
    </div>
</section>
@else

@endif



<script>
const klikUp = document.querySelector("#skill-up");
const skill = document.querySelector("#form-klik");

klikUp.addEventListener("click", function () {
  skill.classList.toggle("hidden");
  klikUp.classList.toggle("rotate-up");
});


const inputTanggal = document.getElementById('tanggal');

inputTanggal.addEventListener('focus', () => {
  inputTanggal.placeholder = 'Masukkan tanggal';
});

inputTanggal.addEventListener('blur', () => {
  inputTanggal.placeholder = '';
});
</script>

@endsection
