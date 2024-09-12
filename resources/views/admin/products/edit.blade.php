@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Modifica il prodotto</div>

                    <div class="card-body">
                        <form id="updateProductForm" method="POST" action="{{ route('admin.products.update', $product->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <!-- Step 1: Product Name -->
                            <div class="form-step active">
                                <div class="form-group mb-3">
                                    <label for="name">Nome del prodotto</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        id="name" name="name" value="{{ old('name', $product->name) }}" required>
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
                                        rows="3">{{ old('ingredients', $product->ingredients) }}</textarea>
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
                                        id="price" name="price" value="{{ old('price', $product->price) }}"
                                        step="0.01" required>
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
                                        id="visible" name="visible"
                                        {{ old('visible', $product->visible) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="visible">Prodotto disponibile</label>
                                    @error('visible')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>

                            <!-- Step 5: Type -->
                            <div class="form-group mb-3">
                                <label for="type">Tipologia del prodotto: </label>
                                <div class="btn-group btn-group-toggle " data-toggle="buttons">
                                    <label
                                        class="btn btn-outline-danger {{ old('type', $product->type) == 'Food' ? 'active' : '' }}">
                                        <input type="radio" name="type" value="Food"
                                            @error('type') is-invalid @enderror"
                                            {{ old('type', $product->type) == 'Food' ? 'checked' : '' }}> Food
                                    </label>
                                    <label
                                        class="btn btn-outline-warning {{ old('type', $product->type) == 'Bibite' ? 'active' : '' }}">
                                        <input type="radio" name="type" value="Bibite"
                                            @error('type') is-invalid @enderror"
                                            {{ old('type', $product->type) == 'Bibite' ? 'checked' : '' }}> Bibite
                                    </label>
                                    <label
                                        class="btn btn-outline-dark {{ old('type', $product->type) == 'Bevande Alcoliche' ? 'active' : '' }}">
                                        <input type="radio" name="type" value="Bevande Alcoliche"
                                            @error('type') is-invalid @enderror"
                                            {{ old('type', $product->type) == 'Bevande Alcoliche' ? 'checked' : '' }}>
                                        Bevande Alcoliche
                                    </label>
                                    <label
                                        class="btn btn-outline-success {{ old('type', $product->type) == 'Dessert' ? 'active' : '' }}">
                                        <input type="radio" name="type" value="Dessert"
                                            @error('type') is-invalid @enderror"
                                            {{ old('type', $product->type) == 'Dessert' ? 'checked' : '' }}> Dessert
                                    </label>
                                </div>
                                <p id="error_radio" class="bg-danger text-white rounded m-0 px-1">
                                    <strong></strong>
                                </p>
                                @error('type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Step 6: Image Upload -->
                            <div class="form-step">
                                <div class="form-group mb-3">
                                    <label for="image_path">Immagine del prodotto</label>
                                    <input type="file"
                                        class="form-control-file @error('image_path') is-invalid @enderror" id="image_path"
                                        name="image_path" accept="image/*">
                                    <small class="form-text text-muted">Immagine attuale:
                                        {{ basename($product->image_path) }}</small>
                                    @error('image_path')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                            </div>

                            <!-- Step 7: Review & Submit -->
                            <button type="submit" class="btn btn-success">Aggiorna il prodotto</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @vite(['resources/js/edit_product.js'])


    <style scoped>

        *{
            font-family: "Alice", serif;
        }
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
