@extends('layouts.admin')

@section('content')
<section id="admin-show">
    <a class="back-btn btn btn-dark" href="{{ route('admin.mediabooks.index') }}">BACK</a>
    <div class="container">
        <h2 class="mt-4 mb-4 text-center">Aggiorna {{ $mediabook->title }}</h2>

        <form action="{{ route('admin.mediabooks.update', $mediabook->slug) }}" method="POST" class="py-5"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Edit title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                    value="{{ old('title', $mediabook->title) }}">
                @error('title')
                <div class="invalid-feedback d-block">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="d-flex">
                <div class="media me-4">
                    <img class="shadow" width="150" src="{{ asset('storage/' . $mediabook->img) }}"
                        alt="{{ $mediabook->img }}">
                </div>
                <div class="mb-3">
                    <label for="img" class="form-label">Replace mediabook's image</label>
                    <input type="file" name="img" id="img" class="form-control  @error('img') is-invalid @enderror">
                    @error('img')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div class="mt-4">
                <button type="submit" class="btn btn-success">Aggiungi</button>
                <button type="reset" class="btn btn-danger">Resetta</button>
            </div>
        </form>
    </div>
    @endsection