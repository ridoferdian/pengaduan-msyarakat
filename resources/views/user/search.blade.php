@extends('user.layouts.main-layouts')

@section('title', 'PEKAT')

@section('content')
<section class="  text-white">
    <div class="px-40 py-32 font-poppins bg-primary">
        <div class="">
            <p class="text-2xl">
                Hasil Pencarian:
                @if(request('q'))
                    "{{ request('q') }}"
                @else
                    Tidak ada pencarian
                @endif
            </p>
        </div>

        <!-- Hasil pencarian -->
        @if($messages->isEmpty())
        <div class="text-center mt-10">
            <p class="mb-6 text-9xl" >😐</p>
            <p  >Tidak ada hasil ditemukan untuk "{{ request('q') }}".</p>
        </div>
        @else
            @foreach ($messages as $message)
                <div class="border-b border-white py-5 relative mt-10">
                    <div class="flex ml-4 justify-between">
                        <img src="{{ asset('images/user_default.png') }}" alt="profil" width="40" class="rounded-full">
                        <p class="text-sm">{{ $message->report_timestamp->diffForHumans() }}</p>
                    </div>
                    <div class="ml-20 absolute top-0">
                        <p class="text-2xl font-nunito">{{ $message->name === 'anonymous' ? 'Anonymous' : $message->name }}</p>
                        <div class="flex">
                            <p class="text-xs font-light mt-2">{{ $message->report_timestamp->format('d F') }}</p>
                            @if ($message->status == '0')
                                <p class="text-xs font-light mt-2 ml-3">Pending</p>
                            @else
                                <p class="text-xs font-light mt-2 ml-3">{{ ucwords($message->status) }}</p>
                            @endif
                            <p class="text-xs font-light mt-2 ml-3">{{ $message->category->category_name }}</p>
                            <p class="text-xs font-light mt-2 ml-3">#{{ $message->code }}</p>
                        </div>
                    </div>
                    <div class="mt-12 ml-10">
                        <h3 class="text-lg ml-4 mb-2">{{ $message->title }}</h3>
                        <p id="report-text-{{ $message->id_message }}" class="text-sm font-montserrat">{{ $message->report }}</p>

                        @if ($message->photo)
                            @php
                                $photos = json_decode($message->photo);
                            @endphp
                            <div class="mt-3 flex ">
                                @foreach ($photos as $photo)
                                    <img src="{{ asset('storage/' . $photo) }}" alt="User Photo" width="150" class="mr-2 mb-2 flex">
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</section>

@endsection
