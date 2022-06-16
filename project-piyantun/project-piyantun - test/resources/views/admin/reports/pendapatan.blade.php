  
@extends('admin.layout')

@section('content')
<div class="content">
		<div class="row">
			<div class="col-lg-12">
				<div class="card card-default">
					<div class="card-header card-header-border-bottom">
						<h2>Report Penjualan</h2>
					</div>
					<div class="card-body">
						@include('admin.partials.flash')
						<form method="get">
							<div class="input-group">
								<select name="bulan" class="form-control" required>
									@foreach(['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','Sepetember','Oktober','November','Desember'] as $index => $v) <option value="{{$index+1}}" {{(($index+1)==$bulan)?'selected':''}}>Bulan {{$v}}</option> @endforeach
								</select>
								<select name="tahun" class="form-control" required>
									@foreach(range(2021, date('Y')) as $v) <option value="{{$v}}" {{$tahun==$v?'selected':''}}>Tahun {{$v}}</option> @endforeach
								</select>
								<div class="input-group-append">
									<button type="submit" class="btn btn-success">Filter</button>
									<button type="submit" formaction="{{route('report.print')}}" class="btn btn-success ml-4">Export PDF</button>
									
								</div>
							</div>
						</form>
						<form action="{{route('report.print')}}" target="_blank" method="get">

						</form>
						<table class="table table-bordered table-striped">
							<thead>
								<th>Tanggal</th>
								<th>Pesanan</th>
								<th>Laba Bersih</th>
							</thead>
							<tbody>
								@php $total1=0; $total2=0; @endphp
								@foreach(range(1,$endDate) as $v)
  									<tr>
										<td>{{str_pad($v,2,0,STR_PAD_LEFT)}} {{$bulan_tahun}}</td>
										<td>{{$ttl = intval(@$data[$v]['jumlah'])}}</td>
										<td>{{$sumttl = intval(@$data[$v]['total'])}}</td>
									</tr>
									@php $total1+=$ttl; $total2+=$sumttl; @endphp
								@endforeach
							</tbody>
							<tfoot>
								<tr>
									<th align="right">Jumlah</th>
									<th>{{$total1}}</th>
									<th>{{$total2}}</th>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
