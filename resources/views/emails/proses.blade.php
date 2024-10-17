<!DOCTYPE html>
<html>
<head>
    <title>{{ $pengaduan->title }}</title>
</head>
<body>
    <h1 class="font-bold" >Yang terhormat {{ $pengaduan->name }}</h1>
    <p class="mt-5" >{{ $pengaduan->report }}</p>
    <p class="mt-4" >Status Laporan Anda: {{ $pengaduan->status }}</p>
    <p class="mt-4" >Kode pengaduan : {{ $pengaduan->code }}</p>
</body>
</html>
