@extends('layouts.admin')

@section('content')
<section id="admin-show">
    <a class="back-btn btn btn-dark" href="{{ route('admin.mediabooks.index') }}">BACK</a>
    <div class="container">

        <h2 class="mt-3 mb-3 text-center">Aggiungi un nuovo album foto</h2>

        <form action="{{ route('admin.mediabooks.store') }}" method="POST" class="py-5" enctype="multipart/form-data">
            @csrf


            <div class="mb-3">
                <label for="title" class="form-label">Aggiungi titolo</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                    required maxlength="100">
                @error('title')
                <div class="invalid-feedback d-block">
                    {{ $message }}
                </div>
                @enderror

            </div>
            <div class="mb-3">
                <img id="uploadPreview" width="100" src="https://via.placeholder.com/300x200">
                <label for="img" class="form-label">Immagine</label>
                <input type="file" name="img" id="img" class="form-control  @error('img') is-invalid @enderror">
                @error('img')
                <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-success">Aggiungi</button>
                <button type="reset" class="btn btn-danger">Resetta</button>
            </div>
        </form>
    </div>
    @endsection