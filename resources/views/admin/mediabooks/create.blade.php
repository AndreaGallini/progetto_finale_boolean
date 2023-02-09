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

        <h1 class="mt-3 mb-3 text-center">Aggiungi un nuovo media</h1>

        <div class="form-container">
            <form action="{{ route('admin.mediabooks.store') }}" method="POST" class="py-5" enctype="multipart/form-data">
                @csrf
    
                <div class="mb-3">
                    <label for="title" class="form-label">Titolo</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                        required maxlength="100">
                    @error('title')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="apartment_id" class="form-label">id alloggio</label>
                    <input type="text" class="form-control @error('apartment_id') is-invalid @enderror" id="apartment_id" name="apartment_id"
                        required maxlength="100">
                    @error('apartment_id')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <img id="uploadPreview" width="100" src="https://via.placeholder.com/300x200">
                    <label for="img" class="form-label ms-sm-0 ms-md-2">Anteprima dell'immagine</label>
                    <input type="file" name="img" id="img" class="form-control mt-3 @error('img') is-invalid @enderror">
                    @error('img')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
    
                <div class="mt-4 d-flex justify-content-end">
                    <button type="submit" class="my-btn btn-add me-3">Aggiungi</button>
                    <button type="reset" class="my-btn btn-reset">Annulla</button>
                </div>
            </form>
        </div>
    </div>
    @endsection