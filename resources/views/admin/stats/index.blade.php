@extends('layouts.admin')



@section('content')
    <div>
        <canvas id="myChart"></canvas>
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
