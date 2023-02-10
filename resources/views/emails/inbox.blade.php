@extends('layouts.app')
@section('content')
    @foreach ($apartments as $apartmentLead)
        <hr>
        <p><strong>Appartamento:</strong> {{ $apartmentLead->title }}</p>
        <ul>
            @foreach ($apartmentLead->leads as $lead)
                <li>{{ $lead->name }}</li>
                <li>{{ $lead->email }}</li>
                <li>{{ $lead->message }}</li>
            @endforeach
        </ul>

        <hr>
    @endforeach
@endsection
