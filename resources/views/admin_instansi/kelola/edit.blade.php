@extends('admin_instansi.layouts.dashboard-layout')

@section('title', 'Edit Admin')

@section('header')
    <a href="{{ route('kelola.index') }}" class=" hover:underline text-sky-500 ">Data Petugas</a>
    <p class="ml-2" >/</p>
    <p class="ml-2">Edit Admin</p>
@endsection

@section('content')

    <section class="py-20" >
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
                <div class="bg-white w-96 md:w-[445px] lg:w-[760px] xl:w-[960px] pb-10 rounded-b shadow ">
                   <form action="{{ route('kelola.update', $admin->id) }}" method="post">
                    @method('put')
                    @csrf
                        <div class="mx-7 pt-7">
                            <input type="text" value="{{ $admin->name }}" name="name" class="block w-full py-2 text-sm border border-primary rounded-md shadow-sm mt-2 outline-primary " placeholder="Masukan Nama">
                        </div>
                        <div class="mx-7 pt-7">
                            <input type="text" value="{{ $admin->nik }}" name="nik" class="block w-full py-2 text-sm border border-primary rounded-md shadow-sm mt-2 outline-primary " placeholder="Masukan Nama">
                        </div>
                        <div class="mx-7 mt-7">
                            <input type="text" value="{{ $admin->username }}" name="username" class="block w-full py-2 text-sm border border-primary rounded-md shadow-sm mt-2 outline-primary " placeholder="Masukan Username">
                        </div>
                        <div class="mx-7 mt-7">
                            <input type="password" value="{{ old('password') }}" name="password" class="block w-full py-2 text-sm border border-primary rounded-md shadow-sm mt-2 outline-primary " placeholder="Masukan Password">
                        </div>
                        <div class="mx-7 mt-7">
                            <input type="text" value="{{ $admin->telp }}" inputmode="numeric" name="telp" class="block w-full py-2 text-sm border border-primary rounded-md shadow-sm mt-2 outline-primary " placeholder="Masukan Telp">
                        </div>
                        <div class="mx-7 mt-7">
                            <select name="role" id="level" class="block w-full py-3 px-3 text-sm border border-primary rounded-md shadow-sm" required>
                                @if ($admin->role == 'admin_agency')
                                    <option selected value="admin_agency">Admin Instansi</option>
                                    <option value="super_admin">Super Admin</option>
                                @else
                                    <option  value="admin_agency">Admin Instansi</option>
                                    <option selected value="super_admin">Super Admin</option>
                                @endif

                            </select>
                        </div>
                        <div class="mx-7 mt-7">
                            <select class="block w-full py-3 px-3 text-sm border border-primary rounded-md shadow-sm" id="agency_id" name="agency_id" required>
                                @foreach($agencys as $agency)
                                    <option value="{{ $agency->id }}">{{ $agency->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mx-7 mt-7">
                            <button type="submit"  class=" bg-primary w-full text-white py-2 px-6 font-bold rounded-md">SIMPAN</button>
                        </div>
                   </form>
                   <form action="{{ route('kelola.destroy', $admin->id) }}" method="post" >
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
