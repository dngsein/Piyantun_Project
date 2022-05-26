<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemesanan;
use Auth;

class AdminPemesananController extends Controller
{
    public function pemesanan()
    {
        $pesanan = Pemesanan::orderBy('id', 'ASC')->paginate(10);

        
        return view('admin.pemesanan.pemesanan', compact('pesanan'));
    }
}
