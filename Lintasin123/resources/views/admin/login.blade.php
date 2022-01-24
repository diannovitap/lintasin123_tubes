<html>
    <head>
        <title>Lintasin</title>
            <!-- Scripts -->
        <script src="{{ asset('js/jquery.js') }}"></script>
        <script src="{{ asset('bootstrap/js/bootstrap.js') }}" defer></script>
            <!-- Styles -->
        <link href="{{ asset('bootstrap/css/bootstrap.css') }}" rel="stylesheet">
        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    </head>
    <style>
        .hide-alert{
            display: none;
        }
    </style>
    <body class="bg-dark text-light">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    @if (session('register-status'))
                        @if (session('register-status') == 'success')
                            <div class="alert alert-success" role="alert" id="alert">
                                Anda berhasil registrasi!
                            </div>
                        @else
                            <div class="alert alert-danger" role="alert" id="alert">
                                Anda gagal registrasi!
                            </div>
                        @endif
                    @endif
                    @if (session('login-status'))
                        @if (session('login-status') == 'success')
                            <div class="alert alert-success" role="alert" id="alert">
                                Login Berhasil!
                            </div>
                        @else
                            <div class="alert alert-danger" role="alert" id="alert">
                                Login Gagal! 
                            </div>
                        @endif
                    @endif
                </div>
                <div class="col-sm-12">
                    <form class="form-signin text-center" method="POST" action="/login-admin-proses" style="margin-top: 10%">
                        @csrf
                        <div class="text-center">
                            <img class="mb-4" src="{{ asset('image/logo.png') }}" alt=""><br>
                            <small><b>ADMIN</b></small>
                        </div>
                        <input type="email" id="inputEmail" name="email" class="form-control mb-1" placeholder="Email address" required autofocus>
                        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
                        <div class="mb-3">Belum punya akun? <a href="/register-admin">Daftar</a></div>
                        <button class="btn btn-lg btn-primary btn-block" type="submit">Masuk</button>
                        <p class="mt-5 mb-3 text-muted">&copy; 2022</p>
                    </form>
                </div>
            </div>
        </div>
    </body>
    <script>
        setInterval(function(){ $('#alert').addClass('hide-alert') }, 2000);
    </script>
</html>