@extends('layouts.admin')
@section('content')
    <section id="admin-index">
        @include('partials.admin.navbar')
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
                <button class="btn btn-outline-success" type="submit">Nuovo servizio</button>
            </form>
            <ul class="mt-5">
                @foreach ($services as $service)
                    <li class="mb-3 pb-3 border-bottom border-dark">
                        <form id="servizio-{{ $service->id }}" class="mb-3"
                            action="{{ route('admin.services.update', $service->slug) }}" method="post">
                            @csrf
                            @method('PATCH')
                            <input class="border-0 bg-transparent fs-3" type="text" name="title"
                                value="{{ $service->title }}"> 
                            <input class="border-0 bg-transparent fs-3" type="text" name="img"
                            value="{{ $service->img }}">
                            <div>{!! $service->img !!}</div>
                        </form>
                        <form action="{{ route('admin.services.destroy', $service->slug) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-button btn btn-danger"
                                data-item-title="{{ $service->title }}">DELETE</button>
                        </form>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>

    @include('partials.admin.modal-delete')
@endsection
