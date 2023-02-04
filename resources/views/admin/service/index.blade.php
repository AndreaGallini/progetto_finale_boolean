@foreach ($services as $category)
    <h1>{{ $category->title }}</h1>
    <a href="{{ route('admin.category.edit', $category->slug) }}">modifica</a>
@endforeach
