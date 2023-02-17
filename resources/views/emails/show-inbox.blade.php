@extends('layouts.app')
@section('content')

<section id="show-inbox">
    <div class="container py-5">
        <h4 class="pb-4">I tuoi messaggi per: {{ $apartment->title }} </h4>
        <div class="msg-list">
            @foreach ($apartment->leads as $lead)
                <div class="my_col">
                    <div class="top_messages">
    
                        <p class="name_message">
                            <span class="emerald"><strong>Mittente:</strong>
                            </span> {{ $lead->name }}</p>

                        <p class="mail_message"><span  class="emerald"><strong>Mail mittente:</strong></span> {{ $lead->email }}</p>
    
                        <small onclick="dropdown({{ $lead->id }})">
                            <i class="fa-solid fa-envelope emerald pe-2"></i>
                                Clicca qui per vedere il corpo della mail</small>
                    </div>
                    <div class="bottom_messages d-none" id="myDropdown_{{ $lead->id }}">
                        <p class="pt-3"><span class="emerald"><strong>Messaggio:</strong></span>
                            {{ $lead->message }}</p>
                    </div>
                </div>
            <hr />
            @endforeach
        </div>
    </div>
@endsection 

   
<script>
    function dropdown(id) {
        // console.log('ciao')
        const selMessage = document.getElementById(`myDropdown_${id}`);
        selMessage.classList.toggle('d-none');
        console.log(selMessage.classList)
    }

  
</script>
