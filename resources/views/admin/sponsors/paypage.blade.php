@extends('layouts.empty')

@section('content')

<form action="{{ route('admin.sponsors.store') }}" method="POST" class="d-none">
    @csrf
    <input type="text" value="{{ $apartment->id }}" name="apartment_id" id="apartemnt_id">
    <input type="text" value="{{ $sponsor->id }}" name="sponsor_id" id="sponsor_id">

    <button id="saveSponsorForm" type="submit" class="btn btn-danger">Invia</button>
</form>
<section id="checkout" class="vw-100 vh-100 d-flex justify-content-center align-items-center">
    <div id="boxLoad" class="loadingPayment d-flex flex-column justify-content-center align-items-center">
        <div id="success" class="checkSuccess d-none">
            <div class="wrapper">
                <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52"> <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/> <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/></svg>
            </div>
        </div>
        <div id="spinner" class="spinner">
            <div class="rect1"></div>
            <div class="rect2"></div>
            <div class="rect3"></div>
            <div class="rect4"></div>
            <div class="rect5"></div>
        </div>
        <div id="toBeApproved" class="text-center">
            <h5>Perfavore attendi mentre contattiamo la tua banca</h5>
            <p>transazione in corso...</p>
        </div>
    </div>
</section>
@endsection
