@extends('layouts.admin')
@section('content')
    <section id="admin-index">
        <div id="apartmIndex">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h1 class="mb-sm-3">Appartamenti registrati</h1>
                    </div>
                    <div class="create-new d-flex">
                        <a href="{{ route('admin.apartments.create') }}" class="add-apt d-flex align-items-center">
                            <div>
                                <i class="fa-solid fa-circle-plus me-2"></i>
                            </div>
                            <div class="d-block d-md-none">
                                Nuovo
                            </div>
                            <div class="d-none d-md-block">
                                Aggiungi un nuovo appartamento
                            </div>
                        </a>
                    </div>
                </div>
                <div class="my-apts">
                    <div class="row mx-0">
                        @foreach ($apartments as $apartment)
                            <div class="col-12">
                                <div class="card my-5">
                                    <div class="row">
                                        <a href="{{ route('admin.apartments.show', $apartment->slug) }}"
                                            class="apt-img me-5 col-12 col-md-12 col-lg-3">
                                            @if ($apartment->cover_img)
                                                <img src="{{ asset('storage/' . $apartment->cover_img) }}"
                                                    alt="Immagine dell'appartamento">
                                            @else
                                                <img src="{{ Vite::asset('resources/img/not_found.jpeg') }}"
                                                    alt="Immagine non disponibile">
                                            @endif
                                        </a>
                                        <div class="apt-details col-12 col-md-12 col-lg-6">
                                            <h3>
                                                <a href="{{ route('admin.apartments.show', $apartment->slug) }}" title="View Apartment">{{ $apartment->title }}</a>
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
                                        {{-- <div class="sponsor col-12 col-md-12 col-lg-2">
                                            <h2 class="d-flex">
                                                <a class="sponsorr" href="{{ route('admin.apartments.show', $apartment->slug) }}"
                                                    title="View Apartment">sponsorizza</a>
                                            </h2>
                                        </div> --}}
                                        <div class="apt-details col-12 col-md-12 col-lg-2">
                                            @if (count($apartment->sponsors) > 0)
                                                <div class="mytry">
                                                    SPONSORIZZATO
                                                </div>
                                            @else
                                                <div>
                                                    Non Sponsorizzato
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end mt-3">
                                        <div class="link-edit">
                                            <a href="{{ route('admin.apartments.edit', $apartment->slug) }}"
                                                title="Edit Apartment"><i class="fa-solid fa-pen me-2"></i>Modifica</a>
                                        </div>

                                        <form action="{{ route('admin.apartments.destroy', $apartment->slug) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="delete-button delete-btn"
                                                data-item-title="{{ $apartment->title }}"><i
                                                    class="fa-regular fa-trash-can ms-4 me-2"></i>Elimina</button>
                                        </form>
                                    </div>
                                    <hr>
                                </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    @include('partials.admin.modal-delete')
@endsection
