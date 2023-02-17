@extends('layouts.admin')
@section('content')
<section>
    <div  class="container px-4 mndv">
        <div class="row">
            <div id="selectArea">
                <h1>Seleziona l'appartamento da sponsorizzare:</h1>
                <select name="selApartments" id="selApartments">
                    <option value="" selected>Seleziona l'appartamento da sponsorizzare</option>
                    @foreach ($apartments as $apartment)
                        <option value="{{ $apartment->slug }}">{{ $apartment->title }}</option>
                    @endforeach
                </select>
                <div id="previewApp" class="selectedApp d-flex justify-content-center d-none">
                    <div class="pic w-25">
                        <img id="selPic" src="" alt="Immagine non disponibile">
                    </div>
                    <div class="infos w-75 d-flex flex-column justify-content-between">
                        <h2 id="selTitle" class="fw-bold"></h2>
                        <div class="d-flex justify-content-between">
                            <div class="address">
                                <i class="fa-solid fa-location-dot me-3"></i> <span id="selAddress" class="fs-5 fw-bold"></span>
                            </div>
                            <div class="category">
                                <span id="selIcon" class="me-3"></span> <span id="selCategory" class="fs-5 fw-bold"></span>
                            </div>
                        </div>
                        <div class="sponsors">
                            <p>spon1</p>
                            <p>spon2</p>
                            <p>spon3</p>
                        </div>
                    </div>
                </div>
            </div>
            {{-- @foreach ($apartments as $apartment)
                            <div class="apartmIndex sponsoredblock col-12">
                                <div class="card my-5">
                                    <div class="row">
                                        <a href="{{ route('admin.apartments.show', $apartment->slug) }}"
                                            class="apt-img me-5 col-12 col-md-12 col-lg-3">
                                            @if ($apartment->cover_img)
                                                <img class="img-fluid" src="{{ asset('storage/' . $apartment->cover_img) }}"
                                                    alt="Immagine dell'appartamento">
                                            @else
                                                <img src="{{ Vite::asset('resources/img/not_found.jpeg') }}"
                                                    alt="Immagine non disponibile">
                                            @endif
                                        </a>
                                        <div class="apt-details col-12 col-md-12 col-lg-6">
                                            <h3>
                                                <a href="{{ route('admin.apartments.show', $apartment->slug) }}"
                                                    title="View Apartment">{{ $apartment->title }}</a>
                                            </h3>

                                            <h5>
                                                {{ $apartment->address }}
                                            </h5>

                                            <h5>
                                                {{ $apartment->mq_value }} mq
                                            </h5>

                                            @foreach ($apartment->services as $service)
                                                <h5>{{ $service->title }}</h5>
                                            @endforeach

                                            @if ($apartment->category)
                                                <div class="mt-3">
                                                    {!! $apartment->category->img !!}
                                                    {{ $apartment->category->name }}
                                                </div>
                                            @else
                                                <div>
                                                    Categoria non attribuita
                                                </div>
                                            @endif
                                        </div>
                                        <div class=" chek col-md-12 col-lg-2">
                                                <h3 class="rosegold text-end">
                                                    <input onclick="" type="radio" name="sponsoredapartment" id="{{ $apartment->slug }}">
                                                    <span class="checkmark2">
                                                      <span class="checkedicon"
                                                        ><i class="fa-solid fa-check"></i>
                                                      </span>
                                                    </span>
                                                </h3>
                                        </div>
                                    </div>
                                </div>
                        @endforeach --}}
        </div>

        <div class="row g-3">

            <div class="col-lg-4 col-md-6 col-sm-12 cardb cardb1">
                <h3 class="text-center">Settimanale</h3>

                <div class="pric">
                    <span class="nowp text-center">
                        <i class="fa-solid fa-euro-sign"></i>5.99</span>
                    {{-- <span class="befp"></span> --}}
                </div>

                <div class="butto">
                    <form action="{{ route('admin.braintree') }}" class="d-flex flex-column align-items-center" id="formWeek">
                        <input type="hidden" id="hidWeek" name="hidWeek">
                        <input type="hidden" id="sponsor" name="sponsor" value="1">
                        <button id="subBtnWeek" type="submit" class="text-center d-none">
                            abbonati ora
                        </button>
                        {{-- <span class="text-danger d-none">Devi prima selezionare un appartamento!</span> --}}
                    </form>
                </div>

                <ul class="text-center list-unstyled">
                    <li><i class="fa-solid fa-check"></i>Appartamento comparirà in cima a parità di ricerca</li>
                    <li><i class="fa-solid fa-xmark"></i>Risparmi sulla sponsorizzazzione nel lungo periodo</li>
                    <li><i class="fa-solid fa-xmark"></i>Resterai visibile in evidenza per molto</li>
                </ul>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 cardb cardb2">
                <h3 class="text-center">Mensile</h3>

                <div class="pric">
                    <span class="nowp text-center">
                        <i class="fa-solid fa-euro-sign"></i>19.99</span>
                    <span class="befp">23.99</span>
                </div>

                <div class="butto">
                    <form action="{{ route('admin.braintree') }}" class="d-flex flex-column align-items-center">
                        <input type="hidden" id="hidMonth" name="hidMonth">
                        <input type="hidden" id="sponsor" name="sponsor" value="2">
                        <button id="subBtnMonth" class="text-center d-none">
                            abbonati ora
                        </button>
                        {{-- <span class="text-danger">Devi prima selezionare un appartamento!</span> --}}
                    </form>
                </div>

                <ul class="text-center list-unstyled">
                    <li><i class="fa-solid fa-check"></i>Appartamento comparirà in cima a parità di ricerca</li>
                    <li><i class="fa-solid fa-check"></i>Risparmi sulla sponsorizzazzione nel lungo periodo</li>
                    <li><i class="fa-solid fa-xmark"></i>Resterai visibile in evidenza per molto</li>
                </ul>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 cardb cardb3">
                <h3 class="text-center">Annuale</h3>

                <div class="pric">
                    <span class="nowp text-center">
                        <i class="fa-solid fa-euro-sign"></i>199.99</span>
                    <span class="befp">287.99</span>
                </div>

                <div class="butto">
                    <form action="{{ route('admin.braintree') }}" class="d-flex flex-column align-items-center">
                        <input type="hidden" id="hidYear" name="hidYear">
                        <input type="hidden" id="sponsor" name="sponsor" value="3">
                        <button id="subBtnYear" class="text-center d-none">
                            abbonati ora
                        </button>
                        {{-- <span class="text-danger">Devi prima selezionare un appartamento!</span> --}}
                    </form>
                </div>

                <ul class="text-center list-unstyled">
                    <li><i class="fa-solid fa-check"></i>Appartamento comparirà in cima a parità di ricerca</li>
                    <li><i class="fa-solid fa-check"></i>Risparmi sulla sponsorizzazzione nel lungo periodo</li>
                    <li><i class="fa-solid fa-check"></i>Resterai visibile in evidenza per molto</li>
                </ul>
            </div>

        </div>
    </div>
</section>
@endsection
