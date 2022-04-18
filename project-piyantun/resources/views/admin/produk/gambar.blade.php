@extends('admin.layout')

@section('content')

<div class="content">
    <div class="row">

            @include('admin.produk.sideMenu')
        
        <div class="col-lg-9">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                        <h2>Gambar Produk</h2>
                </div>
                <div class="card-body">
                    @include('admin.partials.flash')
                    <table class="table table-bordered table-striped">
                        <thead>
                           
                            <th>Gambar</th>
                            <th>Waktu Upload</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @forelse ($productImages as $image)
                                <tr>    
                                
                                    <td><img src="{{ asset('storage/uploads/gambar_produk/'. $image->path) }}" alt="pic" style="width:100px"/></td>
                                    <td>{{ $image->created_at }}</td>
                                    <td>
                                        {!! Form::open(['url' => 'produk/gambar/'. $image->id, 'class' => 'delete', 'style' => 'display:inline-block']) !!}
                                        {!! Form::hidden('_method', 'DELETE') !!}
                                        {!! Form::submit('remove', ['class' => 'btn btn-danger btn-sm']) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">No records found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="card-footer text-right">
                    <a href="{{ url('produk/'.$productID.'/tambah-gambar') }}" class="btn btn-primary">Tambah Baru</a>
                </div>
            </div>  
        </div>
    </div>
</div>
@endsection