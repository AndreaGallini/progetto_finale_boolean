@extends('layouts.admin')

@section('content')
<section id="admin-show">
    <div>
        <a class="back-btn btn btn-dark" href="{{ route('admin.apartments.index') }}">BACK</a>
        <h1>{{ $apartment->title }}</h1>
        {{-- @if ($activity->categories && count($activity->categories) > 0)
        @foreach ($activity->categories as $category)
        <span>{{$category->name}}</span>
        @endforeach
        @endif --}}
        <div class="image">
            @if ($apartment->cover_img)
            <img src="{{ asset('storage/' . $apartment->cover_img) }}">
            @else
            <img src="{{ Vite::asset('resources/img/not_found.jpeg') }}" alt="">
            @endif
        </div>
        <div class="infos d-flex flex-column">
            <div class="info-row d-flex justify-content-around my-3">
                <div class="info-col d-flex justify-content-between">
                    <span>Prezzo:</span>
                    <span>{{ $apartment->price }}</span>
                </div>
                <div class="info-col d-flex justify-content-between">
                    <span>Slug:</span>
                    <span>{{ $apartment->slug }}</span>
                </div>
            </div>
            <div class="info-row d-flex justify-content-around my-3">
                <div class="info-col d-flex justify-content-between">
                    <span>Categoria:</span>
                    @if ($apartment->category)
                    <span>{{ $apartment->category->name }}</span>
                    @else
                    <span>Categoria non specificata</span>
                    @endif
                </div>
            </div>
            <div class="info-row d-flex justify-content-around my-3">
                <div class="info-col d-flex justify-content-between">
                    <span>Servizi:</span>
                    <div class="tags">
                        @if ($apartment->services && count($apartment->services) > 0)
                        @foreach ($apartment->services as $service)
                        <small class="d-inline">{{ $service->name }}</small>
                        @endforeach
                        @else
                        <span>Nessun servizio</span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="info-row d-flex justify-content-around my-3">
                <div class="info-col d-flex justify-content-between">
                    <span>Sponsor:</span>
                    <div>
                        @if ($apartment->sponsors && count($apartment->sponsors) > 0)
                        @foreach ($apartment->sponsors as $sponsor)
                        <small class="d-inline p-2 rounded-pill text-white">{{ $sponsor->name }}</small>
                        @endforeach
                        @else
                        <span>Nessuno sponsor</span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="map-wrapper d-flex flex-column justify-content-center align-items-center">
                <h4>Posizione:</h4>
                <div ref="mapRef" id="map"></div>
            </div>
        </div>
    </div>
</section>
<script>
    let place = [
            {{ $apartment->lat }},
            {{ $apartment->long }}
        ]

        let locationName = [
            '{{ $apartment->title }}'
        ]

        const locations = [{
            lat: place[0],
            lng: place[1]
        }];

        const insertLocs = function(map) {
            const tomtom = window.tt;

            locations.forEach((location) => {
                let marker = new tomtom.Marker().setLngLat(location).addTo(map);
                const popup = new tt.Popup({
                    anchor: 'top'
                }).setText(locationName);
                marker.setPopup(popup).togglePopup();
                console.log(place);
            })
        }

        const initMap = function() {
            const tt = window.tt;
            console.log(tt);
            const focus = {
                lat: place[0],
                lng: place[1]
            }

            let map = tt.map({
                key: 'mjOVKpgWnl7gsw0eNKkVguzisLjLZGIh',
                container: document.getElementById('map'),
                center: focus,
                zoom: 5
            })

            console.log(map);

            map.addControl(new tt.FullscreenControl());
            map.addControl(new tt.NavigationControl());

            // const ttSearchBox = new tt.plugins.SearchBox(tt.services, this.options);
            // map.addControl(ttSearchBox, 'top-left');

            // this.mapGlob = map
            insertLocs(map)
        }

        initMap();
</script>
@endsection