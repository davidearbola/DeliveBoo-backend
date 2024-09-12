@extends('layouts.admin')

@section('style')
    @vite('resources/scss/restaurantIndex.scss')
@endsection

{{-- {{$restaurant->name}} --}}


@section('content')
    <div class="wrapper p-4 vh-100">

        {{-- <div class="row "> --}}

        <div class="col-12 col-lg-8 offset-lg-2 ">
            <div class="card">
                <h5 class="card-header text-center fs-3">Riepilogo Ristorante {{ $restaurant->name }}</h5>
                <div class="card-body my_cardBody">
                    <div class="row ">

                        <div class="col-8 offset-2 col-xl-6 offset-xl-0 ">
                            @if (Str::startsWith($restaurant->image_path, 'http'))
                                <img src="{{ $restaurant->image_path }}" class="img-fluid my_cardimg">
                            @else
                                <img src="{{ asset('storage/' . $restaurant->image_path) }}" class="img-fluid my_cardimg">
                            @endif
                        </div>

                        <div class="col-12 col-xl-6  text-white text-xl-start text-center">
                            <p class="my_cardStandardField">Nome: {{ $restaurant->name }}</p>
                            <p class="my_cardStandardField">Indirizzo del ristorante: {{ $restaurant->address }}</p>
                            <p class="my_cardStandardField">Numero di telefono: {{ $restaurant->phone }}</p>
                            <p class="my_cardStandardField">Numero P.IVA: {{ $restaurant->PIVA }}</p>
                            <p class="my_cardDescription">Descrizione: {{ $restaurant->description }}</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>

    <style>
        @media only screen and (min-width: 768px) and (max-width: 1200px) {
            .wrapper {
                height: 95vh;
                overflow: auto;
            }
        }

        @media only screen and (max-width: 767px) {
            .wrapper {
                height: 95vh;
                overflow: auto;
            }
        }
    </style>
@endsection
