<form action="{{ route('admin.categories.store') }}" method="POST">
    @csrf
    <input type="text" name="name">

    <input type="text" name="img">
    <button type="submit">Sumbit</button>
</form>
