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
                                <a href="{{ route('kelola.edit', $admin->id) }}" class="font-bold mr-2" >
                                    Edit
                                </a>
                                <span>|</span>
                                <button type="button" onclick="openModal({{ $admin->id }})" class="font-bold ml-2">Hapus</button>
                                <div id="confirmModal{{ $admin->id }}" class="hidden fixed z-10 inset-0 overflow-y-auto">
                                    <div class="flex items-center justify-center min-h-screen">
                                        <div class="bg-white p-6 rounded-lg shadow-lg">
                                            <p>Yakin untuk dihapus?</p>
                                                <div class="flex justify-end mt-4">
                                                    <button onclick="closeModal({{ $admin->id }})" class="bg-gray-300 px-4 py-2 rounded mr-2">Tidak</button>
                                                    <button onclick="document.getElementById('deleteForm{{ $admin->id }}').submit()" class="bg-red-500 text-white px-4 py-2 rounded">Oke</button>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                        <form id="deleteForm{{ $admin->id }}" action="{{ route('kelola.destroy', $admin->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                        </form>

                            </span>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
                </table>
        </div>
    </section>


    <script>
        function openModal(id) {
        document.getElementById('confirmModal' + id).classList.remove('hidden');
    }

    function closeModal(id) {
        document.getElementById('confirmModal' + id).classList.add('hidden');
    }
    </script>


@endsection


