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

    <link rel="stylesheet" href="{{ asset ('css/style_detail.css') }}">

<link rel="stylesheet" href="{{ asset ('css/profile.css') }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

    <title>Piyantun</title>
    <link rel="shortcut icon" href="https://thumbs.dreamstime.com/b/print-163361306.jpg">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-bar-rating/1.2.2/themes/fontawesome-stars.min.css" integrity="sha512-UvAQolpyYameV9OFfNVAstakl6LZLNL8BYGsgaM8aO1t19TVY3VYwbcib0DyrvuIwaTt9va5yR5kOZs7hdZK0A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .br-theme-fontawesome-stars .br-widget a{font-size: x-large;}
    </style>
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
            <a class="nav-link active" aria-current="page" href="{{ url('home') }}">Home</a>
            </li>

            <li class="nav-item ms-3">
            <a class="nav-link" href="{{ url('home#produk') }}">Produk</a>
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
                    <span>Keranjang</span></a></li>

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
              <h3>Riwayat Pemesanan</h3>
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
                  <thead class="table-primary">
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Total Pembayaran</th>
                    <th>Status</th>
                    <th class="text-center">Action</th>
                  </thead>
                  <tbody>
                    <?php $nomer = 1?>
                    @forelse ($pesanan as $pemesanan)
                    <tr>
                      <td>{{ $nomer++ }}</td>
                      <td>{{ $pemesanan->tanggal_pemesanan }}</td>

                      <td>Rp. {{ number_format($pemesanan->jumlah_harga) }}</td>
                      <td>{{ $pemesanan->status_pemesanan }}</td>

                      @if($pemesanan->status_pemesanan == 'diterima')
                        @if(empty($pemesanan->review))
                            <td align="center">
                                <button type="button" class="btn btn-success btn-sm btn_review" data-id="{{$pemesanan->id}}">Add Review</button>
                            </td>
                        @else
                            <td>
                                @php $review = $pemesanan->review; @endphp
                                <p class="mb-0">Rasa : @foreach(range(1,$review->rating_rasa) as $r) <i class="fa fa-star text-warning"></i> @endforeach</p>
                                <p class="mb-0">Manfaat : @foreach(range(1,$review->rating_manfaat) as $r) <i class="fa fa-star text-warning"></i> @endforeach</p>
                                <p class="mb-0">{{$review->ulasan}}</p>
                            </td>
                        @endif
                    @else
                        <td align="center">
                            <a href="{{ url('riwayat-pemesanan/'. $pemesanan->id .'/edit') }}" class="btn btn-info btn-sm">Terima</a>
                        </td>

                      @endif

                    </tr>
                    @empty
                    <tr>
                      <td colspan="5">No Record Found</td>
                    </tr>
                    @endforelse
                  </tbody>
                    </table>
                    @endif


                    </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="modal" tabindex="-1" id="modal_review" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Review</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('riwayatPemesanan.rating')}}" method="POST" id="form_rating">
            @csrf
            <input type="hidden" name="pesanan_id" id="pesanan_id" required>
              <div class="form-group">
                  <label>Rating Rasa</label>
                  <select name="rasa" class="ratting" id="rate_rasa">@foreach(range(1,5) as $r)<option value="{{$r}}">{{$r}}</option>@endforeach</select>
                </div>
                <p></p>
                <div class="form-group">
                    <label>Rating Manfaat</label>
                    <select name="manfaat" class="ratting" id="rate_rasa">@foreach(range(1,5) as $r)<option value="{{$r}}">{{$r}}</option>@endforeach</select>
                </div>
                <p></p>
              <div class="form-group">
                  <label>Ulasan</label>
                  <textarea name="ulasan" placeholder="Ulasan" rows="7" class="form-control" required></textarea>
              </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="submit" form="form_rating" class="btn btn-primary">Simpan</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
@include('sweetalert::alert')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-bar-rating/1.2.2/jquery.barrating.min.js" integrity="sha512-nUuQ/Dau+I/iyRH0p9sp2CpKY9zrtMQvDUG7iiVY8IBMj8ZL45MnONMbgfpFAdIDb7zS5qEJ7S056oE7f+mCXw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $('.btn_review').on('click', function(){
        var id = $(this).data('id');
        $('#pesanan_id').val(id);
        $('#modal_review').modal('show');
    });
    $('.ratting').barrating({ theme: 'fontawesome-stars' });
</script>
</body>
</html>
