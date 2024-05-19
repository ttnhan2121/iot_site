<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <style>

    </style>
</head>
<body>
    <div class="bg-light">
        <div class="row g-2">
            <div class="col-xl-2 d-sm-none d-md-block bg-white shadow vh-100 rounded-end-4 p-3" style="border-radius: 0 20px 20px 0">
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <h1>Smart Home</h1>
                        </div>
                        <a href="{{action('App\Http\Controllers\DashboardController@getView')}}" class="text-decoration-none text-black">
                            <div class="row my-2 border border-dark p-2 m-1 rounded-4">
                                <div class="d-flex">
                                <span class="material-symbols-outlined">
                                dashboard
                                </span>
                                    <span class="ps-3">Dashboard</span>
                                </div>
                            </div>
                        </a>
                        <a href="" class="text-decoration-none text-black">
                            <div class="row my-2 border border-dark p-2 m-1 rounded-4">
                                <div class="d-flex">
                                <span class="material-symbols-outlined">
                                monitoring
                                </span>
                                    <span class="ps-3">Dashboard</span>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-10">
                <div class="p-5">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</body>
<script>
</script>
@yield('script')
</html>
