{{-- <h1>Un nuovo utente è interessato all'appartamento : {{ $apartment->title }}</h1> --}}
<h1>Un nuovo utente è interessato all'appartamento : {{ $lead->apartment_id }}</h1>

<p>
    <strong><h4 class="d-inline-block">Nome : </h4></strong> {{ $lead->name }}
    <strong><h4 class="d-inline-block">Email : </h4></strong> {{ $lead->email }}
    <strong><h4>Messaggio : </h4></strong> {{ $lead->message }}
</p>
