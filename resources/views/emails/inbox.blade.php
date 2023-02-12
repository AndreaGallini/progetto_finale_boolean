@extends('layouts.app')
@section('content')
    <div class="container-fluid mt-4 mb-5">
        <div class="row">
            @foreach ($apartments as $apartmentLead)
                @if (count($apartmentLead->leads) == 0)
                @else
                    @foreach ($apartmentLead->leads as $lead)
                        <div class="col-4">
                            <h4> <strong> Messaggio inviato all'appartamento : {{ $apartmentLead->title }}</strong></h4>
                            <p> <strong>Mittente </strong>: {{ $lead->name }} </p>
                            <p><strong>Mail :</strong> {{ $lead->email }}</p>
                            <p><strong>Testo :</strong> {{ $lead->message }}</p>
                            <a href=" mailto: {{ $lead->email }}" class="btn btn-primary">Rispondi alla mail</a>

                        </div>
                    @endforeach
                @endif
            @endforeach
        </div>
    </div>
@endsection
