@extends('admin.layout')

@section('content')


<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="container">
                <div class="card">
                    <div class="card-header text-dark bg-white">
                        <h3>Produk</h3>
                    </div>
                    <div class="card-body">
                    @include('admin.partials.flash')
                    <div class="table-responsive">
                    <table class="table">
                    <thead class="table-primary">
                            <th>No</th>
                            <th>Nama</th>
                            <th>Berat</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Detail</th>
                            
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @forelse ($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->nama }}</td>
                                    <td>{{ $product->berat }}</td>
                                    <td>{{ $product->harga }}</td>
                                    <td>{{ $product->stok }}</td>
                                    <td>{{ $product->detail }}</td>
                                    
                                
                                    <td>
                                        <a href="{{ url('produk/'. $product->id .'/edit') }}" class="btn btn-warning btn-sm">Edit</a>

                                        {!! Form::open(['url' => 'produk/'.$product->id, 'class' => 'delete', 'style' => 'display:inline-block']) !!}
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
                                <a href="{{ url('produk/create') }}" class="btn btn-primary">Data Baru</a>
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


<!-- Tombol Remove -->
<!-- {!! Form::submit('remove', ['class' => 'btn btn-danger btn-sm']) !!}
{!! Form::close() !!} -->