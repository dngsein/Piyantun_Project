  
@extends('admin.layout')

@section('content')
<div class="content">
		<div class="row">
			<div class="col-lg-12">
				<div class="card card-default">
					<div class="card-header card-header-border-bottom">
						<h2>Revenue Report</h2>
					</div>
					<div class="card-body">
						@include('admin.partials.flash')
						@include('admin.reports.filter')
						<table class="table table-bordered table-striped">
							<thead>
								<th>Tanggal</th>
								<th>Pesanan</th>
								<th>Laba kotor</th>
								<th>Pajak</th>
								<th>Laba Bersih</th>
								
							</thead>
							<tbody>
								@php
									$totalOrders = 0;
									$totalGrossRevenue = 0;
									$totalTaxesAmount = 0;
									$totalNetRevenue = 0;
									
								@endphp
								@forelse ($revenues as $revenue)
									<tr>    
										<td>{{ $revenue->date, 'd M Y' }}</td>
										<td>{{ $revenue->num_of_orders }}</td>
										<td>{{ $revenue->gross_revenue }}</td>
										<td>{{ $revenue->taxes_amount  }}</td>
										<td>{{ $revenue->net_revenue   }}</td>
										
									</tr>

									@php
										$totalOrders += $revenue->num_of_orders;
										$totalGrossRevenue += $revenue->gross_revenue;
										$totalTaxesAmount += $revenue->taxes_amount;
										$totalNetRevenue += $revenue->net_revenue;
										
									@endphp
								@empty
									<tr>
										<td colspan="6">No records found</td>
									</tr>
								@endforelse
								
								@if ($revenues)
									<tr>
										<td>Total</td>
										<td><strong>{{ $totalOrders }}</strong></td>
										<td><strong>{{ $totalGrossRevenue }}</strong></td>
										<td><strong>{{ $totalTaxesAmount  }}</strong></td>
										<td><strong>{{ $totalNetRevenue   }}</strong></td>
										
									</tr>
								@endif
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
