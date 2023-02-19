@extends('layouts.app')
@section('content')

<section id="show-inbox">
    <div class="container my-5">
        <div class="row">
            @foreach ($apartments as $apartmentLead)
                @if (count($apartmentLead->leads) == 0)
                @else
                    @foreach ($apartmentLead->leads as $lead)
                        <div class="col-12 card my-4 text-center py-4">
                            <h4 class="pb-3"> <strong> Messaggio inviato all'appartamento : {{ $apartmentLead->title }}</strong></h4>
                            <p class="emerald"> <strong>Mittente </strong>: {{ $lead->name }} </p>
                            <p class="emerald"><strong>Mail :</strong> {{ $lead->email }}</p>
                            <p class="emerald"><strong>Testo :</strong> {{ $lead->message }}</p>
                            <a href=" mailto: {{ $lead->email }}" class="btn btn-primary my-btn align-self-center my-3">Rispondi alla mail</a>
                        </div>
                    @endforeach
                @endif
            @endforeach
        </div>
    </div>
</section>
@endsection
