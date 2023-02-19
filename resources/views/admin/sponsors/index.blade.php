@extends('layouts.admin')
@section('content')
<section>
    <div  class="container px-4 mndv">
        <div class="row">
            <div id="selectArea">
                <h1 class="text-center">Seleziona l'appartamento da sponsorizzare:</h1>
                <select name="selApartments" class="my-5" id="selApartments">
                    <option value="" selected>Seleziona l'appartamento da sponsorizzare</option>
                    @foreach ($apartments as $apartment)
                        <option value="{{ $apartment->slug }}">{{ $apartment->title }}</option>
                    @endforeach
                </select>
                <div id="previewApp" class="selectedApp my-5 d-flex justify-content-center d-none">
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
                        <div>
                            <h6>- Sponsorizzazioni attive:</h6>
                            <div class="sponsors row" id="selSponsor">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-3">

            <div class="col-lg-4 col-md-6 col-sm-12 cardb cardb1">
                <h3 class="text-center">Giornaliero</h3>

                <div class="pric">
                    <span class="nowp text-center">
                        <i class="fa-solid fa-euro-sign"></i>2.99
                    </span>
                </div>

                <div class="butto">
                    <form action="{{ route('admin.checkout') }}" class="d-flex flex-column align-items-center" id="formWeek">
                        <input type="hidden" id="hidWeek" name="hidWeek">
                        <input type="hidden" id="sponsor" name="sponsor" value="1">
                        <button id="subBtnWeek" type="submit" class="text-center d-none">
                            abbonati ora
                        </button>
                    </form>
                </div>

                <ul class="text-center list-unstyled">
                    <li><i class="fa-solid fa-check"></i>Appartamento comparirà in cima a parità di ricerca</li>
                    <li><i class="fa-solid fa-xmark"></i>Risparmi sulla sponsorizzazzione nel lungo periodo</li>
                    <li><i class="fa-solid fa-xmark"></i>Resterai visibile in evidenza per molto</li>
                </ul>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 cardb cardb2">
                <h3 class="text-center">Tre Giorni</h3>

                <div class="pric">
                    <span class="nowp text-center">
                        <i class="fa-solid fa-euro-sign"></i>5.99</span>
                    <span class="befp">8.99</span>
                </div>

                <div class="butto">
                    <form action="{{ route('admin.checkout') }}" class="d-flex flex-column align-items-center">
                        <input type="hidden" id="hidMonth" name="hidMonth">
                        <input type="hidden" id="sponsor" name="sponsor" value="2">
                        <button id="subBtnMonth" class="text-center d-none">
                            abbonati ora
                        </button>
                    </form>
                </div>

                <ul class="text-center list-unstyled">
                    <li><i class="fa-solid fa-check"></i>Appartamento comparirà in cima a parità di ricerca</li>
                    <li><i class="fa-solid fa-check"></i>Risparmi sulla sponsorizzazzione nel lungo periodo</li>
                    <li><i class="fa-solid fa-xmark"></i>Resterai visibile in evidenza per molto</li>
                </ul>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 cardb cardb3">
                <h3 class="text-center">Settimanale</h3>

                <div class="pric">
                    <span class="nowp text-center">
                        <i class="fa-solid fa-euro-sign"></i>9.99</span>
                    <span class="befp">17.99</span>
                </div>

                <div class="butto">
                    <form action="{{ route('admin.checkout') }}" class="d-flex flex-column align-items-center">
                        <input type="hidden" id="hidYear" name="hidYear">
                        <input type="hidden" id="sponsor" name="sponsor" value="3">
                        <button id="subBtnYear" class="text-center d-none">
                            abbonati ora
                        </button>
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
