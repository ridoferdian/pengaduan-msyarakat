@extends('admin.layouts.dashboard-layout')

@section('title', 'Detail Pengaduan')

@section('header')
    <a href="{{ route('pengaduan.index') }}" class=" hover:underline text-sky-500 ">Data Pengaduan</a>
    <p class="ml-2" >/</p>
    <p class="ml-2">Detail Pengaduan</p>
@endsection

@section('content')

    <section>
        <div class="justify-center flex font-poppins  lg:mx-5 pt-10"  >
            <div class="">
                <div class="bg-primary w-96 md:w-[445px] lg:w-[760px] xl:w-[960px] text-center h-12 rounded-t text-white shadow"><p class=" pt-2">
                    Pengaduan Masyarakat</p></div>
                <div class="bg-white w-96 md:w-[445px] lg:w-[760px] xl:w-[960px] h-56 rounded-b shadow overflow-y-auto">
                    <table class="table-auto w-full mt-4 ">
                        <tbody>
                            @if ($pengaduan->nik == null )
                            <tr class="border-t border-primary mx-5">
                                <td class="pl-6 py-2 text-primary ">Nama</td>
                                <td class="py-2">:</td>
                                <td class="py-2 pl-4 text-primary" >{{ $pengaduan->name }}</td>
                            </tr>
                            @else
                            <tr class="border-t border-primary mx-5">
                                <td class="pl-6 py-2 text-primary ">NIK</td>
                                <td class="py-2">:</td>
                                <td class="py-2 pl-4 text-primary" >{{ $pengaduan->nik }}</td>
                            </tr>
                            @endif

                            <tr class="border-t border-primary">
                                <td class="pl-6 py-2 text-primary ">Tanggal Pengaduan</td>
                                <td class="py-2">:</td>
                                <td class="py-2 pl-4 text-primary" >{{ $pengaduan->date }}</td>
                            </tr>
                            <tr class="border-t border-primary">
                                <td class="pl-6 py-2 text-primary ">Foto</td>
                                <td class="py-2">:</td>
                                <td class="py-2 pl-4 text-primary" >
                                    @if ($pengaduan->photo)
                                        @php
                                            $photos = json_decode($pengaduan->photo);
                                        @endphp
                                        <div class="mt-3 flex j">
                                        @foreach ($photos as $photo)
                                            <img src="{{ asset('storage/' . $photo) }}" alt="User Photo" width="150" class="mr-2 mb-2 flex">
                                        @endforeach
                                        </div>
                                    @endif
                                </td>
                            </tr>
                            <tr class="border-t border-primary">
                                <td class="pl-6 py-2 text-primary ">Isi Laporan</td>
                                <td class="py-2">:</td>
                                <td class="py-2 pl-4 text-primary" >{{ $pengaduan->report }}</td>
                            </tr>
                            <tr class="border-t border-primary">
                                <td class="pl-6 py-2 text-primary ">Status</td>
                                <td class="py-2">:</td>
                                <td class="py-2 pl-4 text-primary" >
                                    @if ($pengaduan->status == 'pending')
                                    <p class="text-xs  bg-red-800 text-white text-center px-10 py-1 rounded" >pending</p>
                                    @elseif($pengaduan->status == 'proses')
                                    <p class="text-xs bg-yellow-400 text-white text-center px-1 py-1 rounded">{{ ucwords($pengaduan->status) }}</p>
                                    @else
                                    <p class="text-xs bg-green-500 text-white text-center px-1 py-1 rounded">{{ ucwords($pengaduan->status) }}</p>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="justify-center flex font-poppins lg:justify-normal lg:ml-5 pt-10"  >
            <div class="">
                <div class="bg-primary w-96 md:w-[445px] lg:w-[520px] xl:w-[450px] text-center h-12 rounded-t text-white shadow"><p class=" pt-2">
                    Tanggapan Petugas</p></div>
                <div class="bg-white w-96 md:w-[445px] lg:w-[520px] xl:w-[450px] h-80 rounded-b shadow overflow-y-auto">
                    <form action="{{ route('tanggapan') }}" method="post">
                        @csrf
                        <input type="hidden" name="id_message" value="{{ $pengaduan->id_message }}" >
                    <div class="font-poppins block mt-4 mx-4">
                        <label for="status" class="block">Status :</label>
                        <select name="status" id="status" class="block w-full py-3 px-3 text-sm border border-gray-300 rounded-md shadow-sm">
                            @if($pengaduan->status == 'pending')
                            <option selected value="pending">Pending</option>
                            <option value="proses">Proses</option>
                            <option value="done">Selesai</option>
                            @elseif( $pengaduan->status == 'proses')
                            <option value="pending">Pending</option>
                            <option selected value="proses">Proses</option>
                            <option value="done">Selesai</option>
                            @else
                            <option value="pending">Pending</option>
                            <option value="proses">Proses</option>
                            <option selected value="done">Selesai</option>
                            @endif
                        </select>
                    </div>
                    <div class="font-poppins block mt-4 mx-4">
                        <label for="tanggapan" class="block">Tanggapan :</label>
                        <textarea name="response" id="tanggapan" rows="5" class="mt-1 w-full py-3 px-3 text-sm border border-gray-300 rounded-md shadow-sm" placeholder="Belum Ada Tanggapan">{{ $tanggapan->response ?? '' }}</textarea>
                    </div>
                    <div class="mt-4 px-4">
                        <button type="submit" class="w-full py-1 text-white rounded bg-primary" >Kirim</button>
                    </div>
                </form>

                </div>
                @if(Session::has('status'))
                <div class="bg-[#eebbc3] w-96 md:w-[445px] lg:w-[520px] xl:w-[450px] text-primary text-center py-2 mt-2 rounded" >
                    {{ Session::get('status') }}
                </div>
                @endif
            </div>
        </div>
    </section>

@endsection
