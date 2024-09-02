@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Aggiungi un nuovo prodotto al tuo ristorante</div>

                    <div class="card-body">
                        <form id="createProductForm" method="POST" action="{{ route('admin.products.store') }}"
                            enctype="multipart/form-data">
                            @csrf

                            <!-- Step 1: Product Name -->
                            <div class="form-step active">
                                <div class="form-group mb-3">
                                    <label for="name">Come si chiama il prodotto?</label>
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

                            <!-- Step 2: Ingredients -->
                            <div class="form-step">
                                <div class="form-group mb-3">
                                    <label for="ingredients">Aggiungi gli ingredienti</label>
                                    <textarea class="form-control @error('ingredients') is-invalid @enderror" id="ingredients" name="ingredients"
                                        rows="3">{{ old('ingredients') }}</textarea>
                                    @error('ingredients')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <button type="button" class="btn btn-secondary prev-btn">Indietro</button>
                                <button type="button" class="btn btn-success next-btn">Avanti</button>
                            </div>

                            <!-- Step 3: Price -->
                            <div class="form-step">
                                <div class="form-group mb-3">
                                    <label for="price">Quanto costa?</label>
                                    <input type="number" class="form-control @error('price') is-invalid @enderror"
                                        id="price" name="price" value="{{ old('price') }}" step="0.01" required>
                                    @error('price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <button type="button" class="btn btn-secondary prev-btn">Indietro</button>
                                <button type="button" class="btn btn-success next-btn">Avanti</button>
                            </div>

                            <!-- Step 4: Visibility -->
                            <div class="form-step">
                                <div class="form-group mb-3 form-check">
                                    <input type="checkbox" class="form-check-input @error('visible') is-invalid @enderror"
                                        id="visible" name="visible" {{ old('visible', true) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="visible">Il prodotto è disponibile?</label>
                                    @error('visible')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <button type="button" class="btn btn-secondary prev-btn">Indietro</button>
                                <button type="button" class="btn btn-success next-btn">Avanti</button>
                            </div>

                            <!-- Step 5: Type -->
                            <div class="form-step">
                                <div class="form-group mb-3">
                                    <label for="type">Seleziona la tipologia di prodotto tra quelle indicate</label>
                                    <select class="form-control @error('type') is-invalid @enderror" id="type"
                                        name="type" required>
                                        <option value="" disabled {{ old('type') ? '' : 'selected' }}>Seleziona
                                            tipologia
                                        </option>
                                        <option value="Food" {{ old('type') == 'Food' ? 'selected' : '' }}>Food</option>
                                        <option value="Bibite" {{ old('type') == 'Bibite' ? 'selected' : '' }}>Bibite
                                        </option>
                                        <option value="Bevande Alcoliche"
                                            {{ old('type') == 'Bevande Alcoliche' ? 'selected' : '' }}>Bevande Alcoliche
                                        </option>
                                        <option value="Dessert" {{ old('type') == 'Dessert' ? 'selected' : '' }}>Dessert
                                        </option>
                                    </select>
                                    @error('type')
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
                                    <label for="image_path">Aggiungi un immagine del prodotto</label>
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

                            <!-- Step 7: Review & Submit -->
                            <div class="form-step">
                                <h3>Riepilogo</h3>
                                <ul id="reviewList"></ul>
                                <button type="button" class="btn btn-secondary prev-btn">Indietro</button>
                                <button type="submit" class="btn btn-success">Crea il nuovo prodotto</button>
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
                const priceField = document.getElementById('price');
                let formattedPrice = parseFloat(priceField.value).toFixed(2);
                reviewList.innerHTML = `
                <li><strong>Nome prodotto:</strong> ${document.getElementById('name').value}</li>
                <li><strong>Ingredienti:</strong> ${document.getElementById('ingredients').value}</li>
                <li><strong>Price:</strong> ${formattedPrice}</li>
                <li><strong>Disponibilità:</strong> ${document.getElementById('visible').checked ? 'Yes' : 'No'}</li>
                <li><strong>Tipologia:</strong> ${document.getElementById('type').value}</li>
                <li><strong>Immagine prodotto:</strong> ${document.getElementById('image_path').value.split('\\').pop()}</li>
            `;
                priceField.value = formattedPrice;
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
@endsection
