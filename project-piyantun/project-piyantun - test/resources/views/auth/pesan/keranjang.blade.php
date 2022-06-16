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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
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
                    <li><a class="dropdown-item" href="{{ url('profile') }}"><i class="bi bi-person"></i><span class="ms-4">Profil</span></a></li>

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

                        <form class="contact100-form validate-form" id="whatsapp">      
                            <input hidden class="tujuan" type="hidden" id="noAdmin">  
                            <input hidden class="input100 keterangan" type="text" value="-----Pemesanan------">
                            <input hidden class="input100 nama" type="text" value="{{ Auth::user()->name }}">
                            <input hidden class="input100 id_pemesanan" type="text" value="{{ $pesanan->id }}">
                            <input hidden class="input100 tanggal" type="text" value="{{ $pesanan->tanggal_pemesanan }}">
                            <input hidden class="input100 total_harga" value="Rp. {{  number_format($pesanan->jumlah_harga) }}">
                            <textarea hidden class="input100 produk">
                            @foreach ($detail as $detail_pemesanan)
                            {{$detail_pemesanan->nama_produk}} -> {{$detail_pemesanan->jumlah_pemesanan}} item
                            @endforeach
                            </textarea>
                            <textarea hidden class="input100 alamat">{{ Auth::user()->alamat }}</textarea>
                            <div class="card-footer bg-white text-end">
                                <a class="btn btn-primary  profile-button form-btn submit">Bayar Sekarang</a>
                            </div>
                        </form>

                    @endif
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

<script>
  //no wa admin
$("#noAdmin").val("085708987136");
$('.whatsapp-btn').click(function() {
  $('#whatsapp').toggleClass('toggle');
});
// klik kirim
$('#whatsapp .submit').click(WhatsApp);
$("#whatsapp input, #whatsapp textarea").keypress(function() {
  if (event.which == 13) WhatsApp();
});
var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

function WhatsApp() {
  var ph = '';
  if ($('#whatsapp .nama').val() == '') { // Cek Nama
    ph = $('#whatsapp .nama').attr('placeholder');
    alert('Silahkan tulis ' + ph);
    $('#whatsapp .nama').focus();
    return false;
  } else if ($('#whatsapp .tanggal').val() == '') { // Cek Whatsapp
    ph = $('#whatsapp .tanggal').attr('placeholder');
    alert('Silahkan tulis ' + ph);
    $('#whatsapp .tanggal').focus();
    return false;
  } else if ($('#whatsapp .total_harga').val() == '') { // Cek harga
    ph = $('#whatsapp .total_harga').attr('placeholder');
    alert('Silahkan tulis ' + ph);
    $('#whatsapp .total_harga').focus();
    return false;
  } else if ($('#whatsapp .keterangan').val() == '') { // Cek keterangan
    ph = $('#whatsapp .keterangan').attr('placeholder');
    alert('Silahkan tulis ' + ph);
    $('#whatsapp .keterangan').focus();
    return false;
  } else if ($('#whatsapp .id_pemesanan').val() == '') { // Cek id
    ph = $('#whatsapp .id_pemesanan').attr('placeholder');
    alert('Silahkan tulis ' + ph);
    $('#whatsapp .id_pemesanan').focus();
    return false;
  } else if ($('#whatsapp .alamat').val() == '') { // Cek Alamat
    ph = $('#whatsapp .alamat').attr('placeholder');
    alert('Silahkan tulis ' + ph);
    $('#whatsapp .alamat').focus();
    return false;
  } else if ($('#whatsapp .produk').val() == '') { // Cek produk
    ph = $('#whatsapp .produk').attr('placeholder');
    alert('Silahkan tulis ' + ph);
    $('#whatsapp .produk').focus();
    return false;
  } else {
    // Check Device (Mobile/Desktop)
    var url_wa = 'https://web.whatsapp.com/send';
    if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
      url_wa = 'whatsapp://send/';
    }
    // Get Value
    var tujuan = $('#whatsapp .tujuan').val(),
      
      produk = $('#whatsapp .produk').val(),
      alamat = $('#whatsapp .alamat').val(),
      keterangan = $('#whatsapp .keterangan').val(),
      nama = $('#whatsapp .nama').val(),
      id_pemesanan = $('#whatsapp .id_pemesanan').val(),
      tanggal = $('#whatsapp .tanggal').val(),
      total_harga = $('#whatsapp .total_harga').val();
    $(this).attr('href', url_wa + '?phone=62 ' + tujuan + '&text= ' + keterangan + '%0ANama : ' + nama + ' %0AID Pemesanan : ' + id_pemesanan  + ' %0ATanggal: ' + tanggal + ' %0AProduk :' + produk  + '%0A%0ATotal Harga : ' + total_harga + '%0AAlamat : ' + alamat);
    var w = 960,
      h = 540,
      left = Number((screen.width / 2) - (w / 2)),
      tops = Number((screen.height / 2) - (h / 2)),
      popupWindow = window.open(this.href, '', 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=1, copyhistory=no, width=' + w + ', height=' + h + ', top=' + tops + ', left=' + left);
    popupWindow.focus();
    return false;
  }
}
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>