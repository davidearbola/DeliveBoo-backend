@extends('layouts.admin')

@section('content')
    <div class="container box pb-3">
        <h1 class="text-center display-4 fw-bold mt-4 pt-4 text-danger">INFO PIATTO</h1>

        <div class="row mx-0 justify-content-center">
            <div class="col-12 px-0 ">
                <div class="row mx-0 my-3 justify-content-center">

                    {{-- IMAGE --}}
                    <div class="col-5 my-4 px-3">

                        <div class="card imgBox border-3 border-white">
                            @if (Str::startsWith($product->image_path, 'http'))
                            <img src="{{ $product->image_path }}" class="card-img object-fit-fill">
                            @else
                            <img src="{{ asset('storage/' . $product->image_path) }}" class="card-img object-fit-fill">
                            @endif                       
                        </div>


                    </div>

                    {{-- INFO LIST --}}
                    <div class="col-5 my-4 px-4 align-content-center">

                        <div><span class="text-danger fw-bold">NOME : </span> {{ $product->name }}</div>
                        @if ($product->type == 'Food' || $product->type == 'Dessert')
                            <div><span class="text-danger fw-bold">INGREDIENTI : </span>{{ $product->ingredients }}</div>
                        @endif
                        <div><span class="text-danger fw-bold">TIPO : </span>{{ $product->type }}</div>
                        <div><span class="text-danger fw-bold">PREZZO : </span>{{ $product->price }} €</div>
                        <div>
                            <span class="text-danger fw-bold">VISIBILE : </span>
                            @if ($product->visible == 1)
                                SI
                            @else
                                NO
                            @endif
                        </div>

                    </div>

                    {{-- BUTTONS --}}
                    <div class="col-5 text-center mt-2">

                        <a class="text-decoration-none" href="{{ route('admin.products.index') }}">
                            <button class="btn fw-bold bg-danger border-2 border-white mx-2">

                                <i class="fa-solid fa-list-ul"></i> LISTA PIATTI

                            </button>
                        </a>

                        <a class="text-decoration-none" href="{{ route('admin.products.edit', $product->id) }}">
                            <button class="btn fw-bold bg-warning px-3 border-2 border-white mx-2">

                                <i class="fa-solid fa-pen-to-square"></i> MODIFICA

                            </button>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <style>

        *{
            font-family: "Alice", serif;
        }
        .box {
            background-color: #fbab7e;
            background-image: linear-gradient(90deg, #fbab7e 0%, #f7ce68 50%, #fbab7e 100%);
            border-radius: 15px;
            color: white;
        }

        .imgBox {
            transition: transform 0.4s ease-in-out;
        }

        .imgBox:hover {
            transform: scale(1.1);
        }

        a {
            color: black;
        }

        a:hover {
            cursor: pointer;
            color: white;
        }
    </style>
@endsection
