@extends('admin.layout')

@section('content')
    

<div class="content">
    <div class="row">
  
        <div class="col-lg-8 mx-auto">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                        <h2>Tambah Pengelauran</h2>
                </div>

                <div class="card-body">
                        @include('admin.partials.flash', ['$errors' => $errors])
                            @if (!empty($pengeluaran))
                                {!! Form::model($pengeluaran, ['url' => ['produk', $pengeluaran->id], 'method' => 'PUT']) !!}
                                {!! Form::hidden('id') !!}
                            @else
                                {!! Form::open(['url' => 'pengeluaran']) !!}
                            @endif

                          <div class="form-group mb-3">
                        <label class="label" for="nama">Nama Barang</label>
                        <input id="nama" name="nama" type="text" class="form-control  @error('nama') is-invalid @enderror" value="{{ old('nama') }}" placeholder="Nama" autofocus required>
                            @error('nama')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
			      		</div>

                        <div class="form-group mb-3">
                        <label class="label" for="tanggal">Tanggal</label>
                        <input id="tanggal" name="tanggal" type="date" class="form-control  @error('tanggal') is-invalid @enderror" value="{{ old('tanggal') }}" placeholder="Nama" required>
                            @error('tanggal')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
			      		</div>

                        <div class="form-group mb-3">
                        <label class="label" for="jumlah">Jumlah Pengeluaran</label>
                        <input id="jumlah" name="jumlah" type="number" min="0" class="form-control  @error('jumlah') is-invalid @enderror" value="{{ old('jumlah') }}" placeholder="Nama" required>
                            @error('jumlah')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
			      		</div>

                      
                        <div class="form-footer pt-5 border-top">
                            <button type="submit" class="btn btn-primary btn-default">Save</button>
                            <a href="{{ url('pengeluaran') }}" class="btn btn-secondary btn-default">Back</a>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>  
        </div>
    </div>
</div>
@endsection
