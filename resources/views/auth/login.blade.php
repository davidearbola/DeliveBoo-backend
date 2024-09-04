@extends('layouts.app')
@section('style')
    @vite('resources/scss/login.scss')
@endsection

@section('content')
    <div class="container mt-4">
        <div class="row row-cols-2 rounded form_container">

            <!-- VIDEO SECTION  -->
            <div class="video_Section p-0">
                <video muted autoplay loop src="{{ asset('videos/Login_Food Reel FH Studio.mp4') }}" type="video/mp4"
                    class="rounded-start myVideo">
                    <img src="{{ asset('videos/errorVideo.png') }}" alt="Error Video">
                </video>
            </div>

            <!-- FORM SECTION  -->
            <div class="justify-content-center rounded-end form_section_container">
                <div class="card bg-transparent form_card">

                    <div class="card-header form_header">
                        <img src="{{ asset('images/DeliveBoo-Photoroom.png') }}" class="my_logo">
                    </div>

                    <div class="card-body">
                        {{-- Inizio Login Form --}}
                        <form method="POST" action="{{ route('login') }}" class="my_LoginForm">
                            @csrf

                            {{-- MAIL CUSTOM FORM --}}
                            <div class="mb-2 form_box">
                                <input id="email" type="text"
                                    class="custom_input @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email">
                                <div class="form_label">{{ __('Indirizzo E-Mail') }}</div>

                                @error('email')
                                    <span class="invalid-feedback my_invalidRLogFeed" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <p id="error_login_mail" class="bg-danger rounded m-0 px-1">
                                <strong></strong>
                            </p>

                            {{-- PASSWORD CUSTOM FORM --}}
                            <div class="mb-4 form_box">
                                <input id="password" type="password"
                                    class="custom_input @error('password') is-invalid @enderror" name="password" required
                                    autocomplete="current-password">
                                <div class="form_label">{{ __('Password') }}</div>

                                @error('password')
                                    <span class="invalid-feedback my_invalidRLogFeed" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Pulsanti Login / ForgotPassw -->
                            <div class="mb-2 row mb-0">
                                <div class="col-md-7 offset-md-5">
                                    <button id="login_button" type="submit"
                                        class="btn btn-primary myLogin_Register_button">
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
                        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data"
                            class="d-none my_RegisterForm" id="registerForm">
                            @csrf

                            {{-- EMAIL CUSTOM FORM --}}

                            <div class="mb-1 form_box">
                                <input id="register_email" type="text"
                                    class="custom_input @error('register_email') is-invalid @enderror" name="register_email"
                                    value="{{ old('register_email') }}" required autocomplete="email"
                                    title="Inserisci un indirizzo email valido con un'estensione, es. .com">
                                <div class="form_label">{{ __('Indirizzo E-Mail') }}</div>

                                @error('register_email')
                                    <span class="invalid-feedback my_invalidRegFeed" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <p id="error_mail" class="bg-danger rounded m-0 px-1">
                                <strong></strong>
                            </p>

                            {{-- PASSWORD CUSTOM FORM --}}
                            <div class="mb-1 form_box">
                                <input id="register_password" type="password"
                                    class="custom_input @error('register_password') is-invalid @enderror"
                                    name="register_password" required autocomplete="new-password">
                                <div class="form_label">{{ __('Password') }}</div>

                                @error('register_password')
                                    <span class="invalid-feedback my_invalidRegFeed" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <p id="error_password" class="bg-danger rounded m-0 px-1">
                                <strong></strong>
                            </p>

                            {{-- CONFERMA PASSWORD CUSTOM FORM --}}
                            <div class="mb-1 form_box">
                                <input id="register_password-confirm" type="password" class="custom_input"
                                    name="register_password_confirmation" required autocomplete="new-password">
                                <div class="form_label">{{ __('Conferma Password') }}</div>
                            </div>

                            {{-- NOME ATTIVITÀ CUSTOM FORM --}}
                            <div class="mb-1 form_box">
                                <input id="name" type="text"
                                    class="custom_input @error('name') is-invalid @enderror" name="name" required
                                    autocomplete="name" value="{{ old('name') }}"
                                    title="Il nome deve essere una stringa di almeno 3 caratteri e massimo 255">
                                <div class="form_label">{{ __('Nome del Ristorante') }}</div>

                                @error('name')
                                    <span class="invalid-feedback my_invalidRegFeed" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <p id="error_name" class="bg-danger rounded m-0 px-1">
                                <strong></strong>
                            </p>

                            {{-- DESCRIZIONE CUSTOM FORM --}}
                            <div class="mb-3 form_box">
                                <textarea id="description" class="custom_input @error('description') is-invalid @enderror" name="description" required
                                    autocomplete="description">{{ old('description') }}</textarea>
                                <div class="form_label">{{ __('Descrizione') }}</div>

                                @error('description')
                                    <span class="invalid-feedback my_invalidRegFeed" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <p id="error_description" class="bg-danger rounded m-0 px-1">
                                <strong></strong>
                            </p>

                            {{-- TELEFONO CUSTOM FORM --}}
                            <div class="mb-1 form_box">
                                <input id="phone" type="text"
                                    class="custom_input @error('phone') is-invalid @enderror" name="phone" required
                                    autocomplete="phone" value="{{ old('phone') }}"
                                    title="Il telefono deve essere una stringa numerica di almeno 10 e massimo 11 caratteri">
                                <div class="form_label">{{ __('Telefono') }}</div>

                                @error('phone')
                                    <span class="invalid-feedback my_invalidRegFeed" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <p id="error_phone" class="bg-danger rounded m-0 px-1">
                                <strong></strong>
                            </p>

                            {{-- INDIRIZZO CUSTOM FORM --}}
                            <div class="mb-1 form_box">
                                <input id="address" type="text"
                                    class="custom_input @error('address') is-invalid @enderror" name="address" required
                                    autocomplete="address" value="{{ old('address') }}"
                                    title="L'indirizzo deve essere una stringa di almeno 3 caratteri e massimo 255">
                                <div class="form_label">{{ __('Indirizzo') }}</div>

                                @error('address')
                                    <span class="invalid-feedback my_invalidRegFeed" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <p id="error_address" class="bg-danger rounded m-0 px-1">
                                <strong></strong>
                            </p>

                            {{-- P.IVA CUSTOM FORM --}}
                            <div class="mb-1 form_box">
                                <input id="PIVA" type="text"
                                    class="custom_input @error('PIVA') is-invalid @enderror" name="PIVA" required
                                    autocomplete="PIVA" value="{{ old('PIVA') }}"
                                    title="La P.IVA deve essere una stringa numerica di esattamente 11 caratteri">
                                <div class="form_label">{{ __('P.IVA') }}</div>

                                @error('PIVA')
                                    <span class="invalid-feedback my_invalidRegFeed" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <p id="error_PIVA" class="bg-danger rounded m-0 px-1">
                                <strong></strong>
                            </p>

                            {{-- CATEGORIE CUSTOM FORM --}}
                            <div class="form-group mb-3">
                                <label>Seleziona le categorie del tuo ristorante</label>
                                @foreach ($categories as $category)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="categories[]"
                                            value="{{ $category->id }}" id="category{{ $category->id }}">
                                        <label class="form-check-label" for="category{{ $category->id }}">
                                            {{ $category->name }}
                                        </label>
                                    </div>
                                @endforeach
                                @error('categories')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            {{-- IMMAGINE CUSTOM FORM --}}
                            <div class="mb-1 form_box">
                                <input id="image_path" type="file" @error('image_path') is-invalid @enderror"
                                    name="image_path" required>
                                <div>{{ __('Carica un\'immagine') }}</div>

                                @error('image_path')
                                    <span class="invalid-feedback my_invalidRegFeed" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="mb-1 row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button id="button_register" type="submit"
                                        class="btn btn-primary myLogin_Register_button"
                                        {{ $errors->any() ? '' : 'disabled' }}>
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
                                <button type="button"
                                    class="btn btn-primary mySwapLogin_Register_button">{{ __('Registra il tuo ristorante') }}
                                </button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('pageScript')
    <script>
        window.showRegistrationForm = @json(session('showRegistrationForm', false));
    </script>
<script src=@vite('resources/js/login_register.js') @endsection
