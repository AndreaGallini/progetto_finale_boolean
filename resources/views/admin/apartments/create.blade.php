@extends('layouts.admin')

@section('content')
    <section id="admin-show">
        <a class="back-btn btn btn-dark" href="{{ route('admin.apartments.index') }}">BACK</a>
        <div class="container">

            <h2 class="mt-3 mb-3 text-center">Add a new Apartment</h2>

            <form action="{{ route('admin.apartments.store') }}" method="POST" class="py-5" enctype="multipart/form-data">
                @csrf


                <div class="mb-3">
                    <label for="title" class="form-label">Add title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                        name="title" required maxlength="100">
                    @error('title')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror

                </div>

                <div class="mb-3">
                    <label for="room_number" class="form-label">Add Rooms Number</label>
                    <input type="number" class="form-control @error('room_number') is-invalid @enderror" id="room_number"
                        name="room_number" required>
                    @error('room_number')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="bed_number" class="form-label">Add Beds Number</label>
                    <input type="number" class="form-control @error('bed_number') is-invalid @enderror" id="bed_number"
                        name="bed_number" required>
                    @error('bed_number')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="bath_number" class="form-label">Add Baths Number</label>
                    <input type="number" class="form-control @error('bath_number') is-invalid @enderror" id="bath_number"
                        name="bath_number" required>
                    @error('bath_number')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="mq_value" class="form-label">Add Square Metres</label>
                    <input type="number" class="form-control @error('mq_value') is-invalid @enderror" id="mq_value"
                        name="mq_value" required>
                    @error('mq_value')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">Add Address</label>
                    <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address"></textarea>
                    <div id="searchBox"></div>
                    @error('address')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <img id="uploadPreview" width="100" src="https://via.placeholder.com/300x200">
                    <label for="cover_img" class="form-label">Immagine</label>
                    <input type="file" name="cover_img" id="cover_img"
                        class="form-control  @error('cover_img') is-invalid @enderror">
                    @error('cover_img')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" class="form-control @error('price') is-invalid @enderror" id="price"
                        name="price" required>
                    @error('price')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="category_id" class="form-label">Select Category</label>
                    <select name="category_id" id="category_id"
                        class="form-control @error('category_id') is-invalid @enderror">
                        <option value="">Select Category</option>
                        @foreach ($categories as $category)
                            {{-- <option value="{{ $category->id }}" {{ $category->id == old('category_id') ? 'selected' : '' }}> --}}
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mt-3">
                    <h5>Select Services</h5>
                    @foreach ($services as $service)
                        <div class="form-check form-check-inline">
                            <input type="checkbox" class="form-check-input" id="{{ $service->slug }}" name="services[]"
                                value="{{ $service->id }}">
                            <label class="form-check-label" for="{{ $service->slug }}">{{ $service->title }}</label>
                        </div>
                    @endforeach
                </div>

                <div class="mt-3">
                    <h5>Select Sponsors</h5>
                    @foreach ($sponsors as $sponsor)
                        <div class="form-check form-check-inline">
                            <input type="checkbox" class="form-check-input" id="{{ $sponsor->slug }}" name="sponsors[]"
                                value="{{ $sponsor->id }}">
                            <label class="form-check-label text-white px-2 rounded-pill"
                                for="{{ $sponsor->slug }}">{{ $sponsor->name }}</label>
                        </div>
                    @endforeach
                </div>

                <div class="mb-3">
                    <h5>Visibility</h5>
                    <label for="visible" class="form-label">Visible</label>
                    <input type="checkbox" class="form-check-input" id="visible" name="visible" value="1">
                    <input type="checkbox" class="form-check-input" id="visible" name="visible" value="0">
                    @error('visible')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>


                <div class="mt-4">
                    <button type="submit" class="btn btn-success">Aggiungi</button>
                    <button type="reset" class="btn btn-danger">Resetta</button>
                </div>
            </form>
        </div>
        <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.23.0/maps/maps-web.min.js"></script>
        <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/plugins/SearchBox/3.1.3-public-preview.0/SearchBox-web.js">
        </script>
        <script src="https://api.tomtom.com/maps-sdk-for-web/cdn/6.x/6.23.0/services/services-web.min.js"></script>
        <script>
            let ttSearchBox = new tt.plugins.SearchBox(tt.services, this.options);

            let searchBoxHTML = ttSearchBox.getSearchBoxHTML();
            const searchBox = document.getElementById('searchBox');
            searchBox.appendChild(searchBoxHTML);

            ttSearchBox.on('tomtom.searchbox.resultsfound', function(data) {
                console.log(data);
            })

            ttSearchBox.on('tomtom.searchbox.resultselected', function(data) {
                console.log(data);
            })
        </script>
    @endsection
