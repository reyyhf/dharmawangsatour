<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
    <title>Halaman Login</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <!-- VENDOR CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/linearicons/style.css') }}">
    <!-- MAIN CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/css/main.css') }}">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
    <!-- ICONS -->
    <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
</head>

<body>

    <!-- Preloader -->
    <div class="spinner-wrapper">
        <div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>
    <!-- end of preloader -->

    <!-- Notifikasi -->
    @if (session('sukses'))
    <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                aria-hidden="true">×</span></button>
        <i class="fa fa-check-circle"></i> {{ session('sukses') }}
    </div>
    @endif

    <!-- WRAPPER -->
    <div id="wrapper">
        <div class="vertical-align-wrap">
            <div class="vertical-align-middle">
                <div class="auth-box ">
                    <div class="left">
                        <div class="content">
                            <div class="header">
                                <div class="logo text-center">
                                    <a href="/">
                                        <img src="{{ asset('assets/img/logo-dt.png') }}" alt="DT Logo" style="max-height: 70px">
                                    </a>
                                </div>
                                <p class="lead" style="font-weight:bold">Menu Login</p>
                            </div>
                            <form class="form-auth-small" method="POST" action="/postlogin">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="signin-email" class="control-label sr-only">Username</label>
                                    <input name="name" type="text" class="form-control" id="signin-email"
                                        placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <label for="signin-password" class="control-label sr-only">Password</label>
                                    <input name="password" type="password" class="form-control" id="signin-password"
                                        placeholder="Password">
                                </div>
                                @if (session('gagal'))
                                <p class="text-danger text-center">
                                    Username atau Password salah!
                                </p>
                                @endif
                                <button type="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>
                                <br>
                                <div class="text-center">
                                    <p>Belum punya akun? <a href="/#request" >Daftar di sini!</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="right">
                        <div class="overlay"></div>
                        <div class="content text">
                            <h1 class="heading">Admin Page</h1>
                            <p>Dharmawangsa Tour</p>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- END WRAPPER -->



    <!-- Scripts -->
    <script src="assets/frontend/js/jquery.min.js"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
    <script src="assets/frontend/js/bootstrap.min.js"></script> <!-- Bootstrap framework -->
    <script src="assets/frontend/js/scripts.js"></script> <!-- Custom scripts -->

    
</body>

</html>