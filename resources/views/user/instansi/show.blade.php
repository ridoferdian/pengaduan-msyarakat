@extends('user.layouts.main-layouts')

@section('title', 'Detail Instansi')

<section class="bg-primary py-14 ">

</section>

@section('content')
<section class="relative bg-gradient-to-b from-blue-500 to-blue-200 py-14 w-full">

      <defs>
        <linearGradient id="grad1" x1="0%" y1="0%" x2="100%" y2="0%">
          <stop offset="0%" style="stop-color:rgb(74,144,226);stop-opacity:1" />
          <stop offset="100%" style="stop-color:rgb(198,228,255);stop-opacity:1" />
        </linearGradient>
      </defs>
      <path fill="url(#grad1)" d="M0,192L80,192C160,192,320,192,480,202.7C640,213,800,235,960,229.3C1120,224,1280,192,1360,176L1440,160L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z"></path>

    <h1 class="text-3xl font-bold text-center mb-6">{{ $instansi->name }}</h1>
            <p class="text-center mb-6 text-gray-600">{{ $instansi->description }}</p>
</section>
<section class="container mx-auto my-5">
    <div class="flex justify-center">
        <div class="w-full max-w-3xl">
            <!-- Judul Halaman -->


            <!-- Form untuk Sampaikan Laporan Anda -->
            <form action="{{ route('laporan.store') }}" method="POST" enctype="multipart/form-data" class="bg-white shadow-md rounded-lg px-8 pt-6 pb-8 mb-4">
                @csrf
                <h2 class="text-xl font-semibold text-blue-600 mb-6 text-center">Sampaikan Laporan Anda</h2>

                <!-- Klasifikasi Laporan (Dropdown) -->
                <div class="mb-6">
                    <label for="klasifikasiLaporan" class="block text-sm font-medium text-gray-700 mb-2">Pilih Klasifikasi Laporan</label>
                    <select name="klasifikasiLaporan" id="klasifikasiLaporan" class="block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="Pengaduan">Pengaduan</option>
                        <option value="Aspirasi">Aspirasi</option>
                        <option value="Permintaan Informasi">Permintaan Informasi</option>
                    </select>
                </div>

                <!-- Judul Laporan -->
                <div class="mb-6">
                    <label for="judulLaporan" class="block text-sm font-medium text-gray-700 mb-2">Judul Laporan</label>
                    <input type="text" name="judulLaporan" id="judulLaporan" placeholder="Masukkan judul laporan" class="w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>

                <!-- Tanggal Kejadian -->
                <div class="mb-6">
                    <label for="tanggalKejadian" class="block text-sm font-medium text-gray-700 mb-2">Tanggal Kejadian</label>
                    <input type="date" name="tanggalKejadian" id="tanggalKejadian" class="w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>

                <!-- Lokasi Kejadian -->
                <div class="mb-6">
                    <label for="lokasiKejadian" class="block text-sm font-medium text-gray-700 mb-2">Lokasi Kejadian</label>
                    <input type="text" name="lokasiKejadian" id="lokasiKejadian" placeholder="Masukkan lokasi kejadian" class="w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>

                <!-- Kategori Laporan (Dropdown) -->
                <div class="mb-6">
                    <label for="kategoriLaporan" class="block text-sm font-medium text-gray-700 mb-2">Pilih Kategori Laporan</label>
                    <select name="kategoriLaporan" id="kategoriLaporan" class="block w-full px-4 py-3 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="Pelayanan Publik">Pelayanan Publik</option>
                        <option value="Keamanan">Keamanan</option>
                        <option value="Infrastruktur">Infrastruktur</option>
                    </select>
                </div>

                <!-- Tombol Lapor -->
                <div class="flex justify-center">
                    <button type="submit" class="px-6 py-3 bg-blue-600 text-white rounded-md shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        LAPOR!
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
