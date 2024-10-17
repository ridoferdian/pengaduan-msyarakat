<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Pengaduan</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div class="text-center font-bold mt-10">
        <p>Laporan Pengaduan Masyarakat</p>
    </div>
    <div class="flex justify-center mt-10 ">
            <table class="w-96 " >
                <thead>
                    <tr class="" >
                        <th class="border-y-2 w-16 border-black" >No</th>
                        <th class="pl-4 w-16 border-y-2 border-black" >Tanggal</th>
                        <th class="pl-4 w-16  border-y-2 border-black" >Isi Laporan</th>
                        <th class="pl-4 w-16 py-2  border-y-2 border-black" >Status</th>
                    </tr>
                </thead>
                <tbody class="">
                    @foreach ( $pengaduans as $k => $v )
                    <tr class="text-sm" >
                        <td class="py-2 pl-8 w-16" >{{ $k += 1 }}</td>
                        <td class="pl-8 py-2  w-16">{{ $v->date->format('d-M-Y') }}</td>
                        <td class="pl-8 py-2  w-16 ">{{ $v->report }}</td>
                        <td class="pl-8 py-2  w-16 ">{{ $v->status == '0' ? 'Pending' : ucwords($v->status) }} </td>
                    </tr>
                    @endforeach ()
                </tbody>
            </table>
    </div>
</body>
</html>
