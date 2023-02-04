<a href="{{ route('admin.category.create') }}">Add</a>
@foreach ($categories as $category)
    <h1>{{ $category->name }}</h1>
    <p>{{ $category->slug }}</p>

    <form action="{{ route('admin.category.destroy', $category->slug) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="delete-button btn btn-danger ms-3"
            data-item-title="{{ $category->name }}">Delete</button>
    </form>
@endforeach
