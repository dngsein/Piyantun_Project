<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemesanan;

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
        $this->data['currentAdminSubMenu'] = 'pendapatan';
        
        $startDate = $request->input('start');
		$endDate = $request->input('end');

        if ($startDate && !$endDate) {
			\Session::flash('error', 'The end date is required if the start date is present');
			return redirect('pendapatan');
		}

		if (!$startDate && $endDate) {
			\Session::flash('error', 'The start date is required if the end date is present');
			return redirect('pendapatan');
		}

		if ($startDate && $endDate) {
			if (strtotime($endDate) < strtotime($startDate)) {
				\Session::flash('error', 'The end date should be greater or equal than start date');
				return redirect('pendapatan');
			}

			$earlier = new \DateTime($startDate);
			$later = new \DateTime($endDate);
			$diff = $later->diff($earlier)->format("%a");
			
			if ($diff >= 31) {
				\Session::flash('error', 'The number of days in the date ranges should be lower or equal to 31 days');
				return redirect('pendapatan');
			}
		} else {
			$currentDate = date('Y-m-d');
			$startDate = date('Y-m-01', strtotime($currentDate));
			$endDate = date('Y-m-t', strtotime($currentDate));
		}

        $this->data['startDate'] = $startDate;
		$this->data['endDate'] = $endDate;


        
        

        return view('admin.reports.pendapatan', $this->data);
    }
}
