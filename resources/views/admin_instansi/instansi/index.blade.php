@extends('admin_instansi.layouts.dashboard-layout')

@section('title', 'Instansi')

@section('content')

    <section>
        @if (session('error'))
        <div id="alert2" class="fixed top-20  right-0 bg-red-800 text-white px-4 py-6 rounded transition-transform duration-200 ease-out transform font-poppins translate-x-full">
            {{ session('error') }}
        </div>
    @endif
        <div class="">
            <table id="table" >
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Induk Instansi</th>
                        <th>Nama Instansi</th>
                        <th>Tipe Instansi</th>
                        <th>Detail</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($instansis as $instansi )
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $instansi->parent }}</td>
                        <td>{{ $instansi->type }}</td>
                        <td>{{ $instansi->name }}</td>
                        <td><a href="{{ route('admin_instansi.show', ['id' => $instansi->id]
                        ) }}">lihat</a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>

@endsection
