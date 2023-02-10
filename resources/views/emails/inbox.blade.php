@extends('layouts.app')
@section('content')
    <h1>Ciaoooo</h1>
    @foreach ($apartments as $apartmentLead)
        <hr>
        <p><strong>Mittente:</strong> {{ $apartmentLead->title }}</p>

        <hr>
    @endforeach
@endsection
