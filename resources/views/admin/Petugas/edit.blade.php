@extends('admin.layouts.dashboard-layout')

@section('title', 'Edit Petugas')

@section('header')
    <a href="{{ route('petugas.index') }}" class=" hover:underline text-sky-500 ">Data Petugas</a>
    <p class="ml-2" >/</p>
    <p class="ml-2">Edit Petugas</p>
@endsection

@section('content')

    <section>
        <div class="">
            @if ($errors->any())
                @foreach ($errors->all() as $error )
                    <div class="">
                        {{ $error }}
                    </div>
                @endforeach
            @endif
        </div>
        <div class="justify-center flex font-poppins  lg:mx-5 pt-10"  >

            <div class="">
                <div class="bg-primary w-96 md:w-[445px] lg:w-[760px] xl:w-[960px] text-center h-12 rounded-t text-white shadow"><p class=" pt-2">
                    Pengaduan Masyarakat</p></div>
                <div class="bg-white w-96 md:w-[445px] lg:w-[760px] xl:w-[960px] h-[450px] rounded-b shadow ">
                   <form action="{{ route('petugas.update', $petugas->id_officer) }}" method="post">
                    @method('put')
                    @csrf
                        <div class="mx-7 pt-7">
                            <input type="text" value="{{ $petugas->name_officer }}" name="name_officer" class="block w-full py-2 text-sm border border-primary rounded-md shadow-sm mt-2 outline-primary " placeholder="Masukan Nama">
                        </div>
                        <div class="mx-7 mt-7">
                            <input type="text" value="{{ $petugas->username }}" name="username" class="block w-full py-2 text-sm border border-primary rounded-md shadow-sm mt-2 outline-primary " placeholder="Masukan Username">
                        </div>
                        <div class="mx-7 mt-7">
                            <input type="password" value="{{ old('password') }}" name="password" class="block w-full py-2 text-sm border border-primary rounded-md shadow-sm mt-2 outline-primary " placeholder="Masukan Password">
                        </div>
                        <div class="mx-7 mt-7">
                            <input type="text" value="{{ $petugas->telp }}" inputmode="numeric" name="telp" class="block w-full py-2 text-sm border border-primary rounded-md shadow-sm mt-2 outline-primary " placeholder="Masukan Telp">
                        </div>
                        <div class="mx-7 mt-7">
                            <select name="level" id="level" class="block w-full py-3 px-3 text-sm border border-primary rounded-md shadow-sm" required>
                                @if ($petugas->level == 'admin')
                                    <option selected value="admin">Admin</option>
                                    <option value="officer">Petugas</option>
                                @else
                                    <option  value="admin">Admin</option>
                                    <option selected value="officer">Officer</option>
                                @endif

                            </select>
                        </div>
                        <div class="mx-7 mt-7">
                            <button type="submit"  class=" bg-primary w-full text-white py-2 px-6 font-bold rounded-md">SIMPAN</button>
                        </div>
                   </form>
                   <form action="{{ route('petugas.destroy', $petugas->id_officer) }}" method="post" >
                        @csrf
                        @method('delete')
                        <div class="mx-7 mt-7">
                            <button type="submit"  class=" bg-red-500 w-full text-white py-2 px-6 font-bold rounded-md">HAPUS</button>
                        </div>
                   </form>
                </div>

            </div>
        </div>
    </section>

@endsection
