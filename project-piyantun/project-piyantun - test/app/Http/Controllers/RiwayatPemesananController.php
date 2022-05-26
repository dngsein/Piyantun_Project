<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use App\Models\DetailPemesanan;
use Auth;
use Illuminate\Http\Request;

class RiwayatPemesananController extends Controller
{
    public function riwayat()
    {
        $pesanan = Pemesanan::where('user_id', Auth::user()->id)->where('status_pemesanan', 'dibayar')
                            ->orWhere('user_id', Auth::user()->id)->where('status_pemesanan', 'diterima')
                            ->get();
        
        return view('auth.pesan.riwayat', compact('pesanan'));
    }

    public function edit($id)
    {
        $pesanan = Pemesanan::findOrFail($id);
        $detail = DetailPemesanan::where('pemesanan_id', $id)->get();


        return view('auth.pesan.editForm',compact ('pesanan', 'detail'));
    }

    public function update(Request $request, $id)
    {
        $pesanan = Pemesanan::where('id', $id)->first();

        $pesanan->update($request->all());

        return redirect ('riwayat-pemesanan');
    }
}
