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
       
            $pesanan = Pemesanan::orderBy('id', 'ASC')->paginate(10);
    
            
            return view('admin.pemesanan.pemesanan', compact('pesanan'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pesanan = Pemesanan::findOrFail($id);
        $detail = DetailPemesanan::where('pemesanan_id', $id)->get();

        $this->data['pemesananID'] = $pesanan->id;
        $this->data['pemesanan'] = $pesanan;

        return view('admin.pemesanan.editForm', compact ('pesanan', 'detail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

        return redirect('pemesanan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
