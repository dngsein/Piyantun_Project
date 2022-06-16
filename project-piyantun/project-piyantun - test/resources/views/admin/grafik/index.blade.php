@extends ('admin.layout')
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <div class="content container">

        <div class="row mb-4">
        
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header text-dark bg-white">
                    <h3>Penjualan Tahun {{date('Y')}}</h3>
                </div>
                <div class="card-body p-2">
                    <canvas id="chart_jual">Your browser does not support the canvas element.</canvas>
                </div>
            </div>
        </div>
        
        <br>
        <br>
        
        <div class="col-md-12">
            <div class="card">
                <div class="card-header card-header text-dark bg-white">
                    <h3>Rating</h3>
                </div>
                <div class="card-body p-2">
                    <canvas id="chart_rating">Your browser does not support the canvas element.</canvas>
                </div>
            </div>
        </div>
        <div>
            </div>
            
            </div>
            @stop
            @push('js')
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.70/jquery.blockUI.min.js" integrity="sha512-eYSzo+20ajZMRsjxB6L7eyqo5kuXuS2+wEbbOkpaur+sA2shQameiJiWEzCIDwJqaB0a4a6tCuEvCOBHUg3Skg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.8.0/dist/chart.min.js"></script>
    <script>
        
        const ctx = document.getElementById('chart_rating').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Ratting 1','Ratting 2','Ratting 3','Ratting 4','Ratting 5',],
                datasets: [{
                    label: 'Rasa',
                    data: {!!json_encode($rate_rasa)!!},
                    backgroundColor: [ 'rgba(255, 99, 132, 0.2)'],
                    borderColor: [ 'rgba(255, 99, 132, 1)'],
                    borderWidth: 1
                },{
                    label: 'Manfaat',
                    data: {!!json_encode($rate_manfaat)!!},
                    backgroundColor: [ 'rgba(2, 255, 132, 0.2)'],
                    borderColor: [ 'rgba(2, 255, 132, 1)'],
                    borderWidth: 1
                }]
            },
            options: {
                scales: { y: {ticks: { precision: 0 }}},
            }
        });

        const ctx2 = document.getElementById('chart_jual').getContext('2d');
        const myChart2 = new Chart(ctx2, {
            type: 'bar',
            data: {
                labels: ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'],
                datasets: [{
                    label: 'Penjualan',
                    data: {!!json_encode($chart_jual)!!},
                    backgroundColor: [ 'rgba(55, 99, 255, 0.2)'],
                    borderColor: [ 'rgba(55, 25, 255, 1)'],
                    borderWidth: 1
                }]
            },
            options: {
                scales: { y: {ticks: { precision: 0 }} },
            }
        });
    </script>
@endpush
