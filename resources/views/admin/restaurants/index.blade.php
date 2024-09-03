@extends('layouts.admin')
@section('style')
@vite('resources/scss/restaurantIndex.scss')
@endsection

{{-- {{$restaurant->name}} --}}
@section('content')
<div class="wrapper py-4">
    <div class="card w-75 h-75">
        <div class="card-header text-center">
            <h3 class="card-title">Riepilogo Ristorante {{$restaurant->name}}</h3>
        </div>

        <div class="row card-body h-25 my_cardBody py-4 m-0 text-white rounded-bottom">
            <figure class="col-10 col-sm-6 d-flex justify-content-center my_cardImgBox">
                @if (Str::startsWith($restaurant->image_path, 'http'))
                        <img src="{{$restaurant->image_path}}" class="img-fluid my_cardimg">
                        @else
                        <img src="{{ asset('storage/' . $restaurant->image_path) }}" class="img-fluid my_cardimg">
                @endif
            </figure>
            <div class="col-10 col-sm-6 h-100 my_cardInfo">
                <p class="my_cardStandardField">Nome: {{$restaurant->name}}</p>
                <p class="my_cardStandardField">Indirizzo del ristorante: {{$restaurant->address}}</p>
                <p class="my_cardStandardField">Numero di telefono: {{$restaurant->phone}}</p>
                <p class="my_cardStandardField">Numero P.IVA: {{$restaurant->PIVA}}</p>
                <p class="my_cardDescription">Descrizione: {{$restaurant->description}}</p>
            </div>
        </div>
    </div>
</div>
    

@endsection