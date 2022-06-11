<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kode Nuklir</title>
    <link rel="shortcut icon" href="img/ijo.png" height="25">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@300&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <link href="mdb/css/bootstrap.min.css" rel="stylesheet" />
    <link href="mdb/css/mdb.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
</head>

<body>

    <div class="preloader">
        <div class="loading">
            <img src="{{ asset('img/loading.gif') }}" width="80">
        </div>
    </div>

    <div class="row p-2 mb-4 mx-3">
        <div class="col">
            <h4>
                <a href="/">
                    <img src="{{ asset('img/logo.png') }}" height="40px" alt="logo" />
                </a>
                Kode Nuklir
            </h4>
        </div>
    </div>

    @yield('content')

    <footer class="bg-dark text-white">
        <div class="author"></div>
    </footer>

    <script src="js/jquery.js"></script>
    <script type="text/javascript" src="mdb/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="mdb/js/mdb.min.js"></script>

    <script>
        $(document).ready(()=>{
            $(".preloader").fadeOut();
            $(".author").html(`kode-nuklir @amiminn |🥳${new Date().getFullYear()}`);
            $('#log').click(()=>alert('jangan diklik!'))
        })
    </script>
    @stack('new-script')
</body>

</html>