@extends('layouts.app')
@section('content')

<h1>Ciaoooo</h1>
@foreach ($apartment->leads as $lead)
    <hr>
    <p><strong>Mittente:</strong> {{ $lead->name }}</p>
    <p><strong>Id appartamento:</strong> {{ $lead->apartment_id }}</p>
    <p><strong>Mail mittente:</strong> {{ $lead->email }}</p>
    <p><strong>Messaggio:</strong> {{ $lead->message }}</p>
    <hr>
@endforeach
{{-- <h2>{{ $apartment->title }}</h2> --}}
@endsection
