@extends('layouts.admin')

@section('content')
    <div class="m-0 row h-100 overflow-y-auto">
        <h1 class="col-12 text-center fs-3">Statistiche del tuo ristorante</h1>

        @if ($existData === true)
            <form method="GET" action="{{ route('admin.stats.index') }}">
                <div class="m-0 col-12 form-group">
                    <label for="year">Seleziona l'anno:</label>
                    <select name="year" id="year" class="form-control" onchange="this.form.submit()">
                        @foreach ($years as $year)
                            <option value="{{ $year }}" {{ $year == $selectedYear ? 'selected' : '' }}>
                                {{ $year }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </form>
            <!-- ordini -->
            <div class="m-0 col-12 col-md-6">
                <p class="fs-6 text-center">Guadagno totale nel {{ $selectedYear }} -> € {{ $totalIncome }}</p>
                <canvas id="myChart"></canvas>
            </div>
            <!-- prodotti -->
            <div class="m-0 pb-3 col-12 col-md-6">
                <p class="fs-6 m-0 text-center">Statistiche dei prodotti venduti</p>
                <canvas class="pb-5" id="productChart"></canvas>
            </div>
        @else
            <h5>Non ci sono statistiche da mostrare</h5>
        @endif
    </div>

    @if ($existData)
        <script>
            // ordini
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

            // prodotti
            const productNames = {!! json_encode($productNames) !!};
            const productQuantities = {!! json_encode($productQuantities) !!};

            function generateRandomColors(numColors) {
                const colors = [];
                for (let i = 0; i < numColors; i++) {
                    const color =
                        `rgba(${Math.floor(Math.random() * 255)}, ${Math.floor(Math.random() * 255)}, ${Math.floor(Math.random() * 255)}, 0.7)`;
                    colors.push(color);
                }
                return colors;
            }

            const productColors = generateRandomColors(productNames.length);

            const productCtx = document.getElementById('productChart');
            new Chart(productCtx, {
                type: 'doughnut',
                data: {
                    labels: productNames,
                    datasets: [{
                        label: 'Quantità ordinate per prodotto',
                        data: productQuantities,
                        backgroundColor: productColors,
                        borderColor: '#fff',
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    let label = context.label || '';
                                    if (label) {
                                        label += ': ';
                                    }
                                    label += context.raw;
                                    return label;
                                }
                            }
                        }
                    }
                }
            });
        </script>
    @endif
@endsection
