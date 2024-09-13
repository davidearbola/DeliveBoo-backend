@extends('layouts.admin')
@section('style')
    @vite('resources/scss/productIndex.scss')
@endsection

@section('content')
    <div class="wrapper p-4 vh-100">
        <div style="max-width: 1400px" class="mx-auto container">
            <h1 class="text-center my-4">TOTALE ORDINI : {{ count($totalOrders) }}</h1>



            <div class="table-responsive rounded">
                <table class="table table-success text-center align-middle mb-0">

                    <thead>
                        <tr>
                            <th class="lefty" scope="col">CLIENTE</th>
                            <th scope="col">PREZZO TOTALE</th>
                            <th scope="col">DATA</th>
                            <th scope="col">INFO</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($orders as $singleOrder)
                            <tr>
                                <td class="lefty">{{ $singleOrder->name }}</td>
                                <td>{{ $singleOrder->total_price }}€</td>
                                <td>{{ $singleOrder->created_at->format('d/m/Y H:i') }}</td>



                                <td>
                                    <button type="button" class="btn btn-info text-white" data-bs-toggle="modal"
                                        data-bs-target="#modal1-{{ $singleOrder->id }}">
                                        <i class="fa-solid fa-circle-info"></i>
                                    </button>

                            </tr>

                            {{-- Modale info --}}
                            <div class="modal fade" id="modal1-{{ $singleOrder->id }}" tabindex="-1"
                                data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                aria-labelledby="modalTitle-{{ $singleOrder->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-md"
                                    role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalTitle-{{ $singleOrder->id }}">
                                                Comanda per ordine n*{{ $singleOrder->id }}
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>

                                        <div class="modal-body">
                                            <p class="m-0"><span class="fw-bold">Nome cliente :
                                                </span><span>{{ $singleOrder->name }}</span></p>
                                            <p class="m-0"><span class="fw-bold">Telefono cliente :
                                                </span><span>{{ $singleOrder->phone }}</span></p>
                                            <p class="mb-3"><span class="fw-bold">Indirizzo cliente :
                                                </span><span>{{ $singleOrder->address }}</span></p>
                                            @foreach ($singleOrder->products as $product)
                                                <p class="m-0">- {{ $product->pivot->name }} x
                                                    {{ $product->pivot->quantity }}</p>
                                            @endforeach
                                            <p class="mt-3"><span class="fw-bold">Totale pagato :
                                                </span><span>{{ $singleOrder->total_price }}€</span></p>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                Chiudi
                                            </button>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        @empty
                            <tr>
                                <td scope="row" colspan="8">Non ci sono ordini da visualizzare</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-center p-3">
                {{ $orders->links('pagination::bootstrap-4', ['class' => 'mobile-pagination']) }}
            </div>

        </div>
    </div>

    <style>
        .lefty {
            text-align: start;
            padding: 1rem 0;
            padding-left: 2rem !important;
        }

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

            .mobile-pagination {
                width: 100% !important;
                flex-wrap: wrap !important;
                justify-content: center !important;
                overflow-x: scroll;
            }

            .mobile-pagination li {
                flex: 1 !important;
            }
        }
    </style>


@endsection
