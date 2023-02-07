@extends('layouts.admin')
@section('content')
<section id="admin-index">
    @include('partials.admin.navbar')
    <div class="create-new">
        <a href="{{ route('admin.mediabooks.create') }}" class="btn btn-outline-success">Nuovo album foto</a>
    </div>
    <div class="activities-list mt-1">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Titolo</th>                    
                    <th scope="col">Url</th>
                    <th scope="col">Modifica</th>
                    <th scope="col">Cancella</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($media as $mediabook)
                <tr>
                    <th scope="row">{{ $mediabook->id }}</th>
                    <th scope="row">
                        @if($mediabook->img)
                        <img src="{{ asset('storage/' . $mediabook->img) }}">
                        @else
                        <img src="{{Vite::asset('resources/img/not_found.jpeg')}}" alt="">
                        @endif
                    </th>
                    <td><a href="{{ route('admin.mediabooks.show', $mediabook->slug) }}" title="View mediabook">{{
                            $mediabook->title }}</a></td>
                                                <td>{!! $mediabook->img !!}</td>

                    <td><a class="link-secondary" href="{{ route('admin.mediabooks.edit', $mediabook->slug) }}"
                            title="Edit mediabook">Modifica</a></td>
                    <td>
                        <form action="{{ route('admin.mediabooks.destroy', $mediabook->slug) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-button btn btn-danger ms-3"
                                data-item-title="{{ $mediabook->slug }}">Cancella</button>
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