@extends('layouts.admin')

@section('content')
    <section id="apartmShow" class="pb-5">
        <div class="container">
            <div class="mt-4">
                <a class="my-btn btn-back" href="{{ route('admin.apartments.index') }}">
                    <i class="fa-solid fa-caret-left me-2"></i>Indietro
                </a>
            </div>

            <h1 class="mt-4 mb-4 text-center">Aggiorna {{ $apartment->title }}</h1>

            <div class="form-container">
                <form action="{{ route('admin.apartments.update', $apartment->slug) }}" method="POST" class="py-5"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="my-3">
                        <label for="title" class="form-label bold-txt">Modifica titolo</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                            name="title" value="{{ old('title', $apartment->title) }}">
                        @error('title')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="my-3">
                        <label for="room_number" class="form-label bold-txt">Modifica numero di stanze</label>
                        <input type="text" class="form-control @error('room_number') is-invalid @enderror"
                            id="room_number" name="room_number" value="{{ old('room_number', $apartment->room_number) }}">
                        @error('room_number')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="my-3">
                        <label for="bed_number" class="form-label bold-txt">Modifica numero posti letto</label>
                        <input type="text" class="form-control @error('bed_number') is-invalid @enderror" id="bed_number"
                            name="bed_number" value="{{ old('bed_number', $apartment->bed_number) }}">
                        @error('bed_number')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="my-3">
                        <label for="bath_number" class="form-label bold-txt">Modifica numero di bagni</label>
                        <input type="text" class="form-control @error('bath_number') is-invalid @enderror"
                            id="bath_number" name="bath_number" value="{{ old('bath_number', $apartment->bath_number) }}">
                        @error('bath_number')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="my-3">
                        <label for="mq_value" class="form-label bold-txt">Modifica metri quadrati</label>
                        <input type="text" class="form-control @error('mq_value') is-invalid @enderror" id="mq_value"
                            name="mq_value" value="{{ old('mq_value', $apartment->mq_value) }}">
                        @error('mq_value')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="my-3">
                        <label for="descrizione" class="form-label bold-txt">Descrizione <strong>*</strong></label>
                        <input type="textarea" class="form-control @error('descrizione') is-invalid @enderror"
                            id="descrizione" name="descrizione" required
                            value="{{ old('descrizione', $apartment->descrizione) }}">
                        @error('descrizione')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="my-3">
                        <label for="address" class="form-label bold-txt">Nuovo indirizzo</label>
                        <div id="searchBox"></div>
                        @error('address')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="my-3">
                        <label for="address"><strong>Indirizzo attuale:</strong></label>
                        <input type="text" disabled name="address" id="address"
                            value="{{ old('address', $apartment->address) }}">
                        <input type="hidden" disabled name="lat" id="lat"
                            value="{{ old('lat', $apartment->lat) }}">
                        <input type="hidden" disabled name="long" id="long"
                            value="{{ old('long', $apartment->long) }}">
                    </div>

                    <div class="my-3">
                        <label for="cover_img" class="form-label bold-txt">Sostituisci immagine di copertina</label>
                        <div>
                            <div class="media me-4 my-3">
                                <img width="150" src="{{ asset('storage/' . $apartment->cover_img) }}"
                                    alt="{{ $apartment->cover_img }}">
                            </div>
                            <div>
                                <input type="file" name="cover_img" id="cover_img"
                                    class="form-control  @error('cover_img') is-invalid @enderror">
                                @error('cover_img')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="my-3">
                        <label for="price" class="form-label bold-txt">Prezzo per notte</label>
                        <input type="number" class="form-control @error('price') is-invalid @enderror" id="price"
                            name="price" value="{{ old('price', $apartment->price) }}" required>
                        @error('price')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="category_id" class="form-label bold-txt">Modifica categoria appartamento</label>
                        <select name="category_id" id="category_id"
                            class="form-control @error('category_id') is-invalid @enderror">
                            <option value="">Scegli una categoria</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ old('category_id', $apartment->category_id) == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mt-3">
                        <label class="form-label bold-txt">Modifica i servizi che offre l'appartamento</label><br>
                        <div class="row ms-0">
                            @foreach ($services as $service)
                                <div class="form-check form-check-inline">
                                    @if (old('services'))
                                        <input type="checkbox" class="form-check-input" id="{{ $service->slug }}"
                                            name="services[]" value="{{ $service->id }}"
                                            {{ in_array($service->id, old('services', [])) ? 'checked' : '' }}>
                                    @else
                                        <input type="checkbox" class="form-check-input" id="{{ $service->slug }}"
                                            name="services[]" value="{{ $service->id }}"
                                            {{ $apartment->services->contains($service) ? 'checked' : '' }}>
                                    @endif
                                    <label class="form-check-label"
                                        for="{{ $service->slug }}">{{ $service->title }}</label>
                                </div>
                            @endforeach
                        </div>
                        @error('services')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- IMPORTANTE: da aggiungere dopo aver creato gli sponsor: --}}

                    {{-- <div class="mb-3">
                        <label for="visible" class="form-label">Seleziona uno sponsor</label><br>
                        @foreach ($sponsors as $sponsor)
                        <div class="form-check form-check-inline">
                            @if (old('sponsors'))
                            <input type="checkbox" class="form-check-input" id="{{ $sponsor->slug }}" name="sponsors[]"
                                value="{{ $sponsor->id }}" {{ in_array($sponsor->id, old('sponsors', [])) ? 'checked' : ''
                            }}>
                            @else
                            <input type="checkbox" class="form-check-input" id="{{ $sponsor->slug }}" name="sponsors[]"
                                value="{{ $sponsor->id }}" {{ $apartment->sponsors->contains($sponsor) ? 'checked' : '' }}>
                            @endif
                            <label class="form-check-label text-white px-2 rounded-pill" for="{{ $sponsor->slug }}">{{
                                $sponsor->name }}</label>
                        </div>
                        @endforeach
                        @error('sponsors')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>     --}}

                    <div class="my-3">
                        <label class="form-label bold-txt">Visibile sul sito?</label><br>
                        <input type="radio" class="form-check-input" id="visible" name="visible" value="1"
                            {{ old('visible', $apartment->visible) == 1 ? 'checked' : '' }}>
                        <label for="visible" class="form-label">Visibile</label>


                        <input type="radio" class="form-check-input" id="visible" name="visible" value="0"
                            {{ old('visible', $apartment->visible) == 0 ? 'checked' : '' }}>
                        <label for="visible" class="form-label">Non visibile</label>
                        @error('visible')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="mt-4 d-flex justify-content-end">
                        <button type="submit" class="my-btn btn-add me-3">Modifica</button>
                        <button type="reset" class="my-btn btn-reset">Annulla</button>
                    </div>
                </form>
            </div>
        </div>
    @endsection
