@extends('admin.layouts.dashboard-layout')

@section('title', 'Laporan')

@section('header', 'Laporan')

@section('content')

<section class="xl:flex xl:justify-between">
    <div class="justify-center flex font-poppins  lg:ml-5 pt-10"  >
        <div class="">
            <div class="bg-primary w-96 md:w-[445px] lg:w-[520px] xl:w-[350px] text-center h-12 rounded-t text-white shadow"><p class=" pt-2">
                Cari Berdasarkan Tanggal</p></div>
            <div class="bg-white w-96 md:w-[445px] lg:w-[520px] xl:w-[350px] h-56 rounded-b shadow-xl overflow-y-auto">
            <div class="">
                <form action="{{ route('laporan.getLaporan') }}" method="POST">
                    @csrf
                    <div class="mx-5 pt-5">
                        <input type="date" name="from" placeholder="Tanggal Awal"  class="block w-full py-2 text-sm border border-primary rounded-md shadow-sm mt-2 outline-primary" >
                    </div>
                    <div class="mx-5 pt-5">
                        <input type="date" name="to" placeholder="Tanggal Akhir"  class="block w-full py-2 text-sm border border-primary rounded-md shadow-sm mt-2 outline-primary" >
                    </div>
                    <div class="mx-5 pt-5">
                        <button type="submit" class="bg-primary w-full text-white py-2 px-6 font-bold rounded-md"  >Cari Laporan</button>
                    </div>
                </form>
            </div>

            </div>

        </div>
    </div>
    <div class="justify-center flex font-poppins  lg:ml-5 pt-10"  >
        <div class="">
            <div class="bg-primary w-96 md:w-[445px] lg:w-[520px] xl:w-[650px] flex justify-between items-center h-12 rounded-t text-white shadow"><p class="ml-4">
                Data Berdasarkan Tanggal</p>
                @if ($pengaduans ?? '')

                <a href="{{ route('laporan.cetak', ['from' => $from, 'to' => $to]) }}" class="py-2 px-3 bg-red-600  mr-3" > Export PDF</a>
                @endif
            </div>
            <div class="bg-white w-96 md:w-[445px] lg:w-[520px] xl:w-[650px] pb-5 px-5 rounded-b shadow-xl block">
                <div class="">
                @if ($pengaduans ?? '')
                <div class="">
                    <table class=" w-full ">
                        <thead>
                            <th class="px-2 py-2 border-b border-secondary" >No</th>
                            <th class="px-2 py-2 border-b border-secondary">Tanggal</th>
                            <th class="px-2 py-2 border-b border-secondary">Isi Laporan</th>
                            <th class="px-2 py-2 border-b border-secondary">Status</th>
                        </thead>
                        <tbody>
                            @foreach ($pengaduans as $pengaduan )
                                <tr>
                                <td class="px-2 py-2 border-b border-secondary">{{ $loop->iteration }}</td>
                                <td class="px-2 py-2 border-b border-secondary"> {{ $pengaduan->date }}</td>
                                <td class="px-2 py-2 border-b border-secondary">{{ $pengaduan->report }}</td>
                                <td class="px-2 py-2 border-b border-secondary">
                                    @if ($pengaduan->status == '0')
                                    <p class="text-sm  bg-red-500 text-white text-center px-10 py-1 rounded" >pending</p>
                                    @elseif($pengaduan->status == 'proses')
                                    <p class="text-xs bg-yellow-500 text-white text-center px-1 py-1 rounded">{{ ucwords($pengaduan->status) }}</p>
                                    @else
                                    <p class="text-xs bg-green-500 text-white text-center px-1 py-1 rounded">{{ ucwords($pengaduan->status) }}</p>
                                    @endif
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                   </table>
                </div>

                @else
                    <div class="text-center h-3/6">
                        Tidak Ada Pengaduan
                    </div>
                @endif

                </div>
            </div>

        </div>
    </div>
</section>


@endsection
