<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fontawesome 6 cdn -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css'
        integrity='sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=='
        crossorigin='anonymous' referrerpolicy='no-referrer' />

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
</head>  
  
<body>
  <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Aggiungi un nuovo ristorante</div>

                    <div class="card-body">
                        <form id="createProductForm" method="POST" action="{{ route('admin.restaurants.store') }}"
                            enctype="multipart/form-data">
                            @csrf

                            <!-- Step 1: Product Name -->
                            <div class="form-step active">
                                <div class="form-group mb-3">
                                    <label for="name">Come si chiama il ristorante?</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="name" name="name" value="{{ old('name') }}" required>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <button type="button" class="btn btn-success next-btn">Avanti</button>
                            </div>

                            <!-- Step 2: Description -->
                            <div class="form-step">
                                <div class="form-group mb-3">
                                    <label for="description">Aggiungi una descrizione</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                                        rows="3">{{ old('description') }}</textarea>
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <button type="button" class="btn btn-secondary prev-btn">Indietro</button>
                                <button type="button" class="btn btn-success next-btn">Avanti</button>
                            </div>

                            <!-- Step 3: Phone -->
                            <div class="form-step">
                                <div class="form-group mb-3">
                                    <label for="phone">Inserisci numero di telefono</label>
                                    <input type="number" class="form-control @error('phone') is-invalid @enderror"
                                        id="phone" name="phone" value="{{ old('phone') }}" required>
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <button type="button" class="btn btn-secondary prev-btn">Indietro</button>
                                <button type="button" class="btn btn-success next-btn">Avanti</button>
                            </div>

                            <!-- Step 4: Address -->
                            <div class="form-step">
                                <div class="form-group mb-3">
                                    <label for="address">Indirizzo del tuo ristorante?</label>
                                    <input type="text" class="form-control @error('address') is-invalid @enderror"
                                        id="address" name="address" value="{{ old('address') }}" required>
                                    @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <button type="button" class="btn btn-success next-btn">Avanti</button>
                            </div>

                            <!-- Step 5: PIVA -->
                            <div class="form-step">
                                <div class="form-group mb-3">
                                    <label for="PIVA">Inserisci la P.IVA</label>
                                    <input type="number" class="form-control @error('PIVA') is-invalid @enderror"
                                        id="PIVA" name="PIVA" value="{{ old('PIVA') }}" required>
                                    @error('PIVA')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <button type="button" class="btn btn-secondary prev-btn">Indietro</button>
                                <button type="button" class="btn btn-success next-btn">Avanti</button>
                            </div>

                            <!-- Step 6: Image Upload -->
                            <div class="form-step">
                                <div class="form-group mb-3">
                                    <label for="image_path">Aggiungi un immagine del tuo ristorante</label>
                                    <input type="file" class="form-control-file @error('image_path') is-invalid @enderror"
                                        id="image_path" name="image_path" required>
                                    @error('image_path')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <button type="button" class="btn btn-secondary prev-btn">Indietro</button>
                                <button type="button" class="btn btn-success next-btn">Avanti</button>
                            </div>

                             <!-- Step 7: Categories -->
                             <div class="form-step">
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
                                <button type="button" class="btn btn-secondary prev-btn">Indietro</button>
                                <button type="button" class="btn btn-success next-btn">Avanti</button>
                            </div>

                            <!-- Step 8: Review & Submit -->
                            <div class="form-step">
                                <h3>Riepilogo</h3>
                                <ul id="reviewList"></ul>
                                <button type="button" class="btn btn-secondary prev-btn">Indietro</button>
                                <button type="submit" class="btn btn-success">Crea il nuovo Ristorante</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let currentStep = 0;
            const formSteps = document.querySelectorAll('.form-step');
            const nextBtns = document.querySelectorAll('.next-btn');
            const prevBtns = document.querySelectorAll('.prev-btn');
            const reviewList = document.getElementById('reviewList');

            nextBtns.forEach((btn, index) => {
                btn.addEventListener('click', () => {
                    if (validateStep(index)) {
                        formSteps[currentStep].classList.remove('active');
                        currentStep++;
                        formSteps[currentStep].classList.add('active');
                        if (currentStep === formSteps.length - 1) {
                            populateReview();
                        }
                    }
                });
            });

            prevBtns.forEach(btn => {
                btn.addEventListener('click', () => {
                    formSteps[currentStep].classList.remove('active');
                    currentStep--;
                    formSteps[currentStep].classList.add('active');
                });
            });

            function validateStep(stepIndex) {
                const inputs = formSteps[stepIndex].querySelectorAll('input, textarea, select');
                let valid = true;
                inputs.forEach(input => {
                    if (!input.checkValidity()) {
                        input.classList.add('is-invalid');
                        valid = false;
                    } else {
                        input.classList.remove('is-invalid');
                    }
                });
                return valid;
            }

            function populateReview() {

                reviewList.innerHTML = `
                <li><strong>Nome prodotto:</strong> ${document.getElementById('name').value}</li>
                <li><strong>Descrizione:</strong> ${document.getElementById('description').value}</li>
                <li><strong>Numero di telefono:</strong> ${document.getElementById('phone').value}</li>
                <li><strong>Indirizzo:</strong> ${document.getElementById('address').value}</li>
                <li><strong>Numero P.IVA:</strong> ${document.getElementById('PIVA').value}</li>
                <li><strong>Immagine ristorante:</strong> ${document.getElementById('image_path').value.split('\\').pop()}</li>

            `;
            }
        });
    </script>


    <style>
        .form-step {
            display: none;
        }

        .form-step.active {
            display: block;
        }

        .form-control:focus {
            border-color: green;
            box-shadow: none
        }

        input[type="checkbox"]:checked {
            background-color: green;
            border-color: green;
        }
    </style>
</body>