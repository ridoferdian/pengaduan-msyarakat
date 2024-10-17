@extends('admin.layouts.dashboard-layout')

@section('title', 'Data Petugas')

@section('header', 'Data Petugas')

@section('content')

<section>
    <div class="mt-5">
        <a href="{{ route('petugas.create') }}" class="font-semibold text-sm font-montserrat px-2 py-2 mt-6 bg-sky-400 rounded-md shadow-md text-primary " >Tambah Petugas</a>
    </div>
    <div class="overflow-x-auto font-poppins mt-8">

        <table id="pengaduanTable" >
        <thead>
            <tr>
                <th>No</th>
                <th>nama</th>
                <th>Username</th>
                <th>telp</th>
                <th>level</th>
                <th>Detail</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $petugas as $k => $v )
            <tr>
                <td>{{ $k += 1 }}</td>
                <td>{{ $v->name_officer }}</td>
                <td>{{ $v->username }}</td>
                <td>{{ $v->telp }}</td>
                <td>{{ $v->level }}</td>
                <td><a href="{{ route('petugas.edit', $v->id_officer) }}" style="text-decoration: underline">Edit</a></td>
                </tr>
            @endforeach

        </tbody>
        </table>
    </div>
</section>


@endsection
