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
<style>
    .hide-alert {
        display: none;
    }
</style>
<body style="background: #FFBE59;">
    @include('navbar')
    <main>
        @if (session('status'))
            @if (session('status') == 'success')
                <div class="alert alert-success" role="alert" id="alert">
                    Berhasil Update Profile!
                </div>
            @else
                <div class="alert alert-danger" role="alert" id="alert">
                    Gagal Update Profile!
                </div>
            @endif
        @endif
        <div class="container">
            <div class="row">
                <div class="col-sm-8" style="margin-top:8%; margin-left:15%">
                    <form method="POST" action="{{ route('profile-update') }}">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ $user->user_id }}">
                        <div class="card bg-white text-black p-3">
                            <h4 class="text-center">Profile</h4>
                            <hr>
                            <div class="container form-group">
                                <div class="row">
                                    <div class="col-sm-3">
                                        Nama Lengkap
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="user_name" value="{{ $user->user_full_name }}" required>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-sm-3">
                                        Tanggal Lahir
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="date" class="form-control" name="user_date" value="{{ $user->user_born_date }}">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-sm-3">
                                        Alamat
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="user_address" value="{{ $user->user_address }}">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-sm-3">
                                        Nomor Telepon
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="user_phone" value="{{ $user->user_phone }}">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-sm-3">
                                        Email
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="mail" class="form-control" name="user_email" value="{{ $user->user_email }}" required>
                                    </div>
                                </div>
                                <hr>
                                <div class="row mt-3">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">Update</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>
<script>
    setInterval(function(){ $('#alert').addClass('hide-alert') }, 2000);
</script>
</html>