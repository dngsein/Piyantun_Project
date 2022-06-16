<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan pendapatan</title>
    <style>
        table,th,td{
            border: 2px solid black;
        }
        th,td{
            padding: 5px 10px;
        }
        button{
            padding: 10px 30px 15px 15px;
            position: fixed;
            top: 0; left: 0;
            border-radius: 0;
            border-bottom-right-radius: 30px;
            border: none;
            font-size: large;
            font-weight: bolder;
            background: green;
            color: white;
            cursor:pointer;
        }
    </style>
    <style media="print">button{display:none !important;}</style>
</head>
<body>
<body style="font-family:sans-serif">
    <button onclick="window.print()">CETAK</button>
    <div style="text-align: center; margin-bottom: 0.5cm;">
        <h3 style="margin:10px;">LAPORAN DATA PENDAPATAN</h3>
    </div>
    <table width="100%" cellspacing="0">
        <thead>
            <tr>
            <th scope="col">Tanggal</th>
            <th scope="col">Pesanan</th>
            <th scope="col">Laba Bersih</th>
            </tr>
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
    <script>window.print();</script>
</body>
</html>