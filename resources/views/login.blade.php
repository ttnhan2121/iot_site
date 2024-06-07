<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
</head>
<body>
    <form action="{{ action('App\Http\Controllers\LoginController@postLogin') }}"  method="post">
        @csrf
        <section class="vh-100" style="background-color: #508bfc;">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                        <div class="card shadow-2-strong" style="border-radius: 1rem;">
                            <div class="card-body p-5 text-center">
                                <h3 class="mb-5">Sign in</h3>
                                <div data-mdb-input-init class="form-outline mb-4">
                                    <input type="text" name="username" class="form-control form-control-lg" placeholder="Username"/>
                                </div>
                                <div data-mdb-input-init class="form-outline mb-4">
                                    <input type="password" name="password" class="form-control form-control-lg" placeholder="Password"/>
                                </div>
                                @if(Session::has('msg'))
                                    <div class="alert alert-danger my-3 " role="alert">
                                        <p class="m-0">
                                            <i class="fa-solid fa-xmark"></i>
                                            {!! Session::get('msg') !!}
                                        </p>
                                    </div>
                                @endif
                                <button data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg btn-block" type="submit">Login</button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>
</body>
</html>


<script>
    $(document).ready(function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('.btnLogin').click(function (){
            $.ajax({
                url: "{{ action('App\Http\Controllers\LoginController@postLogin') }}",
                type: "POST",
                data: {
                    'username': $('.username').val(),
                    'password': $('.password').val(),
                },
                success: function (result) {}
            });
        });


    });

</script>
