@extends('layouts.admin')
@section('content')
    <section id="admin-index">

        <div id="admin-many" class="container p-5">
            @if (session()->has('message'))
                <div class="alert alert-success mb-3 mt-3">
                    {{ session()->get('message') }}
                </div>
            @endif
            <form action="{{ route('admin.services.store') }}" method="POST" class="d-flex flex-column align-items-center">
                @csrf
                <input type="text" name="title" id="title" class="form-control mb-3"
                    placeholder="Aggiungi un servizio">
                <input type="text" name="img" id="img" class="form-control mb-3"
                    placeholder="Aggiungi l'html della tua icona">
                <button class="btn btn-outline-success" type="submit">Nuovo servizio</button>
            </form>

            <ul class="mt-5">
                @foreach ($services as $service)
                    <li class="mb-3 pb-3 border-bottom border-dark">
                        <form id="service-{{ $service->id }}" action="{{ route('admin.services.update', $service->slug) }}"
                            method="post" class="mb-3">
                            @csrf
                            @method('PATCH')

                            <input class="border-0 bg-transparent fs-3" type="text" name="title"
                                value="{{ old('title', $service->title) }}">
                        </form>


                        <form id="service-{{ $service->id }}" class="mb-3"
                            action="{{ route('admin.services.update', $service->slug) }}" method="post">
                            @csrf
                            @method('PATCH')
                            <label for="img" class="border-0 bg-transparent fs-3">Html dell'icona:</label>
                            <input class="border-0 bg-transparent fs-3" type="text" name="img"
                                value="{{ old('img', $service->img) }}">
                        </form>

                        <div>
                            <span>Icona:</span>
                            {!! old('img', $service->img) !!}
                        </div>


                        <form action="{{ route('admin.services.destroy', $service->slug) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-button btn btn-danger"
                                data-item-title="{{ $service->title }}">Elimina</button>
                        </form>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>



    @include('partials.admin.modal-delete')
@endsection
