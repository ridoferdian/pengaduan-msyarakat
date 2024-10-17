@extends('user.layouts.main-layouts')

@section('title', 'PEKAT')

    @section('content')

    <section class="bg-primary py-20 " >
    </section>

    <section>

    </section>

    <section class="my-20" >
        <div class="flex justify-center">

            <div class="overflow-x-auto mx-4 lg:mx-0 d-inline-flex" >
                <div class="min-w-full">
                    <form action="">
                        <input type="text" id="searchKeyword" placeholder="Cari aduan" class="min-w-full block py-3 px-3 text-sm border border-gray-300 rounded-sm shadow-sm  focus:ring-0 hover:border-gray-500  focus:border-gray-500 " >
                        <div id="read" class="mt-3"></div>
                    </form>
                </div>

                <table class="min-w-full mt-20 ">
                    <thead>
                        <tr class="">
                            <th class="text-left px-4 py-2 border-b-2  border-gray-300">Induk Instansi</th>
                            <th class="text-left px-4 py-2 border-b-2  border-gray-300">Nama Instansi</th>
                            <th class="text-left px-4 py-2 border-b-2  border-gray-300">Tipe Instansi</th>
                            <th class="text-left px-4 py-2 border-b-2  border-gray-300">Prefix SMS</th>
                        </tr>
                    </thead>

                    <tbody id="resultsTableBody">
                        @foreach ($instansis as $instansi)
                        <tr class="odd:bg-slate-100 even:bg-white">
                            <td class="px-4 py-2 border-t-2 border-gray-300">{{ $instansi->parent }}</td>
                            <td class="px-4 py-2 border-t-2 border-gray-300">
                                <a href="{{ route('instansi.show', $instansi->slug) }}" class="text-blue-600 hover:underline">
                                    {{ $instansi->name }}
                                </a>
                            </td>
                            <td class="px-4 py-2 border-t-2 border-gray-300">{{ $instansi->type }}</td>
                            <td class="px-4 py-2 border-t-2 border-gray-300">{{ $instansi->prefix_sms }}</td>
                        </tr>
                        @endforeach
                    </tbody>


                </table>
            </div>

        </div>
    </section>

    <div class="flex justify-center">
        {{ $instansis->links() }}
    </div>


@endsection