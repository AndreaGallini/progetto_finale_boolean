@extends('layouts.app')

@section('content')
    <div class="">
        <div class="justify-content-center">
            <div class="col-md-8 containerdd justify-content-center">
                @if (Auth::user()->isAdmin())
                    <h2>Ciao {{ Auth::user()->name }}</h2>
                    <p>Benvenuto nella tua pagina di gestione di BoolBnb </p>
                    <div class="cardsdash row">
                        <a href="{{ route('admin.apartments.index') }}"
                            class="col-12 col-md-6 col-lg-12 carda cardone d-flex align-items-center justify-content-center">
                            <h1>appartamenti</h1>
                        </a>
                        <a href="{{ route('admin.services.index') }}"
                            class="col-12 col-md-6 col-xl-4 carda cardtree d-flex align-items-center justify-content-center">
                            <h1>servizi</h1>
                        </a>
                        <a href="{{ route('admin.categories.index') }}"
                            class="col-12 col-md-6 col-xl-4 carda cardtree d-flex align-items-center justify-content-center">
                            <h1>Categorie</h1>
                        </a>
                        <a href="{{ route('admin.sponsors.index') }}"
                            class="col-12 col-md-6 col-xl-4 carda cardtwo d-flex align-items-center justify-content-center">
                            <h1>sponsorizza</h1>
                        </a>
                        <a href="{{ route('admin.inbox') }}"
                            class="col-12 col-md-6 col-xl-4 carda cardfour d-flex align-items-center justify-content-center">
                            <h1>messaggi</h1>
                        </a>
                        <a href="{{ route('admin.stats.index') }}"
                            class="col-12 col-md-6 col-xl-4 carda cardtree d-flex align-items-center justify-content-center">
                            <h1>statistiche</h1>
                        </a>

                    </div>
                @else
                    <div class="cardsdash row">
                        <a href="{{ route('admin.apartments.index') }}"
                            class="col-12 col-md-6 col-lg-12 carda cardone d-flex align-items-center justify-content-center">
                            <h1>appartamenti</h1>
                        </a>
                        <a href="{{ route('admin.sponsors.index') }}"
                            class="col-12 col-md-6 col-xl-4 carda cardtwo d-flex align-items-center justify-content-center">
                            <h1>sponsorizza</h1>
                        </a>
                        <a href="{{ route('admin.stats.index') }}"
                            class="col-12 col-md-6 col-xl-4 carda cardfour d-flex align-items-center justify-content-center">
                            <h1>messaggi</h1>
                        </a>
                        <a href="{{ route('admin.stats.index') }}"
                            class="col-12 col-md-6 col-xl-4 carda cardtree d-flex align-items-center justify-content-center">
                            <h1>statistiche</h1>
                        </a>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <a class="dropdown-item" href="{{ route('logout') }}"
        onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
        {{ __('Logout') }}
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>
@endsection
