<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemesanan;
use PDF;

class ReportController extends Controller
{
    public function __construct()
	{
		$this->data['currentAdminMenu'] = 'dokumentasi';

		$this->data['exports'] = [
			'xlsx' => 'Excel File',
			'pdf' => 'PDF File',
		];
	}

    public function revenue (Request $request)
    {
        // $this->data['currentAdminSubMenu'] = 'pendapatan';
        
        // $startDate = $request->input('start');
		// $endDate = $request->input('end');

        // if ($startDate && !$endDate) {
		// 	\Session::flash('error', 'The end date is required if the start date is present');
		// 	return redirect('pendapatan');
		// }

		// if (!$startDate && $endDate) {
		// 	\Session::flash('error', 'The start date is required if the end date is present');
		// 	return redirect('pendapatan');
		// }

		// if ($startDate && $endDate) {
		// 	if (strtotime($endDate) < strtotime($startDate)) {
		// 		\Session::flash('error', 'The end date should be greater or equal than start date');
		// 		return redirect('pendapatan');
		// 	}

		// 	$earlier = new \DateTime($startDate);
		// 	$later = new \DateTime($endDate);
		// 	$diff = $later->diff($earlier)->format("%a");
			
		// 	if ($diff >= 31) {
		// 		\Session::flash('error', 'The number of days in the date ranges should be lower or equal to 31 days');
		// 		return redirect('pendapatan');
		// 	}
		// } else {
		// 	$currentDate = date('Y-m-d');
		// 	$startDate = date('Y-m-01', strtotime($currentDate));
		// 	$endDate = date('Y-m-t', strtotime($currentDate));
		// }

        // $this->data['startDate'] = $startDate;
		// $this->data['endDate'] = $endDate;

		// $sql = "WITH recursive date_ranges AS (
		// 	SELECT :start_date_series AS date
		// 	UNION ALL
		// 	SELECT date + INTERVAL 1 DAY
		// 	FROM date_ranges
		// 	WHERE date < :end_date_series
		// 	),
		// 	filtered_orders AS (
		// 		SELECT * 
		// 		FROM pemesanans
		// 		WHERE DATE(tanggal_pemesanan) >= :start_date
		// 			AND DATE(tanggal_pemesanan) <= :end_date
		// 			AND status_pemesanan = :status_pemesanan
		// 	)
		//  SELECT 
		// 	 DISTINCT DR.date,
		// 	 COUNT(FO.id) num_of_pemesanans,
		// 	 COALESCE(SUM(FO.jumlah_harga),0) gross_revenue,
		// 	--  COALESCE(SUM(FO.tax_amount),0) taxes_amount,
		// 	 COALESCE(SUM(FO.jumlah_harga),0) net_revenue
		//  FROM date_ranges DR
		//  LEFT JOIN filtered_orders FO ON DATE(tanggal_pemesanan) = DR.date
		//  GROUP BY DR.date
		//  ORDER BY DR.date ASC";

		// $revenues = \DB::select(
		// 	\DB::raw($sql),
		// 	[
		// 		'start_date_series' => $startDate,
		// 		'end_date_series' => $endDate,
		// 		'start_date' => $startDate,
		// 		'end_date' => $endDate,
		// 		'status_pemesanan' => Pemesanan::DITERIMA,
		// 	]
		// );
        
        

        // return view('admin.reports.pendapatan',compact('revenues'), $this->data);

		$bulan = $request->has('bulan')?$request->bulan:date('m');
		$tahun = $request->has('tahun')?$request->tahun:date('Y');
		$endDate = date('t',strtotime($tahun.'-'.str_pad($bulan,2,0,STR_PAD_LEFT).'-01'));

        $this->data['currentAdminSubMenu'] = 'pendapatan';
        $pesanan = Pemesanan::selectRaw('DAY(tanggal_pemesanan) as hari, COUNT(id) as jumlah, SUM(jumlah_harga) as total')
						->whereRaw("MONTH(tanggal_pemesanan)=$bulan AND YEAR(tanggal_pemesanan)=$tahun")
						->whereRaw("status_pemesanan= 'diterima' ")
						->groupBy(\DB::raw('DAY(tanggal_pemesanan)'))
						->get();
		$data=[];
		foreach($pesanan as $value){
			$data[$value->hari] = ['jumlah'=>$value->jumlah,'total'=>$value->total];
		}


		
		// dd($data);
        return view('admin.reports.pendapatan',compact('data','bulan','tahun','endDate'), $this->data);
    }

	public function cetak (Request $request){
		$bulan = $request->has('bulan')?$request->bulan:date('m');
		$tahun = $request->has('tahun')?$request->tahun:date('Y');
		$endDate = date('t',strtotime($tahun.'-'.str_pad($bulan,2,0,STR_PAD_LEFT).'-01'));

        $this->data['currentAdminSubMenu'] = 'pendapatan';
        $pesanan = Pemesanan::selectRaw('DAY(tanggal_pemesanan) as hari, COUNT(id) as jumlah, SUM(jumlah_harga) as total')
						->whereRaw("MONTH(tanggal_pemesanan)=$bulan AND YEAR(tanggal_pemesanan)=$tahun")
						->groupBy(\DB::raw('DAY(tanggal_pemesanan)'))
						->get();
		$data=[];
		foreach($pesanan as $value){
			$data[$value->hari] = ['jumlah'=>$value->jumlah,'total'=>$value->total];
		}
		// dd($data);
        return view('admin.reports.lap',compact('data','bulan','tahun','endDate'), $this->data);
		
	}
	public function print (Request $request){
		$bulan = $request->has('bulan')?$request->bulan:date('m');
		$tahun = $request->has('tahun')?$request->tahun:date('Y');
		$endDate = date('t',strtotime($tahun.'-'.str_pad($bulan,2,0,STR_PAD_LEFT).'-01'));

        $this->data['currentAdminSubMenu'] = 'pendapatan';
        $pesanan = Pemesanan::selectRaw('DAY(tanggal_pemesanan) as hari, COUNT(id) as jumlah, SUM(jumlah_harga) as total')
						->whereRaw("MONTH(tanggal_pemesanan)=$bulan AND YEAR(tanggal_pemesanan)=$tahun")
						->groupBy(\DB::raw('DAY(tanggal_pemesanan)'))
						->get();
		$data=[];
		foreach($pesanan as $value){
			$data[$value->hari] = ['jumlah'=>$value->jumlah,'total'=>$value->total];
		}
		// dd($data);
        return view('admin.reports.lap',compact('data','bulan','tahun','endDate'), $this->data);
		
	}

}
