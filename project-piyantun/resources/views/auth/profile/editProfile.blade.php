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
	<link rel="stylesheet" href="{{ asset ('assetLogin/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset ('css/style.css') }}">
    

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

<!-- Form -->


<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-4">
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">

						<div class="login-wrap mx-auto p-4 p-md-6">
			      	<div class="d-flex">
			      		<div class="w-100">
                              <!-- <br> -->
			      			<h3 class="mb-4 text-center">Pembaruan Profile</h3>

							<form method="POST" action="{{ route('up.profile') }}" class="signin-form">
                            @method('PUT')
                            @csrf

			      		<div class="form-group mb-3">
			      			<label class="label" for="name">Nama</label>
			      			<input id="name" name="name" type="text" class="form-control  @error('name') is-invalid @enderror" value="{{ old('name', Auth::user()->name) }}" placeholder="Nama" autofocus required>
                              @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
			      		</div>

			      		<div class="form-group mb-3">
			      			<label class="label" for="email">Alamat Email</label>
			      			<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', Auth::user()->email) }}" placeholder="Email" required autocomplete="email">
                              @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
			      		</div>
                          
                    <div class="form-group mb-3">
			      			<label class="label" for="tempat_lahir">Tempat Lahir</label>
			      			<input id="tempat_lahir" type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" placeholder="Tempat Lahir" name="tempat_lahir" value="{{ old('tempat_lahir', Auth::user()->tempat_lahir) }}" required autocomplete="tempat_lahir">
                              @error('tempat_lahir')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
			      		</div>

                    <div class="form-group mb-3">
			      			<label class="label" for="tanggal_lahir">Tanggal Lahir</label>
			      			<input id="tanggal_lahir" name="tanggal_lahir" type="date" class="form-control  @error('tanggal_lahir') is-invalid @enderror" value="{{ old('tanggal_lahir', Auth::user()->tanggal_lahir) }}" placeholder="Tanggal Lahir" autofocus required>
                              @error('tanggal_lahir')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
			      		</div>

                    <div class="form-group mb-3">
			      			<label class="label" for="telepon">Telepon</label>
			      			<input id="telepon" name="telepon" type="text" class="form-control  @error('telepon') is-invalid @enderror" value="{{ old('telepon', Auth::user()->telepon) }}" placeholder="No Telepon" autofocus required>
                              @error('telepon')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
			      		</div>
               


                          <div class="form-group mb-3">
			      			<label class="label" for="alamat">Alamat</label>
			      			<textarea id="alamat" name="alamat" type="text" class="form-control  @error('alamat') is-invalid @enderror" value="{{ old('alamat') }}" placeholder="Alamat" autofocus required>{{ Auth::user()->alamat }}</textarea>
                              @error('alamat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
			      		</div>

                          

		            <div class="form-group">
		            	<button type="submit" class="form-control btn btn-primary rounded submit px-3 mt-3">Simpan Perubahan</button>
		            </div>
<br>
		          </form>
		        </div>
		      </div>
				</div>
			</div>
		</div>
	</section>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>



  </body>
</html>


<!-- <br>
<br>
<br>
<div class="container">
    <div class="card card-body">
        <form action="{{ route('up.profile') }}" method="POST">

            @csrf
            @method ("PUT")

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" value="{{ Auth::user()->name}}">
                @error('name')
                    <div class="text-danger text-sm">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="{{ Auth::user()->email}}">
            </div>

            <div class="form-group">
                <label for="tempat_lahir">Tempat Lahir</label>
                <input type="text" name="tempat_lahir" id="tempat_lahir" value="{{ Auth::user()->tempat_lahir}}">
            </div>

            <button class="btn btn-primary" type="submit">Simpan Perubahan</button>
        </form>
    </div>
</div> -->
<!-- Form -->
