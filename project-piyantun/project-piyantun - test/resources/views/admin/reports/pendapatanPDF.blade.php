  
<div class="content">
		<div class="row">
			<div class="col-lg-12">
				<div class="card card-default">
					<div class="card-header card-header-border-bottom">
						<h2>Revenue Report</h2>
					</div>
					<div class="card-body">
						@include('admin.partials.flash')
						
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
										<td>{{$v}}</td>
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
