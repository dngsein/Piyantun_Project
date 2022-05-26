<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- SA -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
    crossorigin="anonymous">

    <!-- CSS Style -->
    <link rel="stylesheet" href="{{ asset ('css/style.css') }}">

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
            <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item ms-3">
                <a class="nav-link" href="#toko">Toko</a>
            </li>
            <li class="nav-item ms-3">
            <a class="nav-link" href="#produk">Produk</a>
            </li>
            <li class="nav-item ms-3">
            <a class="nav-link" href="#investasi">Investasi</a>
            </li>
            <li class="nav-item ms-3">
            <a class="nav-link" href="#kontak">Kontak</a>
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

<!-- Landing Page -->
<div class="hero vh-100 d-flex align-items-center">
  <div class="container">
    <div class="row">
      <div class="col-lg-7 mx-auto  text-center">
        <h1 class="display-4 text-light">
          Dapatkan Olahan Herbal di Rumah Kreatif
        </h1>
        <p class="text-light">Telah lulus uji laboratorium sehingga aman untuk dikonsumsi oleh semua kalangan usia Segera temukan minuman herbal yang anda inginkan hanya di Piyantun</p>
        <p class="text-light">Rumah Kreatif Desa Mojodeso Kecamatan Kapas, Bojonegoro</p>
        <a class="btn btn-primary mt-3" href="#produk">Dapatkan</a>
        <a class="btn btn-outline-light mt-3 ms-3" href="#kontak">Hubungi</a>
      </div>
    </div>
  </div> 
</div>
<!-- Landing Page -->

<!-- Profil Toko -->
<section class="row w-100" id="toko">
  <div class="col-lg-6 col-img">  </div>
  <div class="col-lg-6">
    <div class="container">
      <div class="row">
        <div class="col-md-10 offset-md-1">
          <h1>Profil Rumah Kreatif</h1>
          <p>Rumah Kreatif merupakan tempat produksi hasil kreatifitas warga RT 11. Misalnya aneka jenis minuman segar. 
            Minuman ini terbuat dari bahan alami yang ditanam di kebun samping lokasi Rumah Kreatif. 
            Minuman yang diproduksi ini misalnya teh telang, teh kemangi, wedah okra dan masih banyak yang lain.</p>
          
        </div>
      </div>
    </div>
  </div>

</section>


<!-- Produk -->
<section id="produk">
  <div class="container-fluid">
    <div class="row mb-5">
      <div class="col-md-8 mx-auto text-center">
        <h1>Produk Rumah Kreatif</h1>
        <p>Berbagai produk herbal yang sudah lolos uji laboratorium dan aman untuk dikonsumsi semua kalangan. Pemesanan produk bisa dilakukan melalui website tanpa harus datang ke lokasi langsung</p>
      </div>
    </div>


<div class="row g-3">
@foreach ($products as $product)
  <div class="col-lg-4 col-sm-6">
    <div class="project">
    

    @if ($product->product_images->first())
    <img src="{{ asset ('storage/uploads/gambar_produk/'. $product->product_images->first()->path) }}" alt="{{ $product->nama}}">
		@else
		<img src="{{ asset ('img/aw-snapp.jpg') }}" alt="{{ $product->nama}}">
		@endif
      
      <div class="overlay">
        <div>
        <a href="{{ url('home/katalog/produk/'. $product->id) }}">
          <h4 class="text-light">{{ $product->nama }}</h4>
          <h6 class="text-light">Rp. {{ number_format ($product->harga) }}</h6>
        </a>
          <a class="btn btn-outline-light" href="{{ url('produk/'. $product->id.'/detail') }}">Beli</a>
        </div>
      </div>
    </div>
  </div>
  @endforeach

</div>
  </div>
</section>
<!-- Produk -->

