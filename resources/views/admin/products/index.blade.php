@extends('layouts.admin')
@section('style')
@vite('resources/scss/productIndex.scss')
@endsection

@section('content')
    <h1 class="my-2 red">LISTA PRODOTTI</h1>

    <div class="table-responsive">
        <table class="table table-success text-center align-middle">
            <thead>
                <tr>
                    <th scope="col" class="text-start" style="width:10%">NOME</th>
                    <th scope="col" style="width:10%">TIPOLOGIA</th>
                    <th scope="col" style="width:10%">PREZZO</th>
                    <th scope="col" style="width:10%">IMMAGINE</th>
                    <th scope="col" style="width:10%">DISPONIBILITA'</th>
                    <th scope="col" style="width:15%">INFO</th>
                    <th scope="col" style="width:15%">MODIFICA</th>
                    <th scope="col" style="width:15%">ELIMINA</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($products as $singleProduct)
                <tr>
                    <td class="text-start">{{$singleProduct->name}}</td>
                    <td>{{$singleProduct->type}}</td>
                    <td>{{$singleProduct->price}}€</td>
                    <td>
                        @if (Str::startsWith($singleProduct->image_path, 'http'))
                        <img class="w-100" src="{{$singleProduct->image_path}}" style="max-height: 50px; object-fit: cover;">
                        @else
                        <img class="w-100" src="{{ asset('storage/' . $singleProduct->image_path) }}" style="max-height: 50px; object-fit: cover;">
                        @endif
                    </td>
                    <td>
                        @if($singleProduct->visible == true)
                        <span class="text-success">Disponibile</span>
                        @else
                        <span class="text-danger">Non disponibile</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.products.show', $singleProduct) }}">
                            <button class="btn btn-primary">Info</button>
                        </a>
                    </td>
                    <td>
                        <a href="{{ route('admin.products.edit', $singleProduct) }}">
                            <button class="btn btn-warning">Modifica</button>
                        </a>
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modal-{{ $singleProduct->id }}">
                            Elimina
                        </button>
                    </td>
                </tr>
    
                <!-- Modale -->
                <div class="modal fade" id="modal-{{ $singleProduct->id }}" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitle-{{ $singleProduct->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalTitle-{{ $singleProduct->id }}">
                                    Eliminare il prodotto {{$singleProduct->name}} ?
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
    
                            <div class="modal-body">
                             Attenzione, non puoi annullare questa operazione
                            </div>
    
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                    Chiudi
                                </button>
                                <form action="{{ route('admin.products.destroy', $singleProduct) }}" method="post" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        Conferma
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
    
                @empty
                <tr class="">
                    <td scope="row" colspan="8">Non ci sono prodotti da visualizzare</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    {{$products->links('pagination::bootstrap-4')}}
    

@endsection
