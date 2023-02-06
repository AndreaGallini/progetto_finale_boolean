@extends('layouts.admin')

@section('content')
<section id="admin-show">
    <div>
        <a class="back-btn btn btn-dark" href="{{route('admin.mediabooks.index')}}">BACK</a>
        <h1>{{ $mediabook->title }}</h1>
        <div class="image">
            @if($mediabook->img)
            <img src="{{ asset('storage/' . $mediabook->img) }}">
            @else
            <img src="{{Vite::asset('resources/img/not_found.jpeg')}}" alt="">
            @endif
        </div>
    </div>
    </div>
</section>
@endsection