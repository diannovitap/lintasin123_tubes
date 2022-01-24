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
    .show-modal {
        display: block;
    }
</style>
<body style="background: #FFBE59;">
    @include('navbar')
    <main>
        @if (session('status'))
            @if (session('status') == 'success')
                <div class="modal fade show-modal show bg-dark" tabindex="-1" id="modal-sukses">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">SUKSES</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="$('#modal-sukses').removeClass('show-modal')">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>Transaksi Berhasil!</p>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="alert alert-danger" role="alert" id="alert">
                    Gagal Update Profile! 
                </div>
            @endif
        @endif
        <div class="container">
            <div class="row">
                <table class="table table-dark table-responsive mt-4">
                    <thead>
                        <tr>
                        <th scope="col">No</th>
                        <th scope="col">Pemesan</th>
                        <th scope="col">Nomor Telepon</th>
                        <th scope="col">Email</th>
                        <th scope="col">Kendaraan</th>
                        <th scope="col">Tipe Kendaraan</th>
                        <th scope="col">Tempat Duduk</th>
                        <th scope="col">Jam, Tanggal Berangkat</th>
                        <th scope="col">Total Harga</th>
                        <th scope="col">Tanggal Pesan</th>
                        {{-- <th scope="col">Status</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;  
                        @endphp
                        @foreach ($orders as $item)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->order_name }}</td>
                                <td>{{ $item->order_phone }}</td>
                                <td>{{ $item->order_email }}</td>
                                <td>{{ $item->order_bus }}</td>
                                <td>{{ $item->order_bus_type }}</td>
                                <td>{{ $item->order_bus_seat }}</td>
                                <td>{{ $item->order_bus_time_departure }}, {{ $item->order_bus_date_departure }}</td>
                                <td>{{ $item->order_total_price }}</td>
                                <td>{{ $item->created_at }}</td>
                                {{-- @if ($item->order_payment_slip != NULL)
                                    <td><span class="badge badge-success">Lunas</span></td>
                                @else
                                    <td><a href="#" ><span class="badge badge-danger">Belum Lunas</span></a></td>
                                @endif --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>
</html>