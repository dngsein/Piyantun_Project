<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemesanan;
use App\Models\DetailPemesanan;
use Auth;
use Session;
use DB;
use App\Http\Requests\MonitorPemesananRequest;

class MonitorPemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        Pemesanan::whereRaw('TIMESTAMPDIFF(DAY, tanggal_pemesanan, NOW()) > 2 AND status_pemesanan="belum dibayar"')
                ->update(['status_pemesanan' => 'dibatalkan']);

            $pesanan = Pemesanan::orderBy('id', 'DESC')->paginate(10);
    
            
            return view('admin.pemesanan.pemesanan', compact('pesanan'));
        
    }

    public function edit($id)
    {
        $pesanan = Pemesanan::findOrFail($id);
        $detail = DetailPemesanan::where('pemesanan_id', $id)->get();

        $this->data['pemesananID'] = $pesanan->id;
        $this->data['pemesanan'] = $pesanan;

        return view('admin.pemesanan.editForm', compact ('pesanan', 'detail'));
    }

    public function update(MonitorPemesananRequest $request, $id)
    {
        $params = $request->except('_token');
        
        $pesanan = Pemesanan::findOrFail($id);

        $save = false;
        $save = DB::transaction(function() use ($pesanan, $params){
            $pesanan->update($params);
            return true;
        });
        if ($save) {
            Session::flash('success', 'Perubahan berhasil disimpan');
        
        } else {
            Session::flash('error', 'Perubahan gagal disimpan');
        }

        return redirect('dokumentasi/pemesanan');
    }

    public function destroy($id) 
    {
        // $detail = DetailPemesanan::where('id', $id)->first();
        // $detail->delete();


        // $pesanan = Pemesanan::where('id', $id)->first();
        // $pesanan->delete();


        // Session::flash('success', 'Pemesanan telah dibatalkan');
        // return redirect('dokumentasi/pemesanan');

        // $detail = DetailPemesanan::where('id', $id)->first();

        // $pesanan = Pemesanan::where('id', $detail->pemesanan_id)->first();
        // $pesanan->jumlah_harga = $pesanan->jumlah_harga - $detail->jumlah_harga;
        // $pesanan->update();

        // $detail->delete();

        
        return redirect('dokumentasi/pemesanan');


    }
}
