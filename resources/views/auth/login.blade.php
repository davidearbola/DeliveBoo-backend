@extends('layouts.app')
@section('style')
    @vite('resources/scss/login.scss')
@endsection

@section('content')
<div class="container mt-4">
    <div class="row row-cols-2 rounded form_container">

        <!-- VIDEO SECTION  -->
        <div class="video_Section p-0">
            <video muted="" autoplay="" loop=""
            src="{{asset('videos/Login_Food Reel FH Studio.mp4')}}" type="video/mp4" class="rounded-start myVideo">
            <img src={{asset('videos/errorVideo.png')}} alt="Error Video">
            </video>
        </div>

        <!-- FORM SECTION  -->
        <div class="justify-content-center rounded-end form_section_container">
            <div class="card bg-transparent form_card">

                <div class="card-header form_header">
                    <img src="{{asset('images/DeliveBoo-Photoroom.png')}}" class="my_logo">
                </div>

                <div class="card-body">
                    {{-- Inizio Login Form --}}
                    <form method="POST" action="{{ route('login') }}" class="my_LoginForm">
                        @csrf

                        {{-- MAIL CUSTOM FORM --}}
                        <div class="mb-4 form_box">
                            {{-- Devo necessariamente inserire type text perchè se no non mi attiva bene la regola css "valid" qualora non metta una mail --}}
                            <input id="email" type="text" class="custom_input @error('email') is-invalid @enderror" name="email" value=""  required autocomplete="email">
                            <div class="form_label">{{ __('Indirizzo E-Mail') }}</div>

                            @error('email')
                            <span class="invalid-feedback my_invalidRLogFeed" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        
                        {{-- PASSW CUSTOM FORM --}}
                        <div class="mb-4 form_box">
                            <input id="password" type="password" class="custom_input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">                                                    
                            <div class="form_label">{{ __('Password') }}</div>

                            @error('password')
                            <span class="invalid-feedback my_invalidRLogFeed" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        
                        </div>

                        <div class="mb-4 row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label my_invalidRLogFeed" for="remember">
                                        {{ __("Mantieni l'accesso") }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <!-- Pulsanti Login / ForgotPassw -->
                        <div class="mb-2 row mb-0">
                            <div class="col-md-7 offset-md-5">
                                <button type="submit" class="btn btn-primary myLogin_Register_button">
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

                        <div class="mb-4 form_box">
                            {{-- Devo necessariamente inserire type text perchè se no non mi attiva bene la regola css "valid" qualora non metta una mail --}}
                            <input id="email" type="text" class="custom_input @error('email') is-invalid @enderror" name="email" value=""  required autocomplete="email">
                            <div class="form_label">{{ __('Indirizzo E-Mail') }}</div>

                            @error('email')
                            <span class="invalid-feedback my_invalidRegFeed" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>


                        {{-- PASSW CUSTOM FORM --}}
                        <div class="mb-4 form_box">
                            <input id="password" type="password" class="custom_input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">                                                    
                            <div class="form_label">{{ __('Password') }}</div>

                            @error('password')
                            <span class="invalid-feedback my_invalidRegFeed" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror         
                        </div>

                        <div class="mb-4 form_box">                      
                            <input id="password-confirm" type="password" class="custom_input" name="password_confirmation" required autocomplete="new-password">
                            <label for="password-confirm" class="form_label">{{ __('Confirm Password') }}</label>
                        </div>



                        <div class="mb-4 row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary myLogin_Register_button">
                                    {{ __('Registrati') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    {{-- FINE REGISTER FORM --}}

                    <hr>

                    {{-- TASTO LOGIN/REGISTRATI --}}
                    <div class="mb-4 row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary mySwapLogin_Register_button">{{ __('Registra il tuo ristorante') }}
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


