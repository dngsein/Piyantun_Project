@extends('admin.layout')

@section('content')


<link rel="stylesheet" href="{{ asset ('css/profile.css') }}">

<!-- Section -->
@if (session()->has('message'))
<script>Swal.fire('Berhasil Berhasil');</script>
@endif
<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
            <img class="rounded-circle mt-5" width="200px" height="200px" src="{{ asset ('storage/uploads/gambar_produk/1_1650086949.jpg')}}">
            <span class="font-weight-bold mt-3">{{ Auth::user()->name }}</span>
            <span class="text-black-50">{{ Auth::user()->email }}</span><span> </span>
            </div>
            
        </div>
        <div class="col-md-5 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Saya</h4>
                </div>
                <div class="row mt-3 for">
                    <div class="col-md-12"><label class="labels">Nama</label><input id="name" type="text" class="form-control bg-white mb-2 " value="{{ Auth::user()->name}}" readonly></div>
                    <div class="col-md-12"><label class="labels">Alamat Email</label><input id="email" type="text" class="form-control bg-white mb-2 " value="{{ Auth::user()->email}}" readonly></div>
                    <div class="col-md-12"><label class="labels">Tempat Lahir</label><input id="tampat_lahir" type="text" class="form-control bg-white mb-2 "  value="{{ Auth::user()->tempat_lahir}}" readonly></div>
                    <div class="col-md-12"><label class="labels">Tanggal Lahir</label><input id="tanggal_lahir" type="date" class="form-control bg-white mb-2 " value="{{ Auth::user()->tanggal_lahir}}" readonly></div>
                    <div class="col-md-12"><label class="labels">Telepon</label><input id="telepon" type="text" class="form-control bg-white mb-2 "  value="{{ Auth::user()->telepon}}" readonly></div>
                    <div class="col-md-12"><label class="labels">Alamat</label><textarea id="alamat" type="text" class="form-control bg-white mb-2 " readonly>{{ Auth::user()->alamat}} </textarea></div>
                </div>
                
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center experience"><span>Keamanan</span></div>
                <div class="col-md-12 mt-1"><label class="labels mt-4">Role</label><input id="role"  type="text" class="form-control bg-white"  value="{{ Auth::user()->role}}" readonly></div>
                <div class="mt-5 text-right">
                    <a class="btn btn-primary  profile-button" href="{{ route('adminProfile.edit') }}">Edit Profil</a>
                </div>
            </div>

        </div>
    </div>
</div>
	<!-- </section> -->


@endsection