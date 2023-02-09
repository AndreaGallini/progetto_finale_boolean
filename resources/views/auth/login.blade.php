@extends('layouts.app')

@section('content')
    <div class="container mt-4 pdnt" id="login">
        <div class="row justify-content-center">
            <div class="col-md-8 ">

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="mb-4 row justify-content-center">
                        {{-- <label for="email"
                            class="col-md-4 col-form-label text-md-right">{{ __('E-Mail
                                                    Address') }}</label> --}}

                        <div class="col-md-6">
                            <input placeholder="Email" id="email" type="email"
                                class="form-control mycont @error('email') is-invalid @enderror" name="email"
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
                                class="form-control mycont @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    {{-- remember me --}}

                    {{-- <div class="mb-4 row">
                    <div class="col-md-6 offset-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{
                                old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>
                </div> --}}

                    <div class="mb-4 row mb-0 justify-content-center">
                        <div class="col-5 text-center">
                            <button type="submit" class="bottone">
                                {{ __('Login') }}
                            </button>
                        </div>
                    </div>
                    <div class="row">
                        <div class=" text-center align-items-center">
                            <span>Non hai un account?</span>
                            <a href="{{ route('register') }}" class="btnloginhighlight text-center">
                                {{ __('Registrati') }}
                            </a>
                        </div>  
                    </div>
                    <div class="row">
                        @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Non ricordi la tua Password?') }}
                        </a>
                    @endif
                    </div>
                     
                </form>
            </div>
        </div>
    </div>
@endsection
