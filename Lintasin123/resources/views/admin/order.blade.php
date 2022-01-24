<html>
<head>
    <title>Lintasin</title>
    <!-- Scripts -->
    <script src="{{ asset('js/style.js') }}"></script>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/poper.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.js') }}" defer></script>
        <!-- Styles -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('bootstrap/css/bootstrap.css') }}" rel="stylesheet">
</head>
<style>
    .hide-alert{
        display: none;
    }
</style>
<body class="bg-dark text-light">
<div id="wrapper" class="active">  
    @include('admin.navbar-admin')
    <div class="contianer">
        <div class="row p-3">
            <div class="col-sm-12">
                @if (session('status'))
                    @if (session('status') == 'success')
                        <div class="alert alert-success" role="alert" id="alert">
                            Berhasil!
                        </div>
                    @else
                        <div class="alert alert-danger" role="alert" id="alert">
                            Gagal! Cek kembali Data!
                        </div>
                    @endif
                @endif
            </div>
            <div class="col-sm-12 m-2">
                <label style="float: left; font-weight: bold;">Pesanan</label>
            </div>
            <div class="col-sm">
                <table class="table table-hover bg-light">
                    <thead>
                      <tr>
                        <th scope="col">No</th>
                        <th scope="col">Pemesan</th>
                        <th scope="col">Nomor Telepon</th>
                        <th scope="col">Email</th>
                        <th scope="col">Kendaraan</th>
                        <th scope="col">Tipe Kendaraan</th>
                        <th scope="col">Tempat Duduk</th>
                        <th scope="col">Jam Keberangkatan</th>
                        <th scope="col">Tanggal Keberangkatan</th>
                        <th scope="col">Total Harga</th>
                        <th scope="col">Status Pembayaran</th>
                        <th scope="col">Bukti Pembayaran</th>
                        <th scope="col">Konfirmasi Pesanan</th>
                      </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($data as $item)
                            <tr>
                                <td scope="row">{{$no++ }}</td>
                                <td>{{ $item->order_name }}</td>
                                <td>{{ $item->order_phone }}</td>
                                <td>{{ $item->order_email }}</td>
                                <td>{{ $item->order_bus }}</td>
                                <td>{{ $item->order_bus_type }}</td>
                                <td>{{ $item->order_bus_seat }}</td>
                                <td>{{ $item->order_bus_time_departure }}</td>
                                <td>{{ $item->order_bus_date_departure }}</td>
                                <td>{{ $item->order_total_price }}</td>
                                <td>
                                    @if ($item->order_payment_slip != null)
                                        <span class="badge badge-pill badge-success">Sudah Bayar</span>
                                    @else
                                        <span class="badge badge-pill badge-secondary">Belum Bayar</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($item->order_payment_slip != null)
                                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#gambar{{ $no }}"><small>Bukti Pembayaran</small></button>
                                    @else
                                        
                                    @endif
                                    {{-- DETAIL KONFIRMASI  --}}
                                    <div class="modal fade text-dark" id="gambar{{ $no }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Bukti Pembayaran</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <div class="modal-body">
                                                @if ($item->order_payment_slip != null)
                                                    <div class="text-center">
                                                        <img src="{{ asset('payment_slip/'.$item->order_payment_slip.'') }}" style="max-width: 400px">    
                                                    </div>                                        
                                                @else
                                                    <!-- Pemesan belum melakukan Pembayaran -->
                                                @endif
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    @if ($item->order_payment_slip != null)
                                        @if ($item->payment_status == null)
                                            <form action="set-confrim" method="POST">
                                                @csrf
                                                <input type="hidden" name="order_id" value="{{ $item->order_id }}">
                                                <button type="submit" class="btn btn-primary btn-sm">Konfirmasi</button>
                                            </form>
                                        @else
                                        <span class="badge badge-pill badge-success">Confirmed</span>
                                        @endif
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</div>
</body>
<script>
    setInterval(function(){ $('#alert').addClass('hide-alert') }, 2000);
</script>
</html>