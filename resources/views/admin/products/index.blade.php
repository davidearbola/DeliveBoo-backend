@extends('layouts.admin')
@section('style')
    @vite('resources/scss/productIndex.scss')
@endsection

@section('content')
    <div style="max-width: 1400px" class="mx-auto">

        <div class="row align-items-center justify-content-between pe-3 ">
            {{-- <p class="col-auto m-0">Totale prodotti: {{ count($total_products) }}</p> --}}
            <h1 class="col-auto my-4 text-center">TOTALE PRODOTTI : {{ count($total_products) }}</h1>
            <a class="col-auto btn btn-success" href="{{ route('admin.products.create') }}">Crea Prodotto</a>

        </div>


        <div class="table-responsive rounded-3">
            <table class="table table-success text-center align-middle mb-0">

                <thead>
                    <tr>
                        <th scope="col" class="hide-on-mobile" style="max-width:80px">IMMAGINE</th>
                        <th scope="col" class="text-center">NOME</th>
                        <th scope="col" class="hide-on-tablet">PREZZO</th>
                        <th scope="col" class="hide-on-mobile">DISPONIBILITA'</th>
                        <th scope="col">AZIONI</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($products as $singleProduct)
                        <tr>
                            <td class="hide-on-mobile" style="max-width:80px">
                                @if (Str::startsWith($singleProduct->image_path, 'http'))
                                    <img class="w-100" src="{{ $singleProduct->image_path }}"
                                        style="height: 90px; max-width:60px object-fit: contain;">
                                @else
                                    <img class="w-100" src="{{ asset('storage/' . $singleProduct->image_path) }}"
                                        style="height: 90px; max-width:60px object-fit: contain;">
                                @endif
                            </td>

                            <td class="text-center">{{ $singleProduct->name }}</td>

                            <td class="hide-on-tablet">{{ $singleProduct->price }}€</td>

                            <td class="hide-on-mobile">
                                @if ($singleProduct->visible == true)
                                    <span class="text-success">Disponibile</span>
                                @else
                                    <span class="text-danger">Non disponibile</span>
                                @endif
                            </td>

                            <td>
                                <button class="btn btn-warning me-2 text-white">
                                    <a href="{{ route('admin.products.edit', $singleProduct) }}" class="text-reset">
                                        <i class="fa-solid fa-pen"></i>
                                    </a>
                                </button>

                                <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                    data-bs-target="#modal-{{ $singleProduct->id }}">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </td>
                        </tr>

                        <!-- Modale -->
                        <div class="modal fade" id="modal-{{ $singleProduct->id }}" tabindex="-1" data-bs-backdrop="static"
                            data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitle-{{ $singleProduct->id }}"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md"
                                role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalTitle-{{ $singleProduct->id }}">
                                            Eliminare il prodotto {{ $singleProduct->name }} ?
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>

                                    <div class="modal-body">
                                        Attenzione, non puoi annullare questa operazione
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                            Chiudi
                                        </button>
                                        <form action="{{ route('admin.products.destroy', $singleProduct) }}" method="post"
                                            style="display:inline;">
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
                        <tr>
                            <td scope="row" colspan="8">Non ci sono prodotti da visualizzare</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="d-flex justify-content-center p-3">
            {{ $products->links('pagination::bootstrap-4') }}
        </div>

    </div>
@endsection
