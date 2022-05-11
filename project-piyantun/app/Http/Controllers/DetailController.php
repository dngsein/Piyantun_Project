<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Pemesanan;
use App\Models\DetailPemesanan;


class DetailController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index ($id)
    {
        $product = Product::where('id', $id)->first();

        return view('auth.katalog.detailProduk', compact('product'));
    // echo('Masuk Detail');
    }

    

}
