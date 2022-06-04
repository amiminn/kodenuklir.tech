<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kode Nuklir</title>
    <link rel="shortcut icon" href="img/ijo.png" height="25">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.1.0/mdb.min.css" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@300&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
</head>

<body>

    <div class="preloader">
        <div class="loading">
            <img src="{{ asset('img/loading.gif') }}" width="80">
        </div>
    </div>


    <div class="p-2 mb-3 mx-3">
        <h4 class="d-inline">
            <img src="{{ asset('img/logo.png') }}" height="40px" alt="logo" />
            Kode Nuklir
        </h4>
        <a href="#" id="log" class="btn bg-1 sdw-btn d-inline float-end">gwehj</a>
    </div>

    @yield('content')

    <footer class="bg-dark text-white">
        <div class="author"></div>
    </footer>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.1.0/mdb.min.js"></script>
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