@extends('admin_instansi.layouts.dashboard-layout')

@section('title', 'dashboard')

@section('content')
@if (session('error'))
    <div id="alert4" class="fixed top-32  right-0 bg-red-800 text-white px-4 py-6 rounded transition-transform duration-200 ease-out transform font-poppins translate-x-full">
        {{ session('error') }}
    </div>
    @endif
@endsection
