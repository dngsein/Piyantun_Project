<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title>Piyantun</title>
  <link rel="shortcut icon" href="https://thumbs.dreamstime.com/b/print-163361306.jpg">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  

  <!-- GOOGLE FONTS -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500|Poppins:400,500,600,700|Roboto:400,500" rel="stylesheet" />
  <link href="https://cdn.materialdesignicons.com/3.0.39/css/materialdesignicons.min.css" rel="stylesheet" />

  <!-- PLUGINS CSS STYLE -->
  <link href="{{ URL::asset('assetDashboard/plugins/nprogress/nprogress.css') }}" rel="stylesheet" />

  <!-- No Extra plugin used -->
  <link href="{{ URL::asset('assetDashboard/plugins/jvectormap/jquery-jvectormap-2.0.3.css') }}" rel="stylesheet" />
  <link href="{{ URL::asset('assetDashboard/plugins/daterangepicker/daterangepicker.css') }}" rel="stylesheet" />
  <link href="{{ URL::asset('assetDashboard/plugins/toastr/toastr.min.css') }}" rel="stylesheet" />
  
  <!-- SLEEK CSS -->
  <link id="sleek-css" rel="stylesheet" href="{{ URL::asset('assetDashboard/css/sleek.css') }}" />

  <!-- FAVICON -->
  <script src="{{ URL::asset('assetDashboard/plugins/nprogress/nprogress.js') }}"></script>
</head>

<body class="header-fixed sidebar-fixed sidebar-dark header-light" id="body">  

  <div class="mobile-sticky-body-overlay"></div>
        <div class="wrapper">
            @include('admin.partials.sidebar')
            
            <div class="page-wrapper">
                @include('admin.partials.header')
                <div class="content-wrapper">
                    @yield('content')
                </div>
            </div>
        </div>

<script src="{{ URL::asset('assetDashboard/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ URL::asset('assetDashboard/plugins/slimscrollbar/jquery.slimscroll.min.js') }}"></script>
<script src="{{ URL::asset('assetDashboard/plugins/jekyll-search.min.js') }}"></script>
<script src="{{ URL::asset('assetDashboard/plugins/charts/Chart.min.js') }}"></script>
<script src="{{ URL::asset('assetDashboard/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js') }}"></script>
<script src="{{ URL::asset('assetDashboard/plugins/jvectormap/jquery-jvectormap-world-mill.js') }}"></script>
<script src="{{ URL::asset('assetDashboard/plugins/daterangepicker/moment.min.js') }}"></script>
<script src="{{ URL::asset('assetDashboard/plugins/daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ URL::asset('assetDashboard/plugins/toastr/toastr.min.js') }}"></script>
<script src="{{ URL::asset('assetDashboard/js/sleek.bundle.js') }}"></script>
</body>
</html>