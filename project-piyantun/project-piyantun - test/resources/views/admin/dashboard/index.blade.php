@extends ('admin.layout')
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <div class="content container">

        <div class="row mb-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header card-header text-dark bg-white">
                        <h4>Grafik Rating</h4>
                    </div>
                    <div class="card-body p-2">
                        <canvas id="chart_rating">Your browser does not support the canvas element.</canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header card-header text-dark bg-white">
                        <h4>Grafik Penjualan Tahun {{date('Y')}}</h4>
                    </div>
                    <div class="card-body p-2">
                        <canvas id="chart_jual">Your browser does not support the canvas element.</canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header card-header text-dark bg-white">
                <div class="row">
                    <div class="col-sm-6"><h4 class="mt-2">Data Segmentasi</h4></div>
                    <div class="col-sm-6">
                        <select id="slc_umur" class="form-control">
                            <option value="1">Umur Kurang dari 20 Tahun</option>
                            <option value="2">Umur 20 - 30 Tahun</option>
                            <option value="3">Umur diatas 30 Tahun</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="card-body p-0" id="card_segmentasi">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Nama Pelanggan</th>
                            <th>Rating Rasa</th>
                            <th>Rating Manfaat</th>
                            <th>Ulasan</th>
                        </tr>
                    </thead>
                    <tbody id="data_segmentasi">
                        <tr><td colspan="4" align="center"><i>-- Data Kosong --</i></td></tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="4" class="text-center">
                                <button type="button" id="btn_prev_segmentasi" class="btn btn-sm btn-primary"><i class="fa fa-arrow-left"></i> Previous</button>
                                <button type="button" id="btn_next_segmentasi" class="btn btn-sm btn-primary">Next <i class="fa fa-arrow-right"></i></button>
                            </th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>

    </div>
@stop
@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.blockUI/2.70/jquery.blockUI.min.js" integrity="sha512-eYSzo+20ajZMRsjxB6L7eyqo5kuXuS2+wEbbOkpaur+sA2shQameiJiWEzCIDwJqaB0a4a6tCuEvCOBHUg3Skg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.8.0/dist/chart.min.js"></script>
    <script>
        block = (t)=>{$(t).block({message:'Mohon Tunggu'});}
        unblock = (t)=>{$(t).unblock();}
        $('#slc_umur').on('change', ()=>{ cPage=1; getDataSegementasi(); });
        $('#btn_next_segmentasi').on('click', ()=>{ cPage++; getDataSegementasi(); });
        $('#btn_prev_segmentasi').on('click', ()=>{ cPage--; getDataSegementasi(); });
        var cPage=1;
        function getDataSegementasi(){
            $.ajax({
                url: '{{route("dashboard.segmentasi")}}',data:{page:cPage, type:$('#slc_umur').val()}, type: 'GET',dataType: 'JSON',
                beforeSend:()=>{block('#card_segmentasi');},
                complete:()=>{unblock('#card_segmentasi');},
                success: (r)=>{
                    var trtd = "";
                    if(r.data.length>0){
                        r.data.forEach((d,i)=>{
                            trtd+='<tr>';
                            trtd+='<td>'+d.nama_pelanggan+'</td>';
                            trtd+='<td>'+d.rating_rasa+'</td>';
                            trtd+='<td>'+d.rating_manfaat+'</td>';
                            trtd+='<td>'+d.ulasan+'</td>';
                            trtd+='</td>';
                        });
                    }else{
                        trtd+='<tr><td colspan="4" align="center"><i>-- Data Kosong --</i></td></tr>';
                    }
                    $('#data_segmentasi').html(trtd);

                    cPage = r.current_page??1;
                    $('#btn_next_segmentasi').prop('disabled',r.next_page_url==null);
                    $('#btn_prev_segmentasi').prop('disabled',r.prev_page_url==null);
                }
            });
        }
        getDataSegementasi();

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
