<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Auth</title>
    <link rel="shortcut icon" href="img/ijo.png" height="25">
    <link href="mdb/css/bootstrap.min.css" rel="stylesheet" />
    <link href="mdb/css/mdb.min.css" rel="stylesheet" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@300&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
</head>

<body>
    <div class="container">
        <div class="text-center" style="margin: 10% 0 10% 0">
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="card card-cascade wider">
                        <div class="view view-cascade gradient-card-header peach-gradient">
                            <h2 class="card-header-title mb-3">Kode Nuklir</h2>
                            <p class="mb-0 date"></p>
                        </div>
                        <div class="card-body card-body-cascade">
                            @yield('content')
                        </div>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>

    </div>

    <script src="js/jquery.js"></script>
    <script type="text/javascript" src="mdb/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="mdb/js/mdb.min.js"></script>
    <script>
        $(document).ready(()=>{
            
            const todayDate = new Date().toISOString().slice(0, 10);
            $('.date').html(`<i class="fas fa-calendar mr-2"></i> ${todayDate}`)
            // console.log(todayDate)

        })
    </script>
    @stack('new-script')
</body>

</html>