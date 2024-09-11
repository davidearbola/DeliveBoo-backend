@extends('layouts.admin')
@section('style')
    @vite('')
@endsection

@section('content')
    
<div>
    <canvas id="myChart"></canvas>
    {{$totalPriceSett}}
  </div>
  
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  
  <script>



    const ctx = document.getElementById('myChart');
  
    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ['Gen', 'Feb', 'Mar', 'Apr', 'Mag', 'Giu', 'Lug','Ago','Set','Ott','Nov','Dic'],
        datasets: [{
          label: 'Statistiche Attività',
          data: [ {{$totalPriceSett}}],
          //creare array con tutti i total price di ogni mese e inserirlo qua
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