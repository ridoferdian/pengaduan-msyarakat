@extends('user.layouts.main-layouts')

@section('title', 'Detail Instansi')

@section('content')
<div class="container mx-auto">
    <h1 class="text-2xl font-bold">{{ $instansi->name }}</h1>
    <p>Induk Instansi: {{ $instansi->parent }}</p>
    <p>Tipe Instansi: {{ $instansi->type }}</p>
    <p>Prefix SMS: {{ $instansi->prefix_sms }}</p>
</div>
@endsection
