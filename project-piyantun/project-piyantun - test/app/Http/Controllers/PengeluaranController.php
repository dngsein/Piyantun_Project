<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengeluaran;
use App\Http\Requests\PengeluaranRequest;
use Auth;
use DB;
use Session;

class PengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['pengeluaran'] = Pengeluaran::orderBy('id', 'ASC')->paginate(10);
        return view('admin.pengeluaran.pengeluaran', $this->data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->data['pengeluaran'] = null;

        return view('admin.pengeluaran.form', $this->data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $params = $request->except('_token');
        $params['user_id'] = Auth::user()->id;
        
        $save = false;
        $save = DB::transaction(function() use ($params) {
            $pengeluaran = Pengeluaran::create($params);

            return true;
        });

        if ($save) {
            Session::flash('success', 'Berhasil disimpan');
        
        } else {
            Session::flash('error', 'Bagal disimpan');
        }

        return redirect('pengeluaran');
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
        if (empty($id)) {
            return redirect ('pengeluaran/create');
        }

        $pengeluaran = Pengeluaran::findOrFail($id);
       
        $this->data['pengeluaranID'] = $pengeluaran->id;
        $this->data['pengeluaran'] = $pengeluaran;

        return view('admin.pengeluaran.editForm', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PengeluaranRequest $request, $id)
    {
        $params = $request->except('_token');

        $pengeluaran = Pengeluaran::findOrFail($id);

        $save = false;
        $save = DB::transaction(function() use ($pengeluaran, $params){
            $pengeluaran->update($params);
            return true;
        });
        if ($save) {
            Session::flash('success', 'Perubahan berhasil disimpan');
        
        } else {
            Session::flash('error', 'Perubahan gagal disimpan');
        }

        return redirect('pengeluaran');
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
