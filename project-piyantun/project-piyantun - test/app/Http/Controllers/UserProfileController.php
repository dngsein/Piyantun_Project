<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use RealRashid\SweetAlert\Facades\Alert;

class UserProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $role=Auth::user()->role;
    
        if ($role == 'admin') {
            return view('admin.profile.index');
        }
        else if ($role == 'user') {
            return view('auth.profile.profil');
        }
    }

    public function edit()
    {
        $role=Auth::user()->role;
    
        if ($role == 'admin') {
            return view('admin.profile.editProfil');
        }
        else if ($role == 'user') {
            return view('auth.profile.editProfile');
        }
    }

    public function update(Request $request)
    {
        $attr = $request->validate([
            'name' => ['string', 'min:3', 'max:20', 'required'],
            'email' => ['string', 'email', 'min:3', 'max:20', 'required'],
            'tempat_lahir' => ['string', 'min:3', 'max:20', 'required'],
            'tanggal_lahir' => ['date', 'required'],
            'telepon' => ['string', 'numeric', 'required'],
            'alamat' => ['string', 'max:200', 'required'],
        ]);

        auth()->user()->update($attr);
        
        $role=Auth::user()->role;
    
        if ($role == 'admin') {
            Alert::success('Berhasil', 'Profile berhasil diperbarui');
            return redirect('profile-admin');
        }
        else if ($role == 'user') {
            Alert::success('Berhasil', 'Profile berhasil diperbarui');
            return redirect('profile');
        }
    }
}