@extends('admin.layouts.dashboard-layout')

@section('title', 'Data Masyarakat')

@section('header', 'Data Masyarakat')

@section('content')

    <section>
        <div class="overflow-x-auto font-poppins mt-8">
            <table id="pengaduanTable" >
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIK</th>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Telp</th>
                    <th>Detail</th>
                </tr>
            </thead>
            <tbody>
               @foreach($peoples as $people )
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $people->nik }}</td>
                        <td>{{ $people->name }}</td>
                        <td>{{ $people->username }}</td>
                        <td>{{ $people->telp }}</td>
                        <td><a href="{{ route('masyarakat.show', $people->id) }}" style="text-decoration: underline">Lihat</a></td>
                    </tr>
               @endforeach
            </tbody>
            </table>
        </div>
    </section>

@endsection
