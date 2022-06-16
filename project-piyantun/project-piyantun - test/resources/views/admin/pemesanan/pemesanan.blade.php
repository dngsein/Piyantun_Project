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
                            @forelse ($pesanan as $pesanans)

                                @php
                                    $sts = [
                                            'belum dibayar' => '<span class="badge badge-warning">Belum Dibayar</span>',
                                            'dibayar' => '<span class="badge badge-primary">Dibayar</span>',
                                            'diterima' => '<span class="badge badge-success">Diterima</span>',
                                            'dibatalkan' => '<span class="badge badge-danger">Dibatalkan</span>'
                                        ];
                                @endphp

                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $pesanans->user->name }}</td>
                                    <td>{{ $pesanans->tanggal_pemesanan }}</td>
                                    <td>Rp. {{ number_format($pesanans->jumlah_harga) }}</td>
                                    <td>{!! $sts[$pesanans->status_pemesanan] !!}</td>
                                    
                                
                                    <td>
                                        @if ($pesanans->status_pemesanan!='dibatalkan')
                                        <a href="{{ url('dokumentasi/pemesanan/'. $pesanans->id .'/edit') }}" class="btn btn-warning btn-sm">Edit Pesanan</a>
                                        @endif
                                    </td>

                                </tr>
                            @empty
                            <tr>
                                <td colspan="5">No Record Found</td>
                            </tr>
                            @endforelse
                        </tbody>
                        
                    </table>
                    {{ $pesanan->links() }}
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection