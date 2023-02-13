<form action="{{ route('admin.categories.edit', $category->slug) }}">
    <input type="text" name="name" id="name" placeholder="Modifica nome categoria"
        value="{{ old('name', $category->name) }}">
    <input type="text" name="img" id="img" value="{{ old('img', $category->img) }}">
    <button type="submit">Modifica</button>

</form>