<!-- Kontak -->
<section id="kontak">
  <div class="container">
    <div class="row mb-5">
      <div class="col-md-8 mx-auto text-center">
        <h1>Kontak Kami</h1>
      </div>    
    </div>

      <div class="container mt-2">
      <div class="row">
        <div class="col-md-4">
          <h3>Butuh Informasi Lebih Lanjut?</h3>
          <br>
          <h4>Kontak</h4>
          <ul class="list-unstyled">
            <li><h5 href="#">Telepon : 0857-9475-36253</h5></li>
            <li><h5 href="#">Email   : adip@gmail.com</h5></li>
            <!-- <li><h5 href="#">Alamat  : Desa Mojodeso, Kec Kapas, Kab Bojonegoro</h5></li> -->
          </ul>
          <br>
          <h5 class="text-dark">Kami dengan senang hati akan menerima semua feedback dari anda</h5>
        </div>
        
        <div class="col">
          <h5 class="text-light"></h5>
        </div>

        
        <div class="col-md-6 col-image">

        </div>

      </div>
    </div>

</section>

<!-- Kontak -->


<section>

</section>

<!-- Footer -->
<footer>
  <div class="footer-top">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <h1 class="text-light">Piyantun</h1>
        </div>
        
        <div class="col-md-3">
          <h5 class="text-light"></h5>
        </div>
        <div class="col-md-2">
          <h4 class="text-light">Brand</h4>
          <ul class="list-unstyled">
            <li><a href="#">Home</a></li>
            <li><a href="#toko">Toko</a></li>
            <li><a href="#produk">Produk</a></li>
            <li><a href="#investasi">Investasi</a></li>
            <li><a href="#kontak">Kontak</a></li>
          </ul>
        </div>
        
        <div class="col-md-3">
          <h4 class="text-light">Kontak</h4>
          <ul class="list-unstyled">
            <li><a href="https://www.google.com/search?q=rumah%20kreatif%20mojodeso%20bojonegoro&rlz=1C1GCEJ_enID977ID977&oq=rumah&aqs=chrome.0.69i59j69i57j0i433i512j46i175i199i512j0i512j69i61l3.993j0j4&sourceid=chrome&ie=UTF-8&tbs=lf:1,lf_ui:2&tbm=lcl&sxsrf=APq-WBtNteleRdYiQ7gKhudJj6kTurzoEg:1649515820502&rflfq=1&num=10&rldimm=12623392990634841364&lqi=CiFydW1haCBrcmVhdGlmIG1vam9kZXNvIGJvam9uZWdvcm9aIyIhcnVtYWgga3JlYXRpZiBtb2pvZGVzbyBib2pvbmVnb3JvkgEEY2FmZZoBI0NoWkRTVWhOTUc5blMwVkpRMEZuU1VOdmEwMHRNMlZuRUFFqgEVEAEqESINcnVtYWgga3JlYXRpZigm&ved=2ahUKEwjr9KCknYf3AhWt63MBHa33A1IQvS56BAgEEAE&rlst=f#rlfi=hd:;si:12623392990634841364,l,CiFydW1haCBrcmVhdGlmIG1vam9kZXNvIGJvam9uZWdvcm9aIyIhcnVtYWgga3JlYXRpZiBtb2pvZGVzbyBib2pvbmVnb3JvkgEEY2FmZZoBI0NoWkRTVWhOTUc5blMwVkpRMEZuU1VOdmEwMHRNMlZuRUFFqgEVEAEqESINcnVtYWgga3JlYXRpZigm;mv:[[-7.049361800000001,112.56673479999999],[-7.6221069,111.850545]];tbs:lrf:!1m4!1u3!2m2!3m1!1e1!1m4!1u2!2m2!2m1!1e1!2m1!1e2!2m1!1e3!3sIAE,lf:1,lf_ui:2">Alamat  : Desa Mojodeso, Kec Kapas, Kab Bojonegoro</a></li>
            <li><a href="#">Email   : adip@gmail.com</a></li>
            <li><a href="#">Telepon : 0857-9475-36253</a></li>
            <!-- <li><a href="https://wa.me/+6285708987136">Telepon : 0857-9475-36253</a></li> -->
          </ul>
        </div>

      </div>
    </div>
  </div>

  <div class="footer-bottom">
        <div class="container">
          <div class="col-md-6 mx-auto">
          © Copyright 2022 - Team B5 Pengembangan Perangkat Lunak Agroindustri
          </div>
        </div>
</footer>
<!-- Footer -->



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
@include('sweetalert::alert')
</html>