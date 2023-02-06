@extends('layouts.admin')
@section('content')
    <section id="admin-index">
        @include('partials.admin.navbar')
        <div class="create-new">
            <a href="{{ route('admin.categories.create') }}" class="btn btn-outline-success">New category</a>
        </div>
        <div class="activities-list mt-1">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">html</th>
                        <th scope="col">icon</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <th scope="row">{{ $category->id }}</th>
                            <td><a href="{{ route('admin.categories.show', $category->slug) }}"
                                    title="View category">{{ $category->name }}</a></td>
                            <td> {{ $category->img }}</td>
                            <td>{!! $category->img !!}</td>
                            {{-- @if ($category->category)
                                <td>{{ $category->category->name }}</td>
                            @else
                                <td>Categoria non attribuita</td>
                            @endif --}}

                            <td><a class="link-secondary" href="{{ route('admin.categories.edit', $category->slug) }}"
                                    title="Edit category">Edit</a></td>
                            <td>
                                <form action="{{ route('admin.categories.destroy', $category->slug) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="delete-button btn btn-danger ms-3"
                                        data-item-title="{{ $category->title }}">Delete</button>
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