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
                <div class="col-sm-6">
                    @if ($order->payment_status != null)
                        <div class="modal modal-dialog-centered" tabindex="-1" id="myModal">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Payment</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                    <div class="modal-body">
                                        Pembayaran Berhasil!
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                    <div class="card text-center">
                        <div class="card-header">
                            <b>PEMBAYARAN</b>
                        </div>
                        <div class="card-body">
                            <img src="{{ asset('spinner.gif') }}"> <br>
                            <h3 class="card-text">Pembayaran Sedang Di Proses</h3>
                        </div>
                        <div class="card-footer text-muted">
                            <small>Mohon tunggu pembayaran sedang di proses oleh Admin</small><br>
                        </div>
                    </div>
                    @endif
                    <input type="hidden" id="ps" value="{{ isset($order->payment_status) ? $order->payment_status : 0 }}">
                </div>
            </div>
        </div>
    </main>
</body>
<script>
    $(window).on('load', function() {
        $('#myModal').modal('show');
    });

    var ps = $('#ps').val();
    console.log(ps);
    if (ps == '0') {
        setTimeout(function(){
            window.location.reload(1);
        }, 5000);
    } else {
        console.log('Payment Success!');
    }
</script>
</html>