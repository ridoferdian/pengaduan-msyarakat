@extends('admin_instansi.layouts.dashboard-layout')

@section('title', 'Kelola Admin')

@section('header')
        <p class="ml-2">Kelola Admin</p>
    @endsection

@section('content')

    <section>
        <div class="mt-5">
            <a href="{{ route('kelola.create') }}" class="font-semibold text-sm font-montserrat px-2 py-2 mt-6 bg-sky-400 rounded-md shadow-md text-primary " >Tambah Admin</a>
        </div>


        @if (session('success'))
        <div id="alert1" class="fixed top-20  right-0 bg-green-600 text-white px-4 py-6 rounded transition-transform duration-200 ease-out transform font-poppins translate-x-full">
            {{ session('success') }}
        </div>
        @endif


        <div class="overflow-x-auto font-poppins mt-8">
            <table id="table" >
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Admin</th>
                        <th>Nama Instansi</th>
                        <th>telp</th>
                        <th>role</th>
                        <th>Detail</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($admins as $admin)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $admin->name }}</td>
                        <td>{{ $admin->agency->name }}</td>
                        <td>{{ $admin->telp }}</td>
                        <td>{{ $admin->role }}</td>
                        <td class="border-b-2 border-sky-300 px-4 py-2 ">
                            <span class="flex">
                                <a href="{{ route('kelola.edit', $admin->id) }}" class="bg-red-400 w-6 h-6 flex items-center justify-center rounded-sm mx-2" >
                                    <i data-feather="upload" class="w-4 h-4 text-white "></i>
                                </a>

                                <form action="" method="post" >
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="bg-red-400 w-6 h-6 flex items-center justify-center rounded-sm mx-2"  onclick="return confirm('apakah anda yakin?')">
                                        <i data-feather="trash" class="w-4 h-4 text-white "></i>
                                    </button>
                                </form>
                            </span>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
                </table>
        </div>
    </section>



@endsection
