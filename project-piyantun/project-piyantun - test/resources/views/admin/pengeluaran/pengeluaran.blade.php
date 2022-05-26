@extends('admin.layout')

@section('content')


<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="container">
                <div class="card">
                    <div class="card-header text-dark bg-white">
                        <h3>Pengeluaran</h3>
                    </div>
                    <div class="card-body">
                    @include('admin.partials.flash')
                    <div class="table-responsive">
                    <table class="table">
                    <thead class="table-primary">
                            <th>No</th>
                            <th>Nama</th>
                            <th>Tanggal</th>
                            <th>Jumlah</th>                            
                            <th>Action</th>
                        </thead>
                        <tbody>

                        <?php $no = 1 ?>
                            @forelse ($pengeluaran as $pengeluaran)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{{ $pengeluaran->nama }}</td>
                                    <td>{{ $pengeluaran->tanggal }}</td>
                                    <td>Rp. {{ number_format($pengeluaran->jumlah) }}</td>
                                    
                                
                                    <td>
                                        <a href="{{ url('pengeluaran/'. $pengeluaran->id .'/edit') }}" class="btn btn-warning btn-sm">Edit</a>

                                        {!! Form::open(['url' => 'produk/'.$pengeluaran->id, 'class' => 'delete', 'style' => 'display:inline-block']) !!}
                                        {!! Form::hidden('_method', 'DELETE') !!}
                                   
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
                            <div class="card-footer bg-white text-right">
                                <a href="{{ url('pengeluaran/create') }}" class="btn btn-primary">Data Baru</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection