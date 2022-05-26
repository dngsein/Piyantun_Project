@extends('admin.layout')

@section('content')
    

<div class="content">
    <div class="row">
  
        <div class="col-lg-8 mx-auto">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                        <h2>Tambah Produk</h2>
                </div>

                <div class="card-body">
                        @include('admin.partials.flash', ['$errors' => $errors])
                            @if (!empty($products))
                                {!! Form::model($products, ['url' => ['produk', $products->id], 'method' => 'PUT']) !!}
                                {!! Form::hidden('id') !!}
                            @else
                                {!! Form::open(['url' => 'produk']) !!}
                            @endif

                        <!-- <div class="form-group mb-3">
                        <label class="label" for="nama">Nama</label>
                        <input id="nama" name="nama" type="text" class="form-control  @error('nama') is-invalid @enderror" value="{{ old('nama') }}" placeholder="Nama" autofocus required>
                            @error('nama')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
			      		</div> -->

                          <div class="form-group mb-3">
                        <label class="label" for="nama">Nama Produk</label>
                        <input id="nama" name="nama" type="text" class="form-control  @error('nama') is-invalid @enderror" value="{{ old('nama') }}" placeholder="Nama" autofocus required>
                            @error('nama')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
			      		</div>

                        <div class="form-group mb-3">
                        <label class="label" for="berat">Berat Produk</label>
                        <input id="berat" name="berat" type="text" class="form-control  @error('berat') is-invalid @enderror" value="{{ old('berat') }}" placeholder="Nama" required>
                            @error('berat')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
			      		</div>

                        <div class="form-group mb-3">
                        <label class="label" for="harga">Harga Produk</label>
                        <input id="harga" name="harga" type="text" class="form-control  @error('harga') is-invalid @enderror" value="{{ old('harga') }}" placeholder="Nama" required>
                            @error('harga')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
			      		</div>

                        <div class="form-group mb-3">
                        <label class="label" for="stok">Stok Produk</label>
                        <input id="stok" name="stok" type="text" class="form-control  @error('stok') is-invalid @enderror" value="{{ old('stok') }}" placeholder="Stok produk" required>
                            @error('stok')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
			      		</div>

                        <div class="form-group mb-3">
                        <label class="label" for="detail">Detail Produk</label>
                        <textarea rows="8" id="detail" name="detail" type="text" class="form-control  @error('detail') is-invalid @enderror" value="{{ old('detail') }}" placeholder="Deskripsi singkat" required></textarea>
                            @error('detail')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
			      		</div>

                        <!-- <div class="form-group">
                            {!! Form::label('nama', 'Nama Produk') !!}
                            {!! Form::text('nama', null, ['class' => 'form-control', 'placeholder' => 'Nama']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('berat', 'Berat Produk') !!}
                            {!! Form::text('berat', null, ['class' => 'form-control', 'placeholder' => 'Berat dalam satuan Kg']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('harga', 'Harga Produk') !!}
                            {!! Form::text('harga', null, ['class' => 'form-control', 'placeholder' => 'Harga']) !!}
                        </div>                
                        <div class="form-group">
                            {!! Form::label('stok', 'Stok Produk') !!}
                            {!! Form::text('stok', null, ['class' => 'form-control', 'placeholder' => 'Stok']) !!}
                        </div>                

                            <div class="form-group">
                                {!! Form::label('detail', 'Detail Produk') !!}
                                {!! Form::textarea('detail', null, ['class' => 'form-control', 'placeholder' => 'Deskripsi singkat']) !!}
                            </div> -->
                      
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
