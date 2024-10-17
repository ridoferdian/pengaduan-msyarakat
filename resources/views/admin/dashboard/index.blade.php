@extends('admin.layouts.dashboard-layout')

@section('title','dashboard')

@section('header', 'Dashboard')

@section('content')

<section class="justify-center flex  mt-10" >
    <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-col-4 font-poppins gap-x-44" >
        <div class="">
            <div class="">
                <div class="bg-primary w-72 h-12 rounded-t text-white shadow"><p class="ml-4 pt-2">
                    Petugas</p></div>
                <div class="bg-white w-72 h-14 rounded-b shadow">
                    <div class="text-center pt-4 text-primary ">
                        {{ $petugas }}
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-16 lg:mt-0">
            <div class="">
                <div class="bg-primary w-72 h-12 rounded-t text-white shadow"><p class="ml-4 pt-2">
                    Pengaduan</p></div>
                <div class="bg-white w-72 h-14 rounded-b shadow">
                    <div class="text-center pt-4 text-primary ">
                        {{ $masyarakat }}
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-16">
            <div class="">
                <div class="bg-primary w-72 h-12 rounded-t text-white shadow"><p class="ml-4 pt-2">
                    Pengaduan Proses</p></div>
                <div class="bg-white w-72 h-14 rounded-b shadow">
                    <div class="text-center pt-4 text-primary ">
                        {{ $proses }}
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-16">
            <div class="">
                <div class="bg-primary w-72 h-12 rounded-t text-white shadow"><p class="ml-4 pt-2">
                    Pengaduan Selesai</p></div>
                <div class="bg-white w-72 h-14 rounded-b shadow">
                    <div class="text-center pt-4 text-primary ">
                        {{ $selesai }}
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

@endsection
