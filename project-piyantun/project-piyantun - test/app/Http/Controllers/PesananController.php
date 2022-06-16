<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Pemesanan;
use App\Models\DetailPemesanan;
use Auth;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;

class PesananController extends Controller
{
    public function pesan (Request $request, $id) 
    {
        // dd($request);
        $product = Product::where('id', $id)->first();
        $tanggal = Carbon::now();

        // cek validasi
        $cek_pemesanan = Pemesanan::where('user_id', Auth::user()->id)->where('status_pemesanan', 'belum dibayar')->first();

        if(empty($cek_pemesanan))
        {

            // simpan database
            $pesanan = new Pemesanan;
            $pesanan->user_id = Auth::user()->id;
            $pesanan->tanggal_pemesanan = $tanggal;
            $pesanan->status_pemesanan = 'belum dibayar';
            $pesanan->jumlah_harga = 0;
            
            $pesanan->save();
        }

        // simpan database detail
        $pesanan_baru = Pemesanan::where('user_id', Auth::user()->id)->where('status_pemesanan', 'belum dibayar')->first();

        // cek detail
        $cek_detail = DetailPemesanan::where('produk_id', $product->id)->where('pemesanan_id', $pesanan_baru->id)->first();
        if(empty($cek_detail))
        {

            $detail = new DetailPemesanan;
            $detail->produk_id = $product->id;
            $detail->pemesanan_id = $pesanan_baru->id;
            $detail->jumlah_pemesanan = $request->jumlah_pesanan;

            $detail->nama_produk = $product->nama;
            $detail->harga_satuan = $product->harga;

            $detail->jumlah_harga = $product->harga*$request->jumlah_pesanan;
            
            $detail->save();
        }else {
            $detail = DetailPemesanan::where('produk_id', $product->id)->where('pemesanan_id', $pesanan_baru->id)->first();

            $detail->nama_produk = $product->nama;
            $detail->harga_satuan = $product->harga;

            $detail->jumlah_pemesanan = $detail->jumlah_pemesanan + $request->jumlah_pesanan;
            
            $harga_tambahan =  $product->harga*$request->jumlah_pesanan;
            $detail->jumlah_harga = $detail->jumlah_harga + $harga_tambahan;
            
            $detail->update();
        }

        // jumlah harga pesanan
        $pesanan = Pemesanan::where('user_id', Auth::user()->id)->where('status_pemesanan', 'belum dibayar')->first();
        $pesanan->jumlah_harga =  $pesanan->jumlah_harga + $product->harga*$request->jumlah_pesanan;
        $pesanan->update();

        // -----------

        Alert::success('Berhasil', 'Produk telah ditambahkan di keranjang');

        return redirect('home#produk');
    }

    public function keranjang()
    {
        $pesanan = Pemesanan::where('user_id', Auth::user()->id)->where('status_pemesanan', 'belum dibayar')->first();

        if(!empty($pesanan))
        {
            $detail = DetailPemesanan::where('pemesanan_id', $pesanan->id)->get();
            return view('auth.pesan.keranjang', compact('pesanan', 'detail'));
        }
        
        return view('auth.pesan.keranjang', compact('pesanan'));
    }

    public function delete($id) 
    {
        $detail = DetailPemesanan::where('id', $id)->first();

        $pesanan = Pemesanan::where('id', $detail->pemesanan_id)->first();
        $pesanan->jumlah_harga = $pesanan->jumlah_harga - $detail->jumlah_harga;
        $pesanan->update();

        $detail->delete();

        Alert::success('Berhasil', 'Pesanan dihapus dari keranjang');
        return redirect('keranjang');
    }

}
