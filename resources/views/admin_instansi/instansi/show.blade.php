@extends('admin_instansi.layouts.dashboard-layout')

@section('title', 'Instansi')
@section('header')
<a href="{{ route('instansi.index') }}" class=" hover:underline text-sky-500 ">Data Instansi</a>
<p class="ml-2" >/</p>
<p class="ml-2">Laporan</p>
@endsection

@section('content')

    <section>
        @if (session('error'))
        <div id="aler" class="fixed top-20 right-0 bg-green-500 text-white px-4 py-2 rounded transition-transform duration-200 ease-out ">
            {{ session('error') }}
        </div>
        @endif
        <div class="">
            <table id="table" >
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul</th>
                        <th>Laporan</th>
                        <th>Kategori</th>
                        <th>Detail</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($laporan as $instansi )
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $instansi->title }}</td>
                        <td>{{ $instansi->report }}</td>
                        <td>{{ $instansi->category->category_name }}</td>
                        <td><a href="{{ route('instansi.laporan', $instansi->id_message) }}">lihat</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>

@endsection
