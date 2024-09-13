@extends('layouts.admin')
@section('style')
    @vite('resources/scss/productIndex.scss')
@endsection

@section('content')
    <div style="max-width: 1400px" class="mx-auto container">
        <h1 class="text-center">LISTA ORDINI</h1>
        <p class="ps-2">Totale ordini: {{ count($totalOrders) }}</p>



        <div class="table-responsive rounded">
            <table class="table table-success text-center align-middle mb-0">

                <thead>
                    <tr>
                        <th scope="col">CLIENTE</th>
                        <th scope="col">PREZZO TOTALE</th>
                        <th scope="col">DATA</th>
                        <th scope="col">INFO</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($orders as $singleOrder)
                        <tr>
                            <td>{{ $singleOrder->name }}</td>
                            <td>{{ $singleOrder->total_price }}€</td>
                            <td>{{ $singleOrder->created_at }}</td>



                            <td>
                                <button type="button" class="btn btn-info text-white" data-bs-toggle="modal"
                                    data-bs-target="#modal1-{{ $singleOrder->id }}">
                                    <i class="fa-solid fa-circle-info"></i>
                                </button>

                        </tr>

                        <!-- Modale delete -->
                        <div class="modal fade" id="modal-{{ $singleOrder->id }}" tabindex="-1" data-bs-backdrop="static"
                            data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitle-{{ $singleOrder->id }}"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalTitle-{{ $singleOrder->id }}">
                                            Eliminare l'ordine n*{{ $singleOrder->id }} ?
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
                                        <form action="{{ route('admin.orders.destroy', $singleOrder) }}" method="post"
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

                        {{-- Modale info --}}
                        <div class="modal fade" id="modal1-{{ $singleOrder->id }}" tabindex="-1" data-bs-backdrop="static"
                            data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitle-{{ $singleOrder->id }}"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
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
                                            </span><span>{{ $singleOrder->total_price }}</span></p>
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
            {{ $orders->links('pagination::bootstrap-4') }}
        </div>

    </div>



@endsection
