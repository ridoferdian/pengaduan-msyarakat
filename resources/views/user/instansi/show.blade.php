@extends('user.layouts.main-layouts')

@section('title', 'Detail Instansi')

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

    <section class="container mx-auto my-5">
        <div class="">
            <div class="py-4 px-2 bg-primary w-full max-w-2xl text-white font-poppins flex">
                <p>Sampaikan Laporan Anda</p>
                <a
              class="text-blue-500 cursor-pointer transition duration-500 ease-in-out right-0 relative"
              id="skill-up"
            >
              <i data-feather="chevron-up"></i>
            </a>
            </div>
            <div class="w-full max-w-2xl mt-3 hidden" id="form-klik">
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
</section>


<script>
    const klikUp = document.querySelector("#skill-up");
const skill = document.querySelector("#form-klik");

klikUp.addEventListener("click", function () {
  skill.classList.toggle("hidden");
  klikUp.classList.toggle("rotate-up");
});


</script>

@endsection
