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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
	  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
    <!-- Required Extention -->
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    
    <!-- CSS Style -->
    <link rel="stylesheet" href="{{ asset ('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset ('css/style_detail.css') }}">

    <link rel="stylesheet" href="{{ asset ('css/profile.css') }}">

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
            <a class="nav-link active" aria-current="page" href="{{url('home')}}">Home</a>
            </li>
            <li class="nav-item ms-3">
            <a class="nav-link" href="{{url('home#produk')}}">Produk</a>
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
                    <span class="badge badge-danger text-danger">{{$notif}}</span>   
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

<section class="detail">

<div class="container-xxl">
        <div class="card card-img border-white">
            <div class="container-fliud">
                <div class="wrapper row">
                    <div class="preview col-md-12">
                        
                    
            <div class="card-header text-dark bg-white">
              <h3>Keranjang</h3>
            </div>
            @if(empty($pesanan))
            <div class="card-body">
            <div>
              <h3>Tidak ada pesanan</h3>
            </div>  
            </div>
            @elseif(!empty($pesanan))
            <div class="card-body">
              @include('admin.partials.flash')
              <div class="table-responsive">
                
                <table class="table">
                  <thead class="table-warning">
                    <th>No</th>
                    <th>Nama Produk</th>
                    <th>Jumlah</th>
                    <th>Harga Barang</th>
                    <th>Total Harga</th>
                    <th>Action</th>
                  </thead>
                  <tbody>
                    <?php $nomer = 1?>
                    @forelse ($detail as $detail_pemesanan)
                    <tr>
                      <td>{{ $nomer++ }}</td>
                      <td>{{ $detail_pemesanan->nama_produk }}</td>
                      <td>{{ $detail_pemesanan->jumlah_pemesanan }} pcs</td>
                      <td>Rp. {{ number_format($detail_pemesanan->harga_satuan)}}</td>
                      <td>Rp. {{ number_format($detail_pemesanan->jumlah_harga) }}</td>                         
                      <td>
                        <form action="{{url('keranjang/'. $detail_pemesanan->id) }}" method="post">
                          @csrf
                          {{ method_field('DELETE')}}
                          <button type="submit" class="btn  btn-sm"><i class="bi bi-trash-fill" style="color:red; font-size: 1rem"></i></button>
                        </form>
                      </td>                         
                    </tr>
                    @empty
                    <tr>
                      <td colspan="5">No Record Found</td>
                    </tr>
                    @endforelse
                  </tbody>
                  <div>
                    <tr>    
                      <td colspan="4"> <strong>Total Harga : </strong></td>
                      <td><strong>Rp. {{number_format($pesanan->jumlah_harga) }}</strong></td>
                      <td></td>
                    </tr>
                  </div>
                    </table>
                    @endif
                    </div>
                            <div class="card-footer bg-white text-end">
                                <a href="{{ url('https://wa.me/+628155117317') }}" class="btn btn-primary  profile-button">Pesan Sekarang</a>
                            </div>
                        </div>
                  </div>
                </div>
                    </div>
                </div>
       


                        
                    </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>