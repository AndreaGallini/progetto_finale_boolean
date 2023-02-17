@extends('layouts.admin')

@section('content')

<form action="{{ route('admin.sponsors.store') }}" method="POST">
    @csrf
    <input type="text" value="{{ $apartment->id }}" name="apartment_id" id="apartemnt_id">
    <input type="text" value="{{ $sponsor->id }}" name="sponsor_id" id="sponsor_id">

    <button id="saveSponsorForm" type="submit" class="btn btn-danger">Invia</button>
</form>



</body>
@endsection
