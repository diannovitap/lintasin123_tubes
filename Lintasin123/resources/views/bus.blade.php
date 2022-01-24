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
    @include('navbar')
    <main style="background: #FFBE59; height:100%" >
        <div class="container">
            <div class="row">
                <div class="col-sm-8" style="margin-top:8%; margin-left:15%">
                    <div class="card bg-white text-black p-3">
                        <h4 class="text-center">Reservasi Bus Online</h4>
                        <form method="POST" action="{{ route('search-schedule') }}"> 
                            @csrf 
                            <input type="hidden" name="type" value="bus">
                            @include('deparature-arrival')
                            <div class="form-group">
                                <label for="tanggal">Tanggal Pergi</label>
                                <input type="date" class="form-control" name="date">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-danger btn-lg btn-block">CARI JADWAL</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>