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
    <a class="navbar-brand" href="{{ url('/') }}"><span>Piyantun<span></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav ms-auto">
        <li class="nav-item ms-3">
          <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Home</a>
        </li>

        <a class="btn btn-outline-secondary ms-lg-3" href="{{ url('login') }}" >Masuk</a>
        </li>
      </div>
    </div>
  </div>
</nav>

<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-4">
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
						<!-- <div class="img">
			      </div> -->
						<div class="login-wrap mx-auto p-4 p-md-6">
			      	<div class="d-flex">
			      		<div class="w-100">
                              <!-- <br> -->
			      			<h3 class="mb-4 text-center">Daftar</h3>

							<form method="POST" action="{{ route('register') }}" class="signin-form">
                            @csrf

			      		<div class="form-group mb-3">
			      			<label class="label" for="name">Nama</label>
			      			<input id="name" name="name" type="text" class="form-control  @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Nama" autofocus required>
                              @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
			      		</div>

			      		<div class="form-group mb-3">
			      			<label class="label" for="email">Alamat Email</label>
			      			<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email">
                              @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
			      		</div>
                          
		            <div class="form-group mb-3">
		            	<label class="label" for="password">Password</label>
		              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="current-password">
                      @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
		            </div>

		            <div class="form-group mb-3">
		            	<label class="label" for="password">Konfirmasi Password</label>
		              <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Konfirmasi" required autocomplete="new-password">
		            </div>

                    <div class="form-group mb-3">
			      			<label class="label" for="tempat_lahir">Tempat Lahir</label>
			      			<input id="tempat_lahir" type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" placeholder="Tempat Lahir" name="tempat_lahir" value="{{ old('tempat_lahir') }}" required autocomplete="tempat_lahir">
                              @error('tempat_lahir')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
			      		</div>

                    <div class="form-group mb-3">
			      			<label class="label" for="tanggal_lahir">Tanggal Lahir</label>
			      			<input id="tanggal_lahir" name="tanggal_lahir" type="date" class="form-control  @error('tanggal_lahir') is-invalid @enderror" value="{{ old('tanggal_lahir') }}" placeholder="Tanggal Lahir" autofocus required>
                              @error('tanggal_lahir')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
			      		</div>

                    <div class="form-group mb-3">
			      			<label class="label" for="telepon">Telepon</label>
			      			<input id="telepon" name="telepon" type="text" class="form-control  @error('telepon') is-invalid @enderror" value="{{ old('telepon') }}" placeholder="No Telepon" autofocus required>
                              @error('telepon')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
			      		</div>
               
                    <div class="form-group mb-3">
			      			<label class="label" for="role">Role</label>
			      			<select id="role" name="role" type="text" class="form-select" required>
                            <option value="user">User</option>
                            <option value="admin">Admin</option>
                            </select>
			      		</div>

                          <div class="form-group mb-3">
			      			<label class="label" for="alamat">Alamat</label>
			      			<textarea id="alamat" name="alamat" type="text" class="form-control  @error('alamat') is-invalid @enderror" value="{{ old('alamat') }}" placeholder="Alamat" autofocus required></textarea>
                              @error('alamat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
			      		</div>

                          <div class="form-group mb-3">
			      			<label class="label" for="foto">Foto</label>
			      			<input id="foto" name="foto" type="file" class="form-control-file  @error('foto') is-invalid @enderror" value="{{ old('foto') }}" placeholder="No Telepon" autofocus required>
                              @error('foto')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
			      		</div>

		            <div class="form-group">
		            	<button type="submit" class="form-control btn btn-primary rounded submit px-3">Daftar</button>
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
  </body>
</html>