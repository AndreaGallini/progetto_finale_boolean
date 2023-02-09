@extends('layouts.admin')

@section('content')
<section id="apartmShow" class="pb-5">
    <div class="container">
    {{-- tasto back --}}
    <div class="mt-4">
        <a class="my-btn btn-back" href="{{ route('admin.apartments.index') }}">
            <i class="fa-solid fa-caret-left me-2"></i>Indietro
        </a>
    </div>

        <h1 class="mt-3 mb-3 text-center">Aggiungi un nuovo appartamento</h1>

        <div class="form-container">
            <form action="{{ route('admin.apartments.store') }}" method="POST" class="py-5" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label bold-txt">Titolo</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                        required maxlength="100">
                    @error('title')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                    @enderror
    
                </div>
    
                <div class="mb-3">
                    <label for="room_number" class="form-label bold-txt">Numero di stanze</label>
                    <input type="number" class="form-control @error('room_number') is-invalid @enderror" id="room_number"
                        name="room_number" required>
                    @error('room_number')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
    
                <div class="mb-3">
                    <label for="bed_number" class="form-label bold-txt">Posti letto</label>
                    <input type="number" class="form-control @error('bed_number') is-invalid @enderror" id="bed_number"
                        name="bed_number" required>
                    @error('bed_number')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
    
                <div class="mb-3">
                    <label for="bath_number" class="form-label bold-txt">Numero di bagni</label>
                    <input type="number" class="form-control @error('bath_number') is-invalid @enderror" id="bath_number"
                        name="bath_number" required>
                    @error('bath_number')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
    
                <div class="mb-3">
                    <label for="mq_value" class="form-label bold-txt">Metri quadrati</label>
                    <input type="number" class="form-control @error('mq_value') is-invalid @enderror" id="mq_value"
                        name="mq_value" required>
                    @error('mq_value')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
    
                <div class="mb-3">
                    <label for="address" class="form-label bold-txt">Indirizzo</label>
                    {{-- <textarea class="form-control @error('address') is-invalid @enderror" id="address"
                        name="address"></textarea> --}}
                    <div id="searchBox"></div>
                    @error('address')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
    
                <div class="mb-3">
                    <input type="hidden" name="address" id="address" value="">
                    <input type="hidden" name="lat" id="lat" value="">
                    <input type="hidden" name="long" id="long" value="">
                </div>
    
                <div class="mb-3">
                    <img id="uploadPreview" width="100" src="https://via.placeholder.com/300x200">
                    <label for="cover_img" class="form-label ms-2">Anteprima immagine</label>
                    <input type="file" name="cover_img" id="cover_img"
                        class="mt-3 form-control  @error('cover_img') is-invalid @enderror">
                    @error('cover_img')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
    
                <div class="mb-3">
                    <label for="price" class="form-label bold-txt">Prezzo</label>
                    <input type="number" class="form-control @error('price') is-invalid @enderror" id="price" name="price"
                        required>
                    @error('price')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
    
                <div class="mb-3">
                    <label for="category_id" class="form-label bold-txt">Seleziona le categorie</label>
                    <select name="category_id" id="category_id"
                        class="form-control @error('category_id') is-invalid @enderror">
                        <option value="">Scegli una categoria</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
    
                <div class="mt-3">
                    <label class="form-label bold-txt">Aggiungi i servizi di cui dispone l'appartamento</label><br>
                    <div class="row ms-0">
                        @foreach ($services as $service)
                        <div class="form-check form-check-inline">
                            <input type="checkbox" class="form-check-input" id="{{ $service->slug }}" name="services[]"
                                value="{{ $service->id }}">
                            <label class="form-check-label" for="{{ $service->slug }}">{{ $service->title }}</label>
                        </div>
                        @endforeach
                    </div>
                </div>
    
                {{-- IMPORTANTE: da aggiungere dopo aver creato gli sponsor: --}}
    
                {{-- <div class="mt-3">
                    <h5>Seleziona uno sponsor</h5>
                    @foreach ($sponsors as $sponsor)
                    <div class="form-check form-check-inline">
                        <input type="checkbox" class="form-check-input" id="{{ $sponsor->slug }}" name="sponsors[]"
                            value="{{ $sponsor->id }}">
                        <label class="form-check-label text-white px-2 rounded-pill" for="{{ $sponsor->slug }}">{{
                            $sponsor->name }}</label>
                    </div>
                    @endforeach
                </div> --}}
    
                <div class="my-3">
                    {{-- <label for="visible" class="form-label">Visible</label>
                    <input type="checkbox" class="form-check-input" id="visible" name="visible" value="1">
                    <label for="visible" class="form-label">Visible</label>
                    <input type="checkbox" class="form-check-input" id="visible" name="visible" value="0"> --}}
                    {{-- <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" checked>
                        <label class="form-check-label" for="flexRadioDefault1">
                            Si
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
                        <label class="form-check-label" for="flexRadioDefault2">
                            No
                        </label>
                    </div>
                    @error('visible')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                    @enderror
                    <hr> --}}
    
                    <div class="my-3">
                        <label class="form-label bold-txt">Visibile sul sito?</label><br>
                        <input type="radio" class="form-check-input" id="visible" name="visible" value="1">
                        <label for="visible" class="form-label me-2">Visibile</label>
                       
                        <input type="radio" class="form-check-input" id="visible" name="visible" value="0">
                        <label for="visible" class="form-label">Non visibile</label>
                        {{-- <input type="radio" id="visible" name="visible" value=""> --}}
                        @error('visible')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
    
                </div>
    
                <div class="mt-4 d-flex justify-content-end">
                    <button type="submit" class="my-btn btn-add me-3">Aggiungi</button>
                    <button type="reset" class="my-btn btn-reset">Annulla</button>
                </div>
            </form>
        </div>
    </div>
</section>

<script defer></script>
@endsection