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
                                        {{ old('visible', $product->visible) ? true : false }}>
                                    <label class="form-check-label" for="visible">Prodotto disponibile</label>
                                    @error('visible')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>


                            {{-- ////////////////////////////////////////////////// --}}
                            {{-- <div class="form-step">
                                <div class="form-group mb-3 form-check">
                                    <input type="hidden" name="visible" value="0">
                                    <input type="checkbox" class="form-check-input @error('visible') is-invalid @enderror"
                                        id="visible" name="visible"
                                        value="1" {{ old('visible', $product->visible) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="visible">Prodotto disponibile</label>
                                    @error('visible')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div> --}}
                            {{-- ////////////////////////////////////////////////// --}}

                            <!-- Step 5: Type -->
                            <div class="form-step">
                                <div class="form-group mb-3">
                                    <label for="type">Tipologia del prodotto</label>
                                    <select class="form-control @error('type') is-invalid @enderror" id="type"
                                        name="type" required>
                                        <option value="" disabled {{ old('type', $product->type) ? '' : 'selected' }}>
                                            Seleziona tipologia</option>
                                        <option value="Food"
                                            {{ old('type', $product->type) == 'Food' ? 'selected' : '' }}>Food</option>
                                        <option value="Bibite"
                                            {{ old('type', $product->type) == 'Bibite' ? 'selected' : '' }}>Bibite</option>
                                        <option value="Bevande Alcoliche"
                                            {{ old('type', $product->type) == 'Bevande Alcoliche' ? 'selected' : '' }}>
                                            Bevande Alcoliche</option>
                                        <option value="Dessert"
                                            {{ old('type', $product->type) == 'Dessert' ? 'selected' : '' }}>Dessert
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
                                    <label for="image">Immagine del prodotto</label>
                                    <input type="file" class="form-control-file @error('image') is-invalid @enderror"
                                        id="image" name="image">
                                    <small class="form-text text-muted">Immagine attuale:
                                        {{ basename($product->image_path) }}</small>
                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                            </div>

                            <!-- Step 7: Review & Submit -->
                            <div class="form-step">
                                <h3>Riepilogo</h3>
                                <ul id="reviewList"></ul>
                                <button type="button" class="btn btn-secondary prev-btn">Indietro</button>
                                <button type="submit" class="btn btn-success">Aggiorna il prodotto</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function() {

            const reviewList = document.getElementById('reviewList');


            function populateReview() {
                const priceField = document.getElementById('price');
                let formattedPrice = parseFloat(priceField.value).toFixed(2);
                reviewList.innerHTML = `
                  <li><strong>Nome prodotto:</strong> ${document.getElementById('name').value}</li>
                  <li><strong>Ingredienti:</strong> ${document.getElementById('ingredients').value}</li>
                  <li><strong>Prezzo:</strong> ${formattedPrice}</li>
                  <li><strong>Disponibilità:</strong> ${document.getElementById('visible').checked ? 'Sì' : 'No'}</li>
                  <li><strong>Tipologia:</strong> ${document.getElementById('type').value}</li>
                  <li><strong>Immagine prodotto:</strong> ${document.getElementById('image').value ? document.getElementById('image').value.split('\\').pop() : 'Mantieni l\'immagine attuale'}</li>
            = `;
                priceField.value = formattedPrice;
            }
        });
    </script>

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
