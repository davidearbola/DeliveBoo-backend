@extends('layouts.admin')
@section('style')
@vite('resources/scss/productIndex.scss')
@endsection

@section('content')
{{$restaurant->name}}
@endsection