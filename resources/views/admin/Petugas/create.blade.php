    @extends('admin.layouts.dashboard-layout')

    @section('title', 'Tambah Petugas')

    @section('header')
        <a href="{{ route('petugas.index') }}" class=" hover:underline text-sky-500 ">Data Petugas</a>
        <p class="ml-2" >/</p>
        <p class="ml-2">Tambah Petugas</p>
    @endsection

    @section('content')

        <section>
                @if ($errors->any())
                    @foreach ($errors->all() as $error )
                        <div class="mt-4 text-center font-nunito bg-secondary px-4 py-3 rounded-sm text-white w-96">
                            {{ $error }}
                        </div>
                    @endforeach
                @endif
            <div class="justify-center flex font-poppins  lg:mx-5 pt-10"  >

                <div class="">
                    <div class="bg-primary w-96 md:w-[445px] lg:w-[760px] xl:w-[960px] text-center h-12 rounded-t text-white shadow"><p class=" pt-2">
                        Pengaduan Masyarakat</p></div>
                    <div class="bg-white w-96 md:w-[445px] lg:w-[760px] xl:w-[960px] h-[450px] rounded-b shadow ">
                    <form action="{{ route('petugas.store') }}" method="post">
                        @csrf
                            <div class="mx-7 pt-7">
                                <input type="text" name="name_officer" class="block w-full py-2 text-sm border border-primary rounded-md shadow-sm mt-2 outline-primary " placeholder="Masukan Nama">
                            </div>
                            <div class="mx-7 mt-7">
                                <input type="text" name="username" class="block w-full py-2 text-sm border border-primary rounded-md shadow-sm mt-2 outline-primary " placeholder="Masukan Username">
                            </div>
                            <div class="mx-7 mt-7">
                                <input type="password" name="password" class="block w-full py-2 text-sm border border-primary rounded-md shadow-sm mt-2 outline-primary " placeholder="Masukan Password">
                            </div>
                            <div class="mx-7 mt-7">
                                <input type="text" inputmode="numeric" name="telp" class="block w-full py-2 text-sm border border-primary rounded-md shadow-sm mt-2 outline-primary " placeholder="Masukan Telp">
                            </div>
                            <div class="mx-7 mt-7">
                                <select name="level" id="level" class="block w-full py-3 px-3 text-sm border border-primary rounded-md shadow-sm" required>
                                    <option value="">Pilih Level</option>
                                    <option  value="admin">Admin</option>
                                    <option value="officer">Officer</option>
                                </select>
                            </div>
                            <div class="mx-7 mt-7">
                                <button type="submit"  class=" bg-primary w-full text-white py-2 px-6 font-bold rounded-md">SIMPAN</button>
                            </div>
                    </form>
                    </div>

                </div>
            </div>
        </section>

    @endsection
