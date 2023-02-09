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

        <h1 class="mt-4 mb-4 text-center">Aggiorna {{ $mediabook->title }}</h1>

        <div class="form-container">
            <form action="{{ route('admin.mediabooks.update', $mediabook->slug) }}" method="POST" class="py-5"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
    
                <div class="my-3">
                    <label for="title" class="form-label bold-txt">Modifica titolo</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                        value="{{ old('title', $mediabook->title) }}">
                    @error('title')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="my-3">
                    <label for="apartment_id" class="form-label bold-txt">Modifica id alloggio</label>
                    <input type="text" class="form-control @error('apartment_id') is-invalid @enderror" id="apartment_id" name="apartment_id"
                    value="{{ old('apartment_id', $mediabook->apartment_id) }}">
                    @error('apartment_id')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
    
                <div class="my-3">
                    <label for="img" class="form-label bold-txt">Sostituisci media</label>
                    <div class="flex-col">
                        <div class="media me-4">
                            <img width="150" src="{{ asset('storage/' . $mediabook->img) }}"
                            alt="{{ $mediabook->img }}">
                        </div>
    
                        <div class="mt-3">
                            <input type="file" name="img" id="img" class="form-control  @error('img') is-invalid @enderror">
                            @error('img')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>    
                </div>
    
                <div class="mt-5 d-flex justify-content-end">
                    <button type="submit" class="my-btn btn-add me-3">Modifica</button>
                    <button type="reset" class="my-btn btn-reset">Annulla</button>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection