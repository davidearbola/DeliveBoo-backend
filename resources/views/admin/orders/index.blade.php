@extends('layouts.admin')

@section('content')
@foreach ($orders as $order)
    {{$order->email}}
    @foreach($order->products as $product)
            {{ $product->pivot->name }} - Quantità: {{ $product->pivot->quantity }} - Prezzo: {{ $product->pivot->price }}
    @endforeach
    <br>
@endforeach

@endsection