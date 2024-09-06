@extends('layouts.admin')

@section('content')
    <h1 id="prova"></h1>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Aggiungi un prodotto al tuo ristorante</div>

                    <div class="card-body">
                        <form id="updateProductForm" method="POST" action="{{ route('admin.products.store') }}"
                            enctype="multipart/form-data">
                            @csrf

                            <!-- Step 1: Product Name -->
                            <div class="form-step active">
                                <div class="form-group mb-3">
                                    <label for="name">Nome del prodotto</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="name" name="name" value="{{ old('name') }}" required>
                                    <p id="error_name" class="bg-danger text-white rounded m-0 px-1">
                                        <strong></strong>
                                    </p>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <!-- Step 2: Ingredients -->
                            <div class="form-step">
                                <div class="form-group mb-3">
                                    <label for="ingredients">Ingredienti</label>
                                    <textarea class="form-control @error('ingredients') is-invalid @enderror" id="ingredients" name="ingredients"
                                        rows="3">{{ old('ingredients') }}</textarea>
                                    <p id="error_ingredients" class="bg-danger text-white rounded m-0 px-1">
                                        <strong></strong>
                                    </p>
                                    @error('ingredients')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <!-- Step 3: Price -->
                            <div class="form-step">
                                <div class="form-group mb-3">
                                    <label for="price">Prezzo</label>
                                    <input type="number" class="form-control @error('price') is-invalid @enderror"
                                        id="price" name="price" value="{{ old('price') }}" step="0.01" required>
                                    <p id="error_price" class="bg-danger text-white rounded m-0 px-1">
                                        <strong></strong>
                                    </p>
                                    @error('price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <!-- Step 4: Visibility -->
                            <div class="form-step">
                                <div class="form-group mb-3 form-check">
                                    <input type="checkbox" class="form-check-input @error('visible') is-invalid @enderror"
                                        id="visible" name="visible" {{ old('visible') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="visible">Prodotto disponibile</label>
                                    @error('visible')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Step 5: Type -->
                            <div class="form-step">
                                <div class="form-group mb-3">
                                    <label for="type">Tipologia del prodotto</label>
                                    <select class="form-control @error('type') is-invalid @enderror" id="type"
                                        name="type" required>
                                        <option value="" disabled {{ old('type') ? '' : 'selected' }}>
                                            Seleziona tipologia</option>
                                        <option value="Food" {{ old('type') == 'Food' ? 'selected' : '' }}>Food</option>
                                        <option value="Bibite" {{ old('type') == 'Bibite' ? 'selected' : '' }}>Bibite
                                        </option>
                                        <option value="Bevande Alcoliche"
                                            {{ old('type') == 'Bevande Alcoliche' ? 'selected' : '' }}>
                                            Bevande Alcoliche</option>
                                        <option value="Dessert" {{ old('type') == 'Dessert' ? 'selected' : '' }}>Dessert
                                        </option>
                                    </select>
                                    @error('type')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>

                            <!-- Step 6: Image Upload -->
                            <div class="form-step">
                                <div class="form-group mb-3">
                                    <label for="image_path">Immagine del prodotto</label>
                                    <input type="file"
                                        class="form-control-file @error('image_path') is-invalid @enderror" id="image_path"
                                        name="image_path">
                                    @error('image_path')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <!-- Step 7: Submit -->
                            <button type="submit" class="btn btn-success">Crea prodotto</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @vite(['resources/js/create_product.js'])

    <style scoped>
        .form-step.active {
            /* display: block; */
        }

        .form-control:focus {
            border-color: green;
            box-shadow: none;
        }

        input[type="checkbox"]:checked {
            background-color: green;
            border-color: green;
        }
    </style>
@endsection
