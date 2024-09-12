@extends('layouts.admin')

@section('style')
    @vite('')
@endsection

@section('content')
    
<div>
    <canvas id="myChart"></canvas>
</div>
  
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  
<script>
    const ctx = document.getElementById('myChart');
    const months = {!! json_encode($mesiNumero) !!}; // Convert the $mesi array to a JavaScript array

    const mesiNome = [];
    months.forEach(element => {
      if(element == '01'){
        mesiNome.push('Gennaio');
        }
        else if(element == '02'){
            mesiNome.push('Febbraio');
        }
        else if(element == '03'){
            mesiNome.push('Marzo');
        }
        else if(element == '04'){
            mesiNome.push('Aprile');
        }
        else if(element == '05'){
            mesiNome.push('Maggio');
        }
        else if(element == '06'){
            mesiNome.push('Giugno');
        }
        else if(element == '07'){
            mesiNome.push('Luglio');
        }
        else if(element == '08'){
            mesiNome.push('Agosto'); 
        }
        else if(element == '09'){
            mesiNome.push('Settembre');
        }
        else if(element == '10'){
            mesiNome.push('Ottobre');
        }
        else if(element == '11'){
            mesiNome.push('Novembre');
        }
        else if(element == '12'){
            mesiNome.push('Dicembre');
        }
    });

    const revenueByMonth = {!! json_encode($revenueByMonth) !!}; // Pass the $revenueByMonth array to the view
    
    

    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: mesiNome, // Use the months array as the labels
        datasets: [{
          label: 'Guadagno per mese',
          data: [revenueByMonth], // Use the revenueByMonth array as the data
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