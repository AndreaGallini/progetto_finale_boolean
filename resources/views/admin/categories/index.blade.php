<a href="{{ route('admin.categories.create') }}">Add</a>
@foreach ($categories as $category)
    {{-- @dd($category) --}}

    <h1>{{ $category->name }}</h1>
    <p>{{ $category->slug }}</p>
    <a href="{{ route('admin.categories.edit', $category->slug) }}">edit</a>

    <form action="{{ route('admin.categories.destroy', $category->slug) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="delete-button btn btn-danger ms-3"
            data-item-title="{{ $category->name }}">Delete</button>
    </form>
@endforeach