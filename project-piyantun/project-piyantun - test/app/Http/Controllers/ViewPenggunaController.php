<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use PDF;
class ViewPenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['users'] = User::orderBy('id', 'ASC')->paginate(10);
        return view('admin.akunUser.index', $this->data);
    }

    public function pdf () 
	{
		$users = User::orderBy('id', 'ASC')->paginate(10);
        $pdf = PDF::loadview('admin.akunUser.pdf', ['users' => $users])->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->download('akun_user.pdf');

	}
}
