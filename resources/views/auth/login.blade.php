@extends('layouts.app')
@section('style')
    @vite('resources/scss/login.scss')
@endsection

@section('content')
<div class="container mt-4 ">
    <div class="row row-cols-2 rounded form_container">

        <!-- VIDEO SECTION  -->
        <div class="video_Section p-0">
            <video muted="" autoplay="" loop=""
            src="{{asset('videos/VideoJumbo_by_DaríoIdoate.mp4')}}" type="video/mp4" class="rounded">
            <img src={{asset('videos/errorVideo.png')}} alt="Error Video">
            </video>
        </div>

        <!-- FORM SECTION  -->
        <div class="justify-content-center rounded form_section_container">
            <div class="card bg-transparent form_card">

                <div class="card-header form_header">
                    <img src="{{asset('images/DeliveBoo.png')}}" class="my_logo">
                </div>

                <div class="card-body">
                    {{-- Inizio Login Form --}}
                    <form method="POST" action="{{ route('login') }}" class="my_LoginForm">
                        @csrf

                        <div class="mb-4 row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Indirizzo E-Mail') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __("Mantieni l'accesso") }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- Pulsanti Login / ForgotPassw -->
                        <div class="mb-2 row mb-0">
                            <div class="col-md-7 offset-md-5">
                                <button type="submit" class="btn btn-primary myLogin_button">
                                    {{ __('Login') }}
                                </button>
                            </div>
                            <div class="mb-0 col-md-8 offset-md-4 mb-0">
                                @if (Route::has('password.request'))
                                <a class="btn btn-link my_forgotPsw" href="{{ route('password.request') }}">
                                    {{ __('Password dimenticata?') }}
                                </a>
                                @endif
                            </div>
                        </div>
                    </form> 
                    {{-- Fine Login Form --}}


                    {{-- INIZIO Register Form --}}

                    <form method="POST" action="{{ route('register') }}" class="d-none my_RegisterForm">
                        @csrf

                        <div class="mb-4 row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="mb-4 row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    {{-- FINE REGISTER FORM --}}

                    <hr>

                    {{-- TASTO REGISTRATI --}}
                    <div class="mb-4 row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary myRegister_button">{{ __('Registra il tuo ristorante') }}
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section("pageScript")
    <script src= @vite('resources/js/login_register.js')
@endsection


