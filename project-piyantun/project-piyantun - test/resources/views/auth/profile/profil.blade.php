<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
    crossorigin="anonymous">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
    
    <!-- CSS Style -->
	
	<link rel="stylesheet" href="{{ asset ('css/profile.css') }}">
    <link rel="stylesheet" href="{{ asset ('css/style.css') }}">
    <link rel="stylesheet" href="sweetalert2.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <title>Piyantun</title>
    <link rel="shortcut icon" href="https://thumbs.dreamstime.com/b/print-163361306.jpg">
    
  </head>
  <body>
 <!-- Navbar  -->
 <nav class="navbar navbar-expand-lg py-2 fixed-top navbar-light ">
  <div class="container">
    <a class="navbar-brand" href="#"><span>Piyantun<span></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ms-auto">
            <li class="nav-item ms-3">
            <a class="nav-link active" aria-current="page" href="{{ url('home')}}">Home</a>
            </li>
            <li class="nav-item ms-2 dropdown">
                <a class="btn dropdown-toggle" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                {{ Auth::user()->name }} <span class="caret"></span>
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <li><a class="dropdown-item" href="{{ url('profile') }}"><i class="bi bi-person"></i><span class="ms-4">Profile Saya</span></a></li>

                    <?php
                      $pesanan_utama = \App\Models\Pemesanan::where('user_id', Auth::user()->id)->where('status_pemesanan','belum dibayar')->first();
                      if(!empty($pesanan_utama))
                        {
                          $notif = \App\Models\DetailPemesanan::where('pemesanan_id', $pesanan_utama->id)->count(); 
                        }
                    ?>
                    
                    <li><a class="dropdown-item" href="{{ route('keranjang') }}"><i class="bi bi-cart"></i>
                    @if(!empty($notif)) 
                    <span class="badge text-danger">{{$notif}}</span>   
                    @endif
                    <span class="ms-4">Keranjang</span></a></li>

                    <li><a class="dropdown-item" href="{{ route('riwayatPemesanan') }}" ><i class="bi bi-card-checklist"></i></i><span class="ms-4">Riwayat Pemesanan</span></a></li>
                    <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="bi bi-box-arrow-right"></i><span class="ms-4">Keluar</span></a></li>
                </ul>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>

            </li>
        </div>
    </div>
  </div>
</nav>
<!-- Navbar -->

<!-- Section -->
@if (session()->has('message'))
<script>Swal.fire('Berhasil Berhasil');</script>
@endif
    <br>
<div class="container rounded bg-white mt-5 mb-5">
    <div class="row">
        <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
            <img class="rounded-circle mt-5" width="150px" height="260px" src="{{ asset ('storage/uploads/gambar_produk/1_1650086949.jpg')}}">
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
                    <div class="col-md-12"><label class="labels">Nama</label><input id="name" type="text" class="form-control bg-white" value="{{ Auth::user()->name}}" readonly></div>
                    <div class="col-md-12"><label class="labels">Alamat Email</label><input id="email" type="text" class="form-control bg-white" value="{{ Auth::user()->email}}" readonly></div>
                    <div class="col-md-12"><label class="labels">Tempat Lahir</label><input id="tampat_lahir" type="text" class="form-control bg-white"  value="{{ Auth::user()->tempat_lahir}}" readonly></div>
                    <div class="col-md-12"><label class="labels">Tanggal Lahir</label><input id="tanggal_lahir" type="date" class="form-control bg-white" value="{{ Auth::user()->tanggal_lahir}}" readonly></div>
                    <div class="col-md-12"><label class="labels">Telepon</label><input id="telepon" type="text" class="form-control bg-white"  value="{{ Auth::user()->telepon}}" readonly></div>
                    <div class="col-md-12"><label class="labels">Alamat</label><textarea id="alamat" type="text" class="form-control bg-white" readonly>{{ Auth::user()->alamat}} </textarea></div>
                </div>
                
            </div>
        </div>
        <div class="col-md-4">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center experience"><span>Keamanan</span></div>
                <div class="col-md-12 mt-1"><label class="labels mt-4">Role</label><input id="role"  type="text" class="form-control bg-white"  value="{{ Auth::user()->role}}" readonly></div>
                <div class="mt-5 text-end">
                    <a class="btn btn-primary profile-button" href="{{ url('profile/edit') }}">Edit Profile</a>
                </div>
            </div>

        </div>
    </div>
</div>
	<!-- </section> -->


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="sweetalert2.all.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


  </body>
  @include('sweetalert::alert')
</html>