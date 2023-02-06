@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                    <a href="{{ route('admin.apartments.index') }}">Index apartments</a>
                    <a href="{{ route('admin.mediabooks.index') }}">Index mediabooks</a>
                    <a href="{{ route('admin.services.index') }}">Index services</a>
                    <a href="{{ route('admin.sponsors.index') }}">Index sponsors</a>
                    <a href="{{ route('admin.categories.index') }}">Index categories</a>
                    <a href="{{ route('admin.stats.index') }}">Index stats</a>


                </div>
            </div>
        </div>
    </div>
@endsection
