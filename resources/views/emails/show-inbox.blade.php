@extends('layouts.app')
@section('content')
    <h1>Inbox di: {{ $apartment->title }} </h1>
    <section class="  my_dflex">

        @foreach ($apartment->leads as $lead)
            <div class=" my_col">
                <div class="top_messages ">

                    <p class="name_message"><strong>Mittente:</strong> {{ $lead->name }}</p>
                    <p class="mail_message"><strong>Mail mittente:</strong> {{ $lead->email }}</p>


                    <small onclick="dropdown({{ $lead->id }})">Clicca qui per vedere il corpo della mail</small>
                </div>
                <div class="bottom_messages" :id="myDropdown.
                {{ $lead->id }}">
                    <p class="pt-2"><strong>Messaggio:</strong> {{ $lead->message }}</p>
                </div>
            </div>
        @endforeach

    </section>
    {{-- <h2>{{ $apartment->title }}</h2> --}}
@endsection
<script>
    function dropdown(id) {
        document.getElementById('myDropdown'
            '.'.id).classList.toggle("show");
    }
</script>
