@extends('admin.layout')

@section('content')


<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="container">
                <div class="card">
                    <div class="card-header text-dark bg-white">
                        <h3>Pemesanan</h3>
                    </div>
                    <div class="card-body">
                    @include('admin.partials.flash')
                    <div class="table-responsive">
                    <table class="table">
                    <thead class="table-primary">
                            <th>No</th>
                            <th>Pemesan</th>
                            <th>Tanggal</th>
                            <th>Total Pembayaran</th>                            
                            <th>Status</th>
                            
                            <th>Action</th>
                        </thead>
                        <tbody>

                        <?php $no = 1 ?>
                            @forelse ($pesanan as $pesanan)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $pesanan->user->name }}</td>
                                    <td>{{ $pesanan->tanggal_pemesanan }}</td>
                                    <td>Rp. {{ number_format($pesanan->jumlah_harga) }}</td>
                                    <td>{{ $pesanan->status_pemesanan }}</td>
                                    
                                
                                    <td>
                                        <a href="{{ url('pemesanan/'. $pesanan->id .'/edit') }}" class="btn btn-warning btn-sm">Edit Status</a>
                                   
                                    </td>

                                </tr>
                            @empty
                            <tr>
                                <td colspan="5">No Record Found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection