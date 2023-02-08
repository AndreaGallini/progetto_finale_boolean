@extends('layouts.app')

@section('content')
    <div class="">
        <div class="justify-content-center">
            <div class="col-md-8 containerdd justify-content-center">
                @if (Auth::user()->isAdmin())
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>
                    {{-- <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div> --}}
                    <a href="{{ route('admin.apartments.index') }}">Index apartments</a>
                    <a href="{{ route('admin.mediabooks.index') }}">Index mediabooks</a>
                    <a href="{{ route('admin.services.index') }}">Index services</a>
                    <a href="{{ route('admin.sponsors.index') }}">Index sponsors</a>
                    <a href="{{ route('admin.categories.index') }}">Index categories</a>
                    <a href="{{ route('admin.stats.index') }}">Index stats</a>
                </div>
                    @else
                    <div class="cardsdash">
                        <a href="{{ route('admin.apartments.index') }}" class="carda cardone d-flex align-items-center justify-content-center">
                            <h1>appartamenti</h1>
                        </a>
                        <a href="{{ route('admin.sponsors.index') }}" class="carda cardtwo d-flex align-items-center justify-content-center">
                            <h1>sponsorizza</h1>
                        </a>
                        <a href="{{ route('admin.stats.index') }}" class="carda cardtree d-flex align-items-center justify-content-center">
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
