@extends('layouts.app')
@section('style')
    @vite('resources/scss/login.scss')
@endsection

@section('content')
    <div class="container mt-4" id="my_container">
        <div class="row row-cols-1 row-cols-lg-2 rounded form_container">

            <!-- VIDEO SECTION  -->
            <div class="video_Section d-none d-lg-block p-0">
                <video muted autoplay loop src="{{ asset('videos/Login_Food Reel FH Studio.mp4') }}" type="video/mp4"
                    class="rounded-start myVideo">
                    <img src="{{ asset('videos/errorVideo.png') }}" alt="Error Video">
                </video>
            </div>

            <!-- FORM SECTION  -->
            <div class="justify-content-center rounded-end form_section_container">
                <div class="card bg-transparent form_card">

                    <div class="card-header form_header">
                        {{-- Se in formato tablet/cellulare si toglie l'header e questo logo reindirizza alla home del front --}}
                        <a href="http://localhost:5173" class="my_logoAsLink">
                            <img src="{{ asset('images/DeliveBoo-Photoroom.png') }}" class="my_logo">
                        </a>
                        <img src="{{ asset('images/DeliveBoo-Photoroom.png') }}" class="my_logo notALink">
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

                                <p id="error_login_mail" class="bg-danger rounded m-0 px-1 my_absolute">
                                    <strong></strong>
                                </p>

                                @error('email')
                                    <span class="invalid-feedback my_invalidRLogFeed" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


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
                            <div class="mb-2 row mb-0 justify-content-center">
                                <div class="col-auto">
                                    <button id="login_button" type="submit"
                                        class="btn btn-primary myLogin_Register_button">
                                        {{ __('Login') }}
                                    </button>
                                </div>
                                <div class="mb-0 col-8 offset-4 mb-0">
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

                                <p id="error_mail" class="bg-danger rounded m-0 px-1 my_absolute">
                                    <strong></strong>
                                </p>

                                @error('register_email')
                                    <span class="invalid-feedback my_invalidRegFeed" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            {{-- PASSWORD CUSTOM FORM --}}
                            <div class="mb-1 form_box">
                                <input id="register_password" type="password"
                                    class="custom_input @error('register_password') is-invalid @enderror"
                                    name="register_password" required autocomplete="new-password">
                                <div class="form_label">{{ __('Password') }}</div>

                                <p id="error_password" class="bg-danger rounded m-0 px-1 my_absolute">
                                    <strong></strong>
                                </p>

                                @error('register_password')
                                    <span class="invalid-feedback my_invalidRegFeed" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


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

                                <p id="error_name" class="bg-danger rounded m-0 px-1 my_absolute">
                                    <strong></strong>
                                </p>

                                @error('name')
                                    <span class="invalid-feedback my_invalidRegFeed" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            {{-- DESCRIZIONE CUSTOM FORM --}}
                            <div class="mb-1 form_box">
                                <input type="text" id="description"
                                    class="custom_input @error('description') is-invalid @enderror" name="description"
                                    required autocomplete="description" value="{{ old('description') }}">
                                <div class="form_label">{{ __('Descrizione') }}</div>

                                <p id="error_description" class="bg-danger rounded m-0 px-1 my_absolute">
                                    <strong></strong>
                                </p>

                                @error('description')
                                    <span class="invalid-feedback my_invalidRegFeed" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>



                            {{-- TELEFONO CUSTOM FORM --}}
                            <div class="mb-1 form_box">
                                <input id="phone" type="text"
                                    class="custom_input @error('phone') is-invalid @enderror" name="phone" required
                                    autocomplete="phone" value="{{ old('phone') }}"
                                    title="Il telefono deve essere una stringa numerica di almeno 10 e massimo 11 caratteri">
                                <div class="form_label">{{ __('Telefono') }}</div>

                                <p id="error_phone" class="bg-danger rounded m-0 px-1 my_absolute">
                                    <strong></strong>
                                </p>

                                @error('phone')
                                    <span class="invalid-feedback my_invalidRegFeed" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            {{-- INDIRIZZO CUSTOM FORM --}}
                            <div class="mb-1 form_box">
                                <input id="address" type="text"
                                    class="custom_input @error('address') is-invalid @enderror" name="address" required
                                    autocomplete="address" value="{{ old('address') }}"
                                    title="L'indirizzo deve essere una stringa di almeno 3 caratteri e massimo 255">
                                <div class="form_label">{{ __('Indirizzo') }}</div>

                                <p id="error_address" class="bg-danger rounded m-0 px-1 my_absolute">
                                    <strong></strong>
                                </p>

                                @error('address')
                                    <span class="invalid-feedback my_invalidRegFeed" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            {{-- P.IVA CUSTOM FORM --}}
                            <div class="mb-1 form_box">
                                <input id="PIVA" type="text"
                                    class="custom_input @error('PIVA') is-invalid @enderror" name="PIVA" required
                                    autocomplete="PIVA" value="{{ old('PIVA') }}"
                                    title="La P.IVA deve essere una stringa numerica di esattamente 11 caratteri">
                                <div class="form_label">{{ __('P.IVA') }}</div>

                                <p id="error_PIVA" class="bg-danger rounded m-0 px-1 my_absolute">
                                    <strong></strong>
                                </p>

                                @error('PIVA')
                                    <span class="invalid-feedback my_invalidRegFeed" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>



                            {{-- CATEGORIE CUSTOM FORM --}}
                            <label class="mt-2">Seleziona le categorie del tuo ristorante</label>
                            <div class="form-group my-3 my_categoriesContainer">
                                @foreach ($categories as $category)
                                    <div class="form-check my_categoryBox">
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

                            <div class=" row mb-0 justify-content-center">
                                <div class="col-md-6 text-center">
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
                        <div class="mb-4 row mb-0 justify-content-center">
                            <div class="col-auto">
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
