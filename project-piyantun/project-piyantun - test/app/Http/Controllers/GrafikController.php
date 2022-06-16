<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RewiewPascaMinum;

class GrafikController extends Controller
{
    public function index()
    {
        $rate_rasa = [0,0,0,0,0];
        $rate_manfaat = [0,0,0,0,0];
        foreach(RewiewPascaMinum::selectRaw('rating_rasa as r, COUNT(rating_rasa) as c')->groupBy('rating_rasa')->get() as $v){ $rate_rasa[$v->r-1] = intval($v->c); }
        foreach(RewiewPascaMinum::selectRaw('rating_manfaat as r, COUNT(rating_manfaat) as c')->groupBy('rating_manfaat')->get() as $v){ $rate_manfaat[$v->r-1] = intval($v->c); }


        $chart_jual = [0,0,0,0,0,0,0,0,0,0,0,0];
        $dt = \App\Models\Pemesanan::selectRaw('MONTH(tanggal_pemesanan) as b, COUNT(id) as j')->whereRaw('YEAR(tanggal_pemesanan)=YEAR(NOW()) AND status_pemesanan = "diterima"')->groupByRaw('MONTH(tanggal_pemesanan)')->get();
        foreach($dt as $v){ $chart_jual[$v->b-1] = intval($v->j); }

        return view('admin.grafik.index', compact('rate_rasa','rate_manfaat','chart_jual'));
    }
}
