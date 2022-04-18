<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        $role=Auth::user()->role;
    
        if ($role == 'admin') {
            return view('admin.dashboard.index');
        }
        else if ($role == 'user') {
            return view('home');
        }
        else {
            return view('auth.login');
        }
        // return view('auth.home');
    }
        // return view('home');


    public function katalog() {
        return view('admin.katalog.index');
    }

    
    public function next(){
        return view('auth.next');
    }
}

// public function welcome() {
//     return view('home');
// }

// public function default() {
//     return view('welcome');
// }