@extends('layouts.admin')
@section('content')
<section id="admin-index">
    {{-- @include('partials.admin.navbar') --}}
    <div id="apartmIndex">
        <div class="container">
            <h1 class="mb-sm-3">Appartamenti registrati:</h1>

            <div class="my-apts">
                <div class="row mx-0">
                    <div class="col-12">
                        @foreach ($apartments as $apartment)
                            <div class="card my-5">
                                <div class="d-flex justify-content-start">
                                    <div class="apt-img me-5 col-4 col-lg-3">
                                        @if ($apartment->cover_img)
                                        <img class="img-fluid" src="{{ asset('storage/' . $apartment->cover_img) }}" alt="Immagine dell'appartamento">
                                        @else
                                        <img src="{{ Vite::asset('resources/img/not_found.jpeg') }}" alt="Immagine non disponibile">
                                        @endif
                                    </div>
                                    <div class="apt-details col-8 col-lg-9">
                                        <h3>
                                            <a href="{{ route('admin.apartments.show', $apartment->slug) }}" title="View Apartment">{{
                                            $apartment->title }}</a>
                                        </h3>

                                        <h5>
                                            {{ $apartment->address}}
                                        </h5>

                                        <h5>
                                            {{ $apartment->mq_value }} mq
                                        </h5>

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
                                </div>
                                <div class="d-flex justify-content-end mt-3">
                                    <div class="link-edit">
                                        <a href="{{ route('admin.apartments.edit', $apartment->slug) }}"
                                            title="Edit Apartment"><i class="fa-solid fa-pen me-2"></i>Modifica</a>
                                    </div>

                                    <form action="{{ route('admin.apartments.destroy', $apartment->slug) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                        <button type="submit" class="delete-button delete-btn"
                                        data-item-title="{{ $apartment->title }}"><i class="fa-regular fa-trash-can ms-4 me-2"></i>Elimina</button>
                                    </form>
                                </div>
                                <hr>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="create-new d-flex justify-content-end pt-0 pb-5">
                <a href="{{ route('admin.apartments.create') }}" class="add-apt d-flex align-items-center">
                    <div>
                        <i class="fa-solid fa-circle-plus me-2"></i>
                    </div>
                    <div>
                        Aggiungi un nuovo appartamento
                    </div>
                </a>
            </div>
        </div>
    </div>




    {{-- <div class="activities-list mt-1">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Titolo</th>
                    <th scope="col"># posti letto</th>
                    <th scope="col"># bagni</th>
                    <th scope="col"># stanze</th>
                    <th scope="col">Metri quadrati</th>
                    <th scope="col">Indirizzo</th>
                    <th scope="col">Prezzo</th>

                    <th scope="col">Categoria</th>

                    <th scope="col">Servizi (totale)</th>
                    <th scope="col">Sponsor (totale)</th>

                    <th scope="col">Modifica</th>
                    <th scope="col">Elimina</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($apartments as $apartment)
                <tr>
                    <th scope="row">{{ $apartment->id }}</th>
                    <td><a href="{{ route('admin.apartments.show', $apartment->slug) }}" title="View Apartment">{{
                            $apartment->title }}</a></td>
                    <td>{{ $apartment->bath_number }}</td>
                    <td>{{ $apartment->bed_number }}</td>
                    <td> {{ $apartment->room_number }}</td>
                    <td> {{ $apartment->mq_value }}</td>
                    <td> {{ $apartment->address }}</td>
                    <td> {{ $apartment->price }}</td>

                    @if ($apartment->category)
                    <td>{{ $apartment->category->name }}</td>
                    @else
                    <td>Categoria non attribuita</td>
                    @endif

                    <td>{{$apartment->services && count($apartment->services) > 0 ? count($apartment->services) : 0}}
                    </td>
                    <td>{{$apartment->sponsors && count($apartment->sponsors) > 0 ? count($apartment->sponsors) : 0}}
                    </td>


                    <td><a class="link-secondary" href="{{ route('admin.apartments.edit', $apartment->slug) }}"
                            title="Edit Apartment">Edit</a></td>
                    <td>
                        <form action="{{ route('admin.apartments.destroy', $apartment->slug) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-button btn btn-danger ms-3"
                                data-item-title="{{ $apartment->title }}">Elimina</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div> --}}
</section>
@include('partials.admin.modal-delete')
@endsection
