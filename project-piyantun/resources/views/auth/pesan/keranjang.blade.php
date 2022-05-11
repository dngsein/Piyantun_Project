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
	
    <!-- Required Extention -->
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    
    <!-- CSS Style -->
	<link rel="stylesheet" href="{{ asset ('assetLogin/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset ('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset ('css/style_detail.css') }}">

    <title>Piyantun</title>
    <link rel="shortcut icon" href="https://thumbs.dreamstime.com/b/print-163361306.jpg">
  </head>
  <body>
 <!-- Navbar  -->
 <nav class="navbar navbar-expand-lg py-2 fixed-top navbar-light mb-4">
  <div class="container-xl">
    <a class="navbar-brand" href="{{ url('home') }}"><span>Piyantun<span></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav ms-auto">
        <li class="nav-item ms-3">
          <a class="nav-link active" aria-current="page" href="{{ url('home') }}">Home</a>
        </li>
        <li class="nav-item ms-3">
          <a class="nav-link active" aria-current="page" href="{{ url('home#produk') }}">Produk</a>
        </li>
        <li class="nav-item ms-2 dropdown">
                <a class="btn dropdown-toggle text-dark" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                {{ Auth::user()->name }} <span class="caret"></span>
                </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <li><a class="dropdown-item" href="{{ url('profile') }}"><i class="bi bi-person"></i><span class="ms-3">Profile Saya</span></a></li>
                    <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="bi bi-box-arrow-right"></i><span class="ms-3">Keluar</span></a></li>
                </ul>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>

            </li>   
      </div>
    </div>
  </div>
</nav>
<!-- Navbar -->

<div class="container-xxl">
        <div class="card card-img border-white">
            <div class="container-fliud">
                <div class="wrapper row">
                    <div class="preview col-md-6">
                        
                    @foreach ($detail as $pm)
      <h6>{{$pm}}</h6>
      

<!-- 
      @if(empty($pesanan))
      <h6>data kosong</h6>
      
      @else
      <h6>{{$pesanan}}</h6>
      @endif -->

      @endforeach

                         <br>
                                     
                          <div class="action mt-4">
                              <button class="add-to-cart btn btn-default" type="submit">Beli Sekarang</button>
                          </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>