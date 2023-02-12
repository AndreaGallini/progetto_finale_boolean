@extends('layouts.admin')
@section('content')
    <section id="mediabookIndex" class="py-5">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div>
                    <h1 class="mb-sm-3">Media disponibili</h1>
                </div>

                <div class="create-new d-flex">
                    <a href="{{ route('admin.mediabooks.create') }}" class="add-apt d-flex align-items-center">
                        <div>
                            <i class="fa-solid fa-circle-plus me-2"></i>
                        </div>
                        <div class="d-block d-md-none">
                            Nuovo
                        </div>
                        <div class="d-none d-md-block">
                            Aggiungi un nuovo media
                        </div>
                    </a>
                </div>
            </div>

            <div class="row">
                @foreach ($media as $mediabook)
                    <div class="card col-12 col-md-6 my-5">
                        <img src="{{ asset('storage/' . $mediabook->img) }}" class="card-img-top" alt="Immagine alloggio">
                        <div class="card-body">
                            <h5 class="card-title">#{{ $mediabook->id }}</h5>
                            <h5 class="card-title"><a href="{{ route('admin.mediabooks.show', $mediabook->slug) }}"
                                    title="View mediabook"><strong>{{ $mediabook->title }}</strong></a></h5>
                        </div>

                        <ul class="list-group">
                            <li class="list-group-item">Appartenente all'alloggio con <strong>id
                                    {{ $mediabook->apartment_id }}</strong></li>
                            <li class="list-group-item"><strong>Url</strong><br> {!! $mediabook->img !!}</li>
                        </ul>
                        <div class="card-body d-flex justify-content-center">
                            <div class="link-edit">
                                <a href="{{ route('admin.mediabooks.edit', $mediabook->slug) }}" title="Edit mediabook"><i
                                        class="fa-solid fa-pen me-2"></i>Modifica</a>
                            </div>
                            <div>
                                <form action="{{ route('admin.mediabooks.destroy', $mediabook->slug) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete-button delete-btn"
                                        data-item-title="{{ $mediabook->slug }}"><i
                                            class="fa-regular fa-trash-can ms-4 me-2"></i>Elimina</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- <div class="mt-4 table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="bold-txt" scope="col">#</th>
                        <th class="bold-txt" scope="col">Foto</th>
                        <th class="bold-txt" scope="col">Titolo</th>
                        <th class="bold-txt" scope="col">id appartamento</th>
                        <th class="bold-txt" scope="col">Url</th>
                        <th class="bold-txt" scope="col">Modifica</th>
                        <th class="bold-txt" scope="col">Cancella</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($media as $mediabook)
                    <tr>
                        <th scope="row">{{ $mediabook->id }}</th>
                        <th scope="row">
                            @if ($mediabook->img)
                            <img src="{{ asset('storage/' . $mediabook->img) }}">
                            @else
                            <img src="{{Vite::asset('resources/img/not_found.jpeg')}}" alt="Immagine non disponibile">
                            @endif
                        </th>
                        <td><a href="{{ route('admin.mediabooks.show', $mediabook->slug) }}" title="View mediabook">{{
                                $mediabook->title }}</a></td>

                        <td>{{$mediabook->apartment_id }}</td>

                        <td>{!! $mediabook->img !!}</td>

                        <td class="link-edit"><a href="{{ route('admin.mediabooks.edit', $mediabook->slug) }}"
                                title="Edit mediabook"><i class="fa-solid fa-pen me-2"></i></a></td>
                        <td>
                            <form action="{{ route('admin.mediabooks.destroy', $mediabook->slug) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="delete-button delete-btn"
                                    data-item-title="{{ $mediabook->slug }}"><i class="fa-regular fa-trash-can ms-4 me-2"></i></button>
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
