<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('loginya/fonts/icomoon/style.css') }}">

    <link rel="stylesheet" href="{{ asset('loginya/css/owl.carousel.min.css') }}">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset ('loginya/css/bootstrap.min.css') }}">
    
    <!-- Style -->
    <link rel="stylesheet" href="{{ asset ('loginya/css/style.css') }}">

    <title>Login #3</title>
  </head>
  <body>
  

  <div class="half">
    <div class="bg order-1 order-md-2" style="background-image: url('images/bg_1.jpg');"></div>
    <!-- <div class="bg order-1 order-md-2" style="background-image: {{ asset ('loginya/images/bg_1.jpg') }}"></div> -->
    <div class="contents order-2 order-md-1">

      <div class="container">
        <div class="row align-items-center justify-content-center">
          <div class="col-md-6">
            <div class="form-block">
              <div class="text-center mb-5">
              <h3>Login to <strong>Colorlib</strong></h3>
              <!-- <p class="mb-4">Lorem ipsum dolor sit amet elit. Sapiente sit aut eos consectetur adipisicing.</p> -->
              </div>
              <form action="{{ route('login') }}" method="post">
                {{ csrf_field() }}

                <div class="form-group first">
                  <label for="email">Username</label>
                  <input type="email" class="form-control" placeholder="your-email@gmail.com" name="email" id="email" autofocus>
                </div>
                <div class="form-group last mb-3">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" placeholder="Your Password" name="password" id="password">
                </div>
                
                <div class="d-sm-flex mb-5 align-items-center">
                  <label class="control control--checkbox mb-3 mb-sm-0"><span class="caption">Remember me</span>
                    <input type="checkbox" checked="checked"/>
                    <div class="control__indicator"></div>
                  </label>
                  <span class="ml-auto"><a href="#" class="forgot-pass">Forgot Password</a></span> 
                </div>

                <input type="submit" value="Log In" class="btn btn-block btn-primary">

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    
  </div>
    
    
    <script src="{{ asset ('loginya/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset ('loginya/js/popper.min.js') }}"></script>
    <script src="{{ asset ('loginya/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset ('loginya/js/main.js') }}"></script>
  </body>
</html>