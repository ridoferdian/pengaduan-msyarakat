    @extends('admin_instansi.layouts.dashboard-layout')

    @section('title', 'Tambah Admin')

    @section('header')
        <a href="{{ route('kelola.index') }}" class=" hover:underline text-sky-500 ">Data Admin</a>
        <p class="ml-2" >/</p>
        <p class="ml-2">Tambah Admin</p>
    @endsection

    @section('content')

        <section>
            <div class="justify-center flex font-poppins  lg:mx-5 pt-10"  >

                <div class="">
                    <div class="bg-primary w-96 md:w-[445px] lg:w-[760px] xl:w-[960px] text-center h-12 rounded-t text-white shadow"><p class=" pt-2">
                        Admin Instansi</p></div>
                    <div class="bg-white w-96 md:w-[445px] lg:w-[760px] xl:w-[960px]  rounded-b shadow ">
                    <form action="{{ route('kelola.store') }}" method="post">
                        @csrf
                            <div class="mx-7 pt-7">
                                <input type="text" name="name" class="block w-full py-2 text-sm border border-primary rounded-md shadow-sm mt-2 outline-primary " placeholder="Masukan Nama" value="{{ old('name') }}">
                                @if ($errors->has('name'))
                                    <p class="text-xs ml-4 mt-1" >{{ $errors->first('name') }}</p>
                                @endif
                            </div>
                            <div class="mx-7 mt-7">
                                <input type="text" name="username" class="block w-full py-2 text-sm border border-primary rounded-md shadow-sm mt-2 outline-primary " placeholder="Masukan Username" value="{{ old('username') }}">
                                @if ($errors->has('username'))
                                    <p class="text-xs ml-4 mt-1" >{{ $errors->first('username') }}</p>
                                @endif
                            </div>
                            <div class="mx-7 mt-7">
                                <input type="text" name="nik" class="block w-full py-2 text-sm border border-primary rounded-md shadow-sm mt-2 outline-primary " placeholder="Masukan NIK" value="{{ old('nik') }}">
                                @if ($errors->has('nik'))
                                    <p class="text-xs ml-4 mt-1" >{{ $errors->first('nik') }}</p>
                                @endif
                            </div>
                            <div class="mx-7 mt-7">
                                <input type="email" name="email" class="block w-full py-2 text-sm border border-primary rounded-md shadow-sm mt-2 outline-primary " placeholder="Masukan Email" value="{{ old('email') }}">
                            </div>
                            <div class="mx-7 mt-7">
                                <input type="password" name="password" class="block w-full py-2 text-sm border border-primary rounded-md shadow-sm mt-2 outline-primary " placeholder="Masukan Password">
                                @if ($errors->has('password'))
                                    <p class="text-xs ml-4 mt-1" >{{ $errors->first('password') }}</p>
                                @endif
                            </div>
                            <div class="mx-7 mt-7">
                                <input type="text" inputmode="numeric" name="telp" class="block w-full py-2 text-sm border border-primary rounded-md shadow-sm mt-2 outline-primary " placeholder="Masukan Telp" value="{{ old('telp') }}">
                                @if ($errors->has('telp'))
                                    <p class="text-xs ml-4 mt-1" >{{ $errors->first('telp') }}</p>
                                @endif
                            </div>
                            <div class="mx-7 mt-7">
                                <select name="role" id="level" class="block w-full py-3 px-3 text-sm border border-primary rounded-md shadow-sm" required>
                                    <option value="">Pilih Level</option>
                                    <option  value="admin_agency">Admin Instansi</option>
                                    <option value="super_admin">Super Admin</option>
                                </select>
                            </div>
                            <div class="mx-7 mt-7">
                                <select class="block w-full py-3 px-3 text-sm border border-primary rounded-md shadow-sm" id="agency_id" name="agency_id" required>
                                    <option value="">Pilih Instansi</option>
                                    @foreach($agencys as $agency)
                                        <option value="{{ $agency->id }}">{{ $agency->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mx-7 py-7">
                                <button type="submit"  class=" bg-primary w-full text-white py-2 px-6 font-bold rounded-md">SIMPAN</button>
                            </div>
                    </form>
                    </div>

                </div>
            </div>
        </section>

    @endsection
