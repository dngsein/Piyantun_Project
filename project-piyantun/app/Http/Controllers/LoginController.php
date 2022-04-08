<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class LoginController extends Controller
{
    public function postlogin (request $request) {
        // dd($request->all());
        if (Auth::attempt($request->only('email', 'password', 'role'))){

            $role=Auth::user()->role;
    
            if ($role == 'admin') {
                return view('admin.dashboard.index');
            }
        // return view('auth.home');
    

            // return redirect ('/dashboard');
            // if (Route::has('login')){
            //     if (Auth::user()->role == 'admin') {
            //         return redirect('admin.dashboard');
            //     }
            //     else if (Auth::user()->role == 'user') {
            //         // return redirect('admin.dashboard');
            //         return redirect('user.home');
                }
                // return redirect ('login');
            }
}
