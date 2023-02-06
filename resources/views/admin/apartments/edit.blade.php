@extends('layouts.admin')

@section('content')
    <section id="admin-show">
        <a class="back-btn btn btn-dark" href="{{ route('admin.apartments.index') }}">BACK</a>
        <div class="container">
            <h2 class="mt-4 mb-4 text-center">Aggiorna {{ $apartment->title }}</h2>

            <form action="{{ route('admin.apartments.update', $apartment->slug) }}" method="POST" class="py-5" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="title" class="form-label">Edit title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                        name="title" value="{{ old('title', $apartment->title) }}">
                    @error('title')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="room_number" class="form-label">Edit Rooms Number</label>
                    <input type="text" class="form-control @error('room_number') is-invalid @enderror" id="room_number"
                        name="room_number" value="{{ old('room_number', $apartment->room_number) }}">
                    @error('room_number')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="bed_number" class="form-label">Edit Beds Number</label>
                    <input type="text" class="form-control @error('bed_number') is-invalid @enderror" id="bed_number"
                        name="bed_number" value="{{ old('bed_number', $apartment->bed_number) }}">
                    @error('bed_number')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="bath_number" class="form-label">Edit Baths Number</label>
                    <input type="text" class="form-control @error('bath_number') is-invalid @enderror" id="bath_number"
                        name="bath_number" value="{{ old('bath_number', $apartment->bath_number) }}">
                    @error('bath_number')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="mq_value" class="form-label">Edit Square Metres</label>
                    <input type="text" class="form-control @error('mq_value') is-invalid @enderror" id="mq_value"
                        name="mq_value" value="{{ old('mq_value', $apartment->mq_value) }}">
                    @error('mq_value')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">Edit Address</label>
                    <input type="text" class="form-control @error('address') is-invalid @enderror" id="address"
                        name="address" value="{{ old('address', $apartment->address) }}">
                    @error('address')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>


                <div class="d-flex">
                    <div class="media me-4">
                        <img class="shadow" width="150" src="{{ asset('storage/' . $apartment->cover_img) }}" alt="{{ $apartment->cover_img }}">
                    </div>
                    <div class="mb-3">
                        <label for="cover_img" class="form-label">Replace Apartment's image</label>
                        <input type="file" name="cover_img" id="cover_img" class="form-control  @error('cover_img') is-invalid @enderror">
                        @error('cover_img')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" class="form-control @error('price') is-invalid @enderror" id="price"
                        name="price" value="{{ old('price', $apartment->price) }}" required>
                    @error('price')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="category_id" class="form-label">Select Category</label>
                    <select name="category_id" id="category_id"
                        class="form-control @error('category_id') is-invalid @enderror">
                        <option value="">Select category</option>
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

                {{-- <div class="mb-3">
                    <label for="mediabook_id" class="form-label">Mediabook</label>
                    <select name="mediabook_id" id="mediabook_id"
                        class="form-control @error('texture_id') is-invalid @enderror">
                        <option value="">Select</option>
                        @foreach ($mediabooks as $mediabook)
                            <option value="{{ $texture->id }}"
                                {{ old('mediabook_id', $apartment->mediabook_id) == $mediabook->id ? 'selected' : '' }}>
                                {{ $mediabok->title }}</option>
                        @endforeach
                    </select>
                    @error('mediabook_id')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div> --}}

                <div class="mb-3">
                    <h5>Select Services</h5>
                    @foreach ($services as $service)
                    <div class="form-check form-check-inline">
                        @if (old("services"))
                            <input type="checkbox" class="form-check-input" id="{{$service->slug}}" name="services[]" value="{{$service->id}}" {{in_array( $service->id, old("services", []) ) ? 'checked' : ''}}>
                        @else
                            <input type="checkbox" class="form-check-input" id="{{$service->slug}}" name="services[]" value="{{$service->id}}" {{$apartment->service->contains($service) ? 'checked' : ''}}>
                        @endif
                        <label class="form-check-label" for="{{$service->slug}}">{{$service->title}}</label>
                    </div>
                @endforeach
                @error('services')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="mb-3">
                    <h5>Select Sponsors</h5>
                    @foreach ($sponsors as $sponsor)
                    <div class="form-check form-check-inline">
                        @if (old("sponsors"))
                            <input type="checkbox" class="form-check-input" id="{{$sponsor->slug}}" name="sponsors[]" value="{{$sponsor->id}}" {{in_array( $sponsor->id, old("sponsors", []) ) ? 'checked' : ''}}>
                        @else
                            <input type="checkbox" class="form-check-input" id="{{$sponsor->slug}}" name="sponsors[]" value="{{$sponsor->id}}" {{$apartment->sponsors->contains($sponsor) ? 'checked' : ''}}>
                        @endif
                        <label class="form-check-label text-white px-2 rounded-pill" for="{{$sponsor->slug}}">{{$sponsor->name}}</label>
                    </div>
                @endforeach
                @error('sponsors')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <div class="mb-3">
                    <h5>Visibility</h5>
                    <label for="visible" class="form-label">Visible</label>
                    <input type="checkbox" class="form-check-input" id="visible" name="visible" {{ old('visible', $apartment->visible) == true ? 'checked' : '' }}>
                    @error('visible')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="my-5">
                    <button type="submit" class="btn btn-success">Aggiungi</button>
                    <button type="reset" class="btn btn-danger">Resetta</button>
                </div>
            </form>
        </div>
    @endsection
