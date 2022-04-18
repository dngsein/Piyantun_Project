@extends('admin.layout')

@section('content')

<link rel="stylesheet" href="{{ asset ('css/profil_admin.css') }}"> 

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

							<form method="POST" action="{{ route('up.profile.admin') }}" class="signin-form">
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
  </body>
</html>
@endsection