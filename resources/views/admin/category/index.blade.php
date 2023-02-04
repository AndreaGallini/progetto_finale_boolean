@foreach ($categories as $category)
    <h1>{{ $category->name }}</h1>
    <a href="{{ route('admin.category.edit', $category->slug) }}">modifica</a>
    <a href="{{ route('admin.category.destroy', $category->slug) }}">cancella</a>
@endforeach
