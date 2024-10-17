@extends('admin.layouts.dashboard-layout')

@section('title', 'Detail Masyarakat')

@section('header')
    <a href="{{ route('masyarakat.index') }}" class=" hover:underline text-sky-500 ">Data Masyakat</a>
    <p class="ml-2" >/</p>
    <p class="ml-2">Detail Masyakat</p>
@endsection

@section('content')
<div class="justify-center flex font-poppins  lg:mx-5 pt-10"  >
    <div class="">
        <div class="bg-primary w-96 md:w-[445px] lg:w-[760px] xl:w-[960px] text-center h-12 rounded-t text-white shadow"><p class=" pt-2">
            Pengaduan Masyarakat</p></div>
        <div class="bg-white w-96 md:w-[445px] lg:w-[760px] xl:w-[960px] h-56 rounded-b shadow overflow-y-auto">
            <table class="table-auto w-full mt-4 ">
                <tbody>
                    <tr class="">
                        <td class="pl-6 py-2 text-primary ">NIK</td>
                        <td class="py-2">:</td>
                        <td class="py-2 pl-4 text-primary" >{{ $people->nik }}</td>
                    </tr>
                    <tr class="">
                        <td class="pl-6 py-2 text-primary ">Nama</td>
                        <td class="py-2">:</td>
                        <td class="py-2 pl-4 text-primary" >{{ $people->name }}</td>
                    </tr>
                    <tr class="">
                        <td class="pl-6 py-2 text-primary ">Username</td>
                        <td class="py-2">:</td>
                        <td class="py-2 pl-4 text-primary" >{{ $people->username }}</td>
                    </tr>
                    <tr class="">
                        <td class="pl-6 py-2 text-primary ">Telp</td>
                        <td class="py-2">:</td>
                        <td class="py-2 pl-4 text-primary" >{{ $people->telp }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
