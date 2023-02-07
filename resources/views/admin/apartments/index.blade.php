@extends('layouts.admin')
@section('content')
    <section id="admin-index">
        @include('partials.admin.navbar')
        <div class="create-new">
            <a href="{{ route('admin.apartments.create') }}" class="btn btn-outline-success">Nuovo appartamento</a>
        </div>
        <div class="activities-list mt-1">
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
                            <td><a href="{{ route('admin.apartments.show', $apartment->slug) }}"
                                    title="View Apartment">{{ $apartment->title }}</a></td>
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

                            <td>{{$apartment->services && count($apartment->services) > 0 ? count($apartment->services) : 0}}</td>
                            <td>{{$apartment->sponsors && count($apartment->sponsors) > 0 ? count($apartment->sponsors) : 0}}</td>


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
        </div>
    </section>
    @include('partials.admin.modal-delete')
@endsection
