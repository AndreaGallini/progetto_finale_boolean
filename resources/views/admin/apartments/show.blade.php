@extends('layouts.admin')

@section('content')
    <section id="apartmShow" class="pb-5">
        <div class="container">
            {{-- tasto back --}}
            <div class="mt-5">
                <a class="my-btn btn-back" href="{{ route('admin.apartments.index') }}">
                    <i class="fa-solid fa-caret-left me-2"></i>Indietro
                </a>
            </div>

            <h1>{{ $apartment->title }}</h1>
            <h4>{{ $apartment->address }}<br>
                {{ $apartment->mq_value }} mq</h4>

            <div class="image">
                @if ($apartment->cover_img)
                    <img class="img-fluid" src="{{ asset('storage/' . $apartment->cover_img) }}">
                @else
                    <img class="img-fluid" src="{{ Vite::asset('resources/img/not_found.jpeg') }}" alt="">
                @endif
            </div>

            <div class="infos d-flex flex-column info-container">
                <div class="info-row d-flex justify-content-around my-3">
                    <div class="info-col d-flex justify-content-between">
                        <span class="bold-txt">Prezzo:</span>
                        <span>{{ $apartment->price }} euro / notte</span>
                    </div>
                </div>

                {{-- <div class="info-row d-flex justify-content-around my-3">
                    <div class="info-col d-flex justify-content-between">
                        <span class="bold-txt">Slug:</span>
                        <span>{{ $apartment->slug }}</span>
                    </div>
                </div> --}}

                <div class="info-row d-flex justify-content-around my-3">
                    <div class="info-col d-flex justify-content-between">
                        <span class="bold-txt">Stanze:</span>
                        <span>{{ $apartment->room_number }}</span>
                    </div>
                </div>

                <div class="info-row d-flex justify-content-around my-3">
                    <div class="info-col d-flex justify-content-between">
                        <span class="bold-txt">Posti letto:</span>
                        <span>{{ $apartment->bed_number }}</span>
                    </div>
                </div>

                <div class="info-row d-flex justify-content-around my-3">
                    <div class="info-col d-flex justify-content-between">
                        <span class="bold-txt">Bagni:</span>
                        <span>{{ $apartment->bath_number }}</span>
                    </div>
                </div>

                <div class="info-row d-flex justify-content-around my-3">
                    <div class="info-col d-flex justify-content-between">
                        <span class="bold-txt">Categoria:</span>
                        @if ($apartment->category)
                            <span>{{ $apartment->category->name }}</span>
                        @else
                            <span>Categoria non specificata</span>
                        @endif
                    </div>
                </div>
                <div class="info-row d-flex justify-content-around my-3">
                    <div class="info-col d-flex justify-content-between">
                        <span class="bold-txt">Servizi:</span>
                        <div class="tags">
                            @if ($apartment->services && count($apartment->services) > 0)
                                @foreach ($apartment->services as $service)
                                    <div class="services">{{ $service->title }}</div>
                                @endforeach
                            @else
                                <span>Nessun servizio</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="info-row d-flex justify-content-around my-3">
                    <div class="info-col d-flex justify-content-between">
                        <span class="bold-txt">Sponsor:</span>
                        <div>
                            @if ($apartment->sponsors && count($apartment->sponsors) > 0)
                                @foreach ($apartment->sponsors as $sponsor)
                                    <span class="d-inline p-2 rounded-pill text-white">{{ $sponsor->name }}</span>
                                @endforeach
                            @else
                                <span>Nessuno sponsor</span>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="info-row d-flex justify-content-around my-3">
                    <div class="info-col d-flex justify-content-between">
                        <span class="bold-txt">Visibile sul sito:</span>
                        <span>{{ $apartment->visible ? 'Sì' : 'No' }}</span>
                    </div>
                </div>
            </div>

            {{-- mappa --}}
            <div class="map-wrapper d-flex flex-column justify-content-center align-items-center">
                <h4>Posizione sulla mappa:</h4>
                <div ref="mapRef" id="map"></div>
            </div>

            <div class="photo-album">
                <h4 class="my-3">Album Foto:</h4>
                <div class="my-3 row">
                    @foreach ($mediabooks as $mediabook)
                        <div class="col-6 d-flex justify-content-center">
                            <img class="mediabook" src="{{ asset('storage/' . $mediabook->img) }}" alt="">
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="inbox my-5">
                <a class="btn btn-outline-dark d-block m-auto" href="{{ route('admin.inbox', $apartment->slug) }}"><i class="fa-solid fa-envelope"></i></a>
            </div>
        </div>
    </section>


    {{-- <div>
            <a class="back-btn btn btn-dark" href="{{ route('admin.apartments.index') }}">BACK</a>
            <h1>{{ $apartment->title }}</h1> --}}
    {{-- @if ($activity->categories && count($activity->categories) > 0)
        @foreach ($activity->categories as $category)
        <span>{{$category->name}}</span>
        @endforeach
        @endif --}}

    {{-- <div class="image">
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
        <div id="dropin-container"></div>
    </section> --}}


    {{-- SCRIPT --}}

    {{-- <script type="text/javascript">
        braintree.dropin.create({
                    container: document.getElementById('dropin-container'),

                }
                braintree.dropin.create({
                        // Step three: get client token from your server, such as via
                        //    templates or async http request
                        authorization: CLIENT_TOKEN_FROM_SERVER,
                        container: '#dropin-container'
                    }
    </script> --}}
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
