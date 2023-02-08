@extends('layouts.admin')

@section('content')
<section id="mediabookIndex" class="py-5">
    <div class="container">
           {{-- tasto back --}}
        <div class="mt-4">
            <a class="my-btn btn-back" href="{{ route('admin.mediabooks.index') }}">
            <i class="fa-solid fa-caret-left me-2"></i>Indietro
            </a>
        </div>

        <h1 class="mt-4 mb-4 text-center">{{ $mediabook->title }}</h1>

        <h4 class="text-center">Appartenente all'alloggio con id {{$mediabook->apartment_id }}</h4>

        <div class="image img-fluid mt-5">
            @if($mediabook->img)
            <img src="{{ asset('storage/' . $mediabook->img) }}" alt="Immagine dell'alloggio">
            @else
            <img src="{{Vite::asset('resources/img/not_found.jpeg')}}" alt="Immagine non disponibile">
            @endif
        </div>
    </div>
    </div>
</section>
@endsection