<!-- <h1>INI KATALOG</h1> -->


@extends('admin.dashboard.index')

@section('content')



<div class="content">
        <div class='row'>
            <div class="col-lg-12">
                <div class="card card-default">
                    <div class="card-header card-header-border-bottom">
                        <h3>products</h3>
                        <div>
                            <div class="card-body">
                                @include('admin.partials.flash');
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Berat</th>
                                        <th>Harga</th>
                                        <th>Stok</th>
                                        <th>Detail</th>
                                        <th>Action</th>
                                    </thead>
                                    <body>
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
                                                    {!! Form::submit('remove', ['class' => 'btn btn-danger btn-sm']) !!}
                                                    {!! Form::close() !!}
                                                </td>
                                            </tr>
                                        @empty
                                        <tr>
                                            <td colspan="5">No Record Found</td>
                                        </tr>
                                        @endforelse
                                    </body>
                            </table>
                            </div>
                            <div class="card-footer text-end">
                            
                                <a href="{{ url('produk/create') }}" class="btn btn-primary">Add New</a>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
</div>
@endsection