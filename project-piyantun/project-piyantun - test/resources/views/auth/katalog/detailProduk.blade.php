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
<section class="detail">

<div class="container-xxl">
        <div class="card card-img border-white">
            <div class="container-fliud">
                <div class="wrapper row">
                    <div class="preview col-md-6">
                        
            
            @if ($product->product_images->first())
            <img id=featured src="{{ asset ('storage/uploads/gambar_produk/'. $product->product_images->first()->path) }}" alt="{{ $product->nama}}">
            @else
            <img id=featured src="{{ asset ('img/aw-snapp.jpg') }}" alt="{{ $product->nama}}">
            @endif

            <div  id="slide-wrapper" >
                <img id="slideLeft" class="arrow" src="{{ asset ('img/arrow-left.png') }}">
                @foreach ($product->product_images as $image)
                <div class="mt-3" id="slider">
                    <img class="thumbnail active" src="{{ asset ('storage/uploads/gambar_produk/'. $image->path) }}">
                </div>
                @endforeach

                <img id="slideRight" class="arrow" src="{{ asset ('img/arrow-right.png') }}">
            </div>
                        
                    </div>
                    <div class="details col-md-6">
                      <form method="POST" action="{{ url ('produk/'. $product->id.'/pesan') }}" class="signin-form ">
                        <h3 class="product-title">{{ $product->nama }}</h3>
                        
                       
                        <p class="vote"><strong>Deskripsi</strong></p>
                        <p class="product-description">{{ $product->detail }}</p>
                        <h4 class="price">Harga : <span>Rp.  {{ number_format ($product->harga) }}</span></h4>
                        <h5   class="mb-3" ><strong>Berat : </strong> {{ $product->berat}} Kg</h5>
                        
                            @csrf
                            <div class="col-md-4"></div>
                            <div class="form-group mb-3">
			      			<label for="jumlah_pesanan">Pesanan</label>
			      			<input style="width: 200px;" height="50" id="jumlah_pesanan" name="jumlah_pesanan" type="number" class="form-control  @error('jumlah_pesanan') is-invalid @enderror" value="1" min="1" required>
                              @error('jumlah_pesanan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
			      		  </div>

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
</section>




	<script type="text/javascript">
		let thumbnails = document.getElementsByClassName('thumbnail')

		let activeImages = document.getElementsByClassName('active')

		for (var i=0; i < thumbnails.length; i++){

			thumbnails[i].addEventListener('mouseover', function(){
				console.log(activeImages)
				
				if (activeImages.length > 0){
					activeImages[0].classList.remove('active')
				}
				

				this.classList.add('active')
				document.getElementById('featured').src = this.src
			})
		}


		let buttonRight = document.getElementById('slideRight');
		let buttonLeft = document.getElementById('slideLeft');

		buttonLeft.addEventListener('click', function(){
			document.getElementById('slider').scrollLeft -= 180
		})

		buttonRight.addEventListener('click', function(){
			document.getElementById('slider').scrollLeft += 180
		})


	</script>

</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>