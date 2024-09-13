@extends('layouts.admin')

@section('content')
    <div class="container-fluid">
        <h1 class="text-center">Statistiche del tuo ristorante</h1>
        @if ($existData === true)
            <div>
                <canvas id="myChart"></canvas>
            </div>
            <h5>Guadagno totale -> € {{ $totalIncome }}</h5>
        @else
            <h5>Non ci sono statistiche da mostrare</h5>
        @endif
    </div>


    @if ($existData)
        <script>
            const mesiNome = {!! json_encode($mesiNome) !!};
            const revenueByMonth = {!! json_encode($revenueByMonth) !!};

            const ctx = document.getElementById('myChart');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: mesiNome,
                    datasets: [{
                        label: 'Guadagno per mese',
                        data: revenueByMonth,
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>
    @endif
@endsection
