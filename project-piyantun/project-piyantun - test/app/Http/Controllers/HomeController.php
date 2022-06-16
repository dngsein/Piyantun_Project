<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function index()
    {
        $products = Product::paginate(9);
        $role=Auth::user()->role;

        if ($role == 'admin') {
            $rate_rasa = [0,0,0,0,0];
            $rate_manfaat = [0,0,0,0,0];
            foreach(\App\Models\RewiewPascaMinum::selectRaw('rating_rasa as r, COUNT(rating_rasa) as c')->groupBy('rating_rasa')->get() as $v){ $rate_rasa[$v->r-1] = intval($v->c); }
            foreach(\App\Models\RewiewPascaMinum::selectRaw('rating_manfaat as r, COUNT(rating_manfaat) as c')->groupBy('rating_manfaat')->get() as $v){ $rate_manfaat[$v->r-1] = intval($v->c); }


            $chart_jual = [0,0,0,0,0,0,0,0,0,0,0,0];
            $dt = \App\Models\Pemesanan::selectRaw('MONTH(tanggal_pemesanan) as b, COUNT(id) as j')->whereRaw('YEAR(tanggal_pemesanan)=YEAR(NOW()) AND status_pemesanan = "diterima"')->groupByRaw('MONTH(tanggal_pemesanan)')->get();
            foreach($dt as $v){ $chart_jual[$v->b-1] = intval($v->j); }

            return view('admin.dashboard.index', compact('rate_rasa','rate_manfaat','chart_jual'));
        }
        else if ($role == 'user') {
            return view('home', compact('products'));
        }
        else {
            return view('auth.login');
        }
        // return view('auth.home');
    }
        // return view('home');


    // public function katalog() {
    //     return view('admin.katalog.index');
    // }


    // public function next(){
    //     return view('auth.next');
    // }

    function data_segmentasi(Request $req){
        switch ($req->type) {
            case '2':
                    $where = "timestampdiff(YEAR,users.tanggal_lahir,NOW()) >= 20 AND timestampdiff(YEAR,users.tanggal_lahir,NOW()) < 30";
                break;
            case '3':
                    $where = "timestampdiff(YEAR,users.tanggal_lahir,NOW()) >= 30";
                break;
            default: $where = "timestampdiff(YEAR,users.tanggal_lahir,NOW()) < 20"; break;
        }
        $data = \App\Models\RewiewPascaMinum::select('rewiew_pasca_minum.*')
                            ->join('users','users.id','=','rewiew_pasca_minum.user_id')
                            ->whereRaw($where)
                            ->paginate(10);
        // dd($data->toSql());
        foreach ($data as $key => $value) {
            $data[$key]->rating_rasa = str_repeat('<i class="fa fa-star text-warning"></i>',$value->rating_rasa);
            $data[$key]->rating_manfaat = str_repeat('<i class="fa fa-star text-warning"></i>',$value->rating_manfaat);
        }
        return response()->json($data);
    }
}

// public function welcome() {
//     return view('home');
// }

// public function default() {
//     return view('welcome');
// }
