@extends('layouts.admin')



@section('content')
<div class="container-fluid">
    <h1 class="text-center">Statistiche del tuo ristorante</h1>
    <div>
        <canvas id="myChart"></canvas>
    </div>

    <h5>Guadagno totale -> € {{$totalIncome}}</h5>
</div>


    <script>
        const ctx = document.getElementById('myChart');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($mesiNome) !!}, // Use the months array as the labels
                datasets: [{
                    label: 'Guadagno per mese',
                    data: {!! json_encode($revenueByMonth) !!}, // Use the revenueByMonth array as the data
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
@endsection
