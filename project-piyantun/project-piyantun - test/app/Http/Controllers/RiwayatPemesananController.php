<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use App\Models\DetailPemesanan;
use Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class RiwayatPemesananController extends Controller
{
    public function riwayat()
    {
        $pesanan = Pemesanan::orderBy('id', 'DESC')
                            ->where('user_id', Auth::user()->id)->where('status_pemesanan', 'dibayar')
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

    function rating(Request $req){
        $user = auth()->user();
        $data = new \App\Models\RewiewPascaMinum;
        $data->user_id = $user->id;
        $data->nama_pelanggan = $user->name;
        $data->pemesanan_id = $req->pesanan_id;
        $data->rating_rasa = $req->rasa;
        $data->rating_manfaat = $req->manfaat;
        $data->ulasan = $req->ulasan;

        if($data->save()){
            // iki gak eroh ku carane ngetokne notif
            Alert::success('Berhasil', 'Review Berhasil ditambahkan');
            return redirect()->back();
        }else{
            Alert::error('Gagal', 'Gagal menambahkan review');
            return redirect()->back();
        }
    }
}
