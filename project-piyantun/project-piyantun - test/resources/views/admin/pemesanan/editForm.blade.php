@extends('admin.layout')

@section('content')
    



<div class="content">
    <div class="row">
  
        <div class="col-lg-12 mx-auto">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                        <h2>Detail Pemesanan</h2>
                </div>

                <div class="card-body">
                <table class="table">
                  <thead class="table-primary">
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Jumlah</th>
                    <th>Harga Barang</th>
                    <th>Total Harga</th>

                  </thead>
                  <tbody>
                    <?php $nomer = 1?>
                    @forelse ($detail as $detail_pemesanan)
                    <tr>
                      <td>{{ $nomer++ }}</td>
                      <td>{{ $detail_pemesanan->nama_produk }}</td>
                      <td>{{ $detail_pemesanan->jumlah_pemesanan }} pcs</td>
                      <td>Rp. {{ number_format($detail_pemesanan->harga_satuan)}}</td>
                      <td>Rp. {{ number_format($detail_pemesanan->jumlah_harga) }}</td>                         
                                              
                    </tr>
                    @empty
                    <tr>
                      <td colspan="5">No Record Found</td>
                    </tr>
                    @endforelse
                  </tbody>
                  <div>
                    <tr>    
                      <td colspan="4" > <strong>Total Harga : </strong></td>
                      <td><strong>Rp. {{number_format($pesanan->jumlah_harga) }}</strong></td>
                    
                    </tr>
                  </div>


                    </table>
                        @include('admin.partials.flash', ['$errors' => $errors])
                            @if (!empty($pesanan))
                                {!! Form::model($pesanan, ['url' => ['dokumentasi/pemesanan', $pesanan->id], 'method' => 'PUT']) !!}
                                {!! Form::hidden('id') !!}
                            @else
                                {!! Form::open(['url' => 'dokumentasi/pemesanan']) !!}
                            @endif

                        <div class="form-group mb-3 ">
			      			<label class="label" for="status_pemesanan">Status Pemesanan</label>
			      			<select id="status_pemesanan" name="status_pemesanan" type="text" class="form-select " required>
                            <option value="belum dibayar">Belum Dibayar</option>
                            <option value="dibayar">Dibayar</option>
                            </select>
			      		</div>

                        <div class="form-footer pt-5 border-top text-right">
                            <form action="{{url('dokumentasi/pemesanan/'. $pesanan->id.'/delete') }}" method="post">
                            @csrf
                            {{ method_field('DELETE')}}
                              <button type="submit" class="btn btn-danger btn-default mx-4">Batalkan Pemesanan</button>
                            </form>

                            <button type="submit" class="btn btn-primary ml-4 btn-default">Save</button>
                            <a href="{{ url('dokumentasi/pemesanan') }}" class="btn btn-secondary btn-default">Back</a>
                        </div>
                    {!! Form::close() !!}
                    
                </div>
            </div>  
        </div>
    </div>
</div>
@endsection
