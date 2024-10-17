@extends('admin.layouts.dashboard-layout')

@section('title', 'Data Pengaduan')

@section('header', 'Data Pengaduan')

@section('content')

    <div class="overflow-x-auto font-poppins mt-8">
        <table id="pengaduanTable" >
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Isi Laporan</th>
                <th>Status</th>
                <th>Detail</th>
            </tr>
        </thead>
        <tbody>
            @foreach ( $pengaduan as $k => $v )
            <tr>
                <td>{{ $k += 1 }}</td>
                <td>{{ $v->date->format('d-M-Y') }}</td>
                <td>{{ $v->report }}</td>
                <td>
                     @if ($v->status == 'pending')
                    <p class="text-xs  bg-red-800 text-white text-center px-1 py-1 rounded" >pending</p>
                    @elseif($v->status == 'proses')
                    <p class="text-xs bg-yellow-400 text-white text-center px-1 py-1 rounded">{{ ucwords($v->status) }}</p>
                    @else
                    <p class="text-xs bg-green-500 text-white text-center px-1 py-1 rounded">{{ ucwords($v->status) }}</p>
                    @endif
                </td>
                <td><a href="{{ route('pengaduan.show', $v->id_message) }}" style="text-decoration: underline">Lihat</a></td>
                </tr>
            @endforeach

        </tbody>
        </table>
    </div>
@endsection
