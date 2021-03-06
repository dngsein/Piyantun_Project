<!doctype html>
    <html lang="en">
        <head>
            <!-- Required meta tags -->
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            
            <!-- Bootstrap CSS -->
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
            
            <title>Piyantun</title>
            <link rel="shortcut icon" href="https://thumbs.dreamstime.com/b/print-163361306.jpg">
        </head>
        <body>
            <div class="container">

                <h1>Header</h1>
                <hr>
            
                @yield('content')
            
                <hr>
                <h1>Footer</h1>

            </div>
    <script>
        $(".delete").on("submit", function() {
        return confirm("You sure wanna remove?");
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
  @include('sweetalert::alert')
</html>