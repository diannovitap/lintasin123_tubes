<html>
<head>
    <title>Lintasin</title>
    <!-- Scripts -->
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/poper.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.js') }}" defer></script>
        <!-- Styles -->
    <link href="{{ asset('bootstrap/css/bootstrap.css') }}" rel="stylesheet">
</head>
<body>
    <main style="background: #FFBE59; height:100%">
        <div class="container">
            <div class="row">
                <div class="col-sm-8" style="margin-top:80px; margin-left:15%;">
                    <div class="card">
                    <div class="card-body p-3" style="background-color: #1ab8aa; border:15px;">
                      <h5 class="mb-2" size="10px" style="text-align:center">REGISTER ADMIN</h5>
                          <hr>
                          <form action="/register-admin-proses" method="POST">
                            @csrf
                            <div class="form-group">
                              <label for="name">Nama Lengkap</label>
                              <input type="text" class="form-control" id="name" name="admin_name" required>
                            </div>
                            <div class="form-group">
                              <label for="email">Email</label>
                              <input type="email" class="form-control" id="email" name="admin_email" placeholder="" required>
                            </div>
                            <div class="form-group">
                              <label for="password1">Password</label>
                              <input type="password" class="form-control" id="password1" name="password1" placeholder="" required>
                            </div>
                            <div class="form-group">
                              <label for="password2">Re-Password</label>
                              <input type="password" class="form-control" id="password2" name="password2" placeholder="" required>
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-dark">Daftar</button>
                                <div class="mt-3">
                                    <a href="/admin" class="link-dark">Kembali</a>
                                </div>
                            </div>
                          </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>