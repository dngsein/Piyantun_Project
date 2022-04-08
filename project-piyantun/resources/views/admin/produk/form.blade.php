@extends('admin.layout')

@section('content')
    
@php
    $formTitle = !empty($products) ? 'Update' : 'New'    
@endphp

<div class="content">
    <div class="row">
        <!-- <div class="col-lg-3">
            
        </div> -->
        <div class="col-lg-12">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                        <h2>{{ $formTitle }} Product</h2>
                </div>

                <div class="card-body">
                        @include('admin.partials.flash', ['$errors' => $errors])
                            @if (!empty($products))
                                {!! Form::model($products, ['url' => ['produk', $products->id], 'method' => 'PUT']) !!}
                                {!! Form::hidden('id') !!}
                            @else
                                {!! Form::open(['url' => 'produk']) !!}
                            @endif


                        <div class="form-group">
                            {!! Form::label('nama', 'Nama') !!}
                            {!! Form::text('nama', null, ['class' => 'form-control', 'placeholder' => 'nama']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('berat', 'Berat') !!}
                            {!! Form::text('berat', null, ['class' => 'form-control', 'placeholder' => 'berat']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('harga', 'Harga') !!}
                            {!! Form::text('harga', null, ['class' => 'form-control', 'placeholder' => 'harga']) !!}
                        </div>                
                        <div class="form-group">
                            {!! Form::label('stok', 'Stok') !!}
                            {!! Form::text('stok', null, ['class' => 'form-control', 'placeholder' => 'stok']) !!}
                        </div>                

                            <div class="form-group">
                                {!! Form::label('detail', 'Detail') !!}
                                {!! Form::textarea('detail', null, ['class' => 'form-control', 'placeholder' => 'deskripsi singkat']) !!}
                            </div>
                      
                        <div class="form-footer pt-5 border-top">
                            <button type="submit" class="btn btn-primary btn-default">Save</button>
                            <a href="{{ url('produk') }}" class="btn btn-secondary btn-default">Back</a>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>  
        </div>
    </div>
</div>
@endsection
