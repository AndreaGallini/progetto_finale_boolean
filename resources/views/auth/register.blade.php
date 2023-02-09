@extends('layouts.app')

@section('content')
    <div class="container mt-4 pdnt" id="register">
        <div class="row justify-content-center">
            <div class="col-md-8">



                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <div class="mb-4 row justify-content-center">
                        {{-- <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail
                        Address') }}</label> --}}

                        <div class="col-md-6">
                            <input placeholder="Nome" id="name" type="text"
                                class="form-control @error('name') is-invalid @enderror" name="name"
                                value="{{ old('name') }}" autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>


                    <div class="mb-4 row justify-content-center">
                        {{-- <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail
                        Address') }}</label> --}}

                        <div class="col-md-6">
                            <input placeholder="Mail" id="email" type="email"
                                class="form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-4 row justify-content-center">
                        {{-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password')
                        }}</label> --}}

                        <div class="col-md-6">
                            <input placeholder="Password" id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>


                    <div class="mb-4 row justify-content-center">
                        {{-- <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password')
                        }}</label> --}}

                        <div class="col-md-6">
                            <input placeholder="Conferma Password" id="password-confirm" type="password"
                                class="form-control" name="password_confirmation" required autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>



                    <div class="mb-4 row mb-0 justify-content-center">
                        <div class="col-5  text-center">
                            <button type="submit" class="bottone">
                                {{ __('Registrati') }}
                            </button>
                        </div>
                    </div>
                    <div class="mb-4 row mb-0 justify-content-center">
                        <div class="col-6 text-center">
                            <span>Hai già account? <a class="nav-link}}" href="{{ route('login') }}">
                                    Accedi</a></span>

                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
@endsection
