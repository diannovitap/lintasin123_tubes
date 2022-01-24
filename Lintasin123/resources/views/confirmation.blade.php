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
                    <div class="card text-center">
                        <div class="card-header">
                          <b>PEMBAYARAN</b>
                        </div>
                        <div class="card-body">
                          <small class="card-title">Silahkan Transfer ke Virtual Account dibawah ini</small>
                          <h3 class="card-text">1301-2090-2245</h3>
                          <h5>Nominal Rp.{{ number_format($total_price) }}</h5>  
                        </div>
                        <div class="card-footer text-muted">
                            <small>Jika sudah bayar mohon upload Bukti Transfer</small><br>
                            <form class="form-group" method="POST" action="{{ route('upload-process') }}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ $user_id }}">
                                <input type="hidden" name="order_id" value="{{ $order_id }}">
                                <input type="file" class="form-control" name="paymentSlip" accept=".jpg, .jpeg, .png, .svg"><br>
                                <button type="submit" href="#" class="btn btn-primary"> Upload Bukti Transfer</button> 
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>