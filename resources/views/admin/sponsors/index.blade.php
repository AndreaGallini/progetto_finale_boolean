@extends('layouts.admin')
@section('content')
<section>
    <div  class=" container px-4 mndv">
        <div class="row">
            <h1>Seleziona l'appartamento da sponsorizzare:</h1>
            @foreach ($apartments as $apartment)
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
                        @endforeach
        </div>

        <div class="row  g-3">

            <div class="col-lg-4 col-md-6 col-sm-12 cardb cardb1">
                <h3 class="text-center">Settimanale</h3>

                <div class="pric">
                    <span class="nowp text-center">
                        <i class="fa-solid fa-euro-sign"></i>5.99</span>
                    {{-- <span class="befp"></span> --}}
                </div>
                
                <div class="butto">
                    <a class="text-center" href="#">
                        abbonati ora
                    </a>
                </div>

                <ul class="text-center list-unstyled">
                    <li><i class="fa-solid fa-check"></i>motivo generico dove spiegi cose</li>
                    <li><i class="fa-solid fa-xmark"></i>motivo generico</li>
                    <li><i class="fa-solid fa-xmark"></i>motivo generico dove spiegi cose</li>
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
                    <a class="text-center" href="#">
                        abbonati ora
                    </a>
                </div>

                <ul class="text-center list-unstyled">
                    <li><i class="fa-solid fa-check"></i>motivo generico</li>
                    <li><i class="fa-solid fa-check"></i>motivo generico dove spiegi cose</li>
                    <li><i class="fa-solid fa-xmark"></i>motivo generico dove spiegi cose</li>
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
                    <a class="text-center" href="#">
                        abbonati ora
                    </a>
                </div>

                <ul class="text-center list-unstyled">
                    <li><i class="fa-solid fa-check"></i>motivo generico dove spiegi cose</li>
                    <li><i class="fa-solid fa-check"></i>motivo generico dove spiegi cose</li>
                    <li><i class="fa-solid fa-check"></i>motivo generico</li>
                </ul>
            </div>

        </div>
    </div>
    <script>
        
    </script>
</section>
@include('partials.admin.modal-delete')
@endsection