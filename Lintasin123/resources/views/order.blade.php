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
                <div class="col-sm-2"></div>
                <div class="col-sm-8">
                    <div class="card bg-dark text-light mt-3">
                        <div class="card-body">
                            @if ($type == 'shuttle')
                                <form method="POST" class="mt-3" action="{{ route('do-pay') }}">
                                    @csrf
                                    <input type="hidden" name="type" value="{{ $type }}">
                                    <input type="hidden" name="user_id" value="{{ $user->user_id }}">
                                    <input type="hidden" name="user_name" value="{{ $user->user_full_name }}">
                                    <input type="hidden" name="user_phone" value="{{ $user->user_phone }}">
                                    <input type="hidden" name="user_email" value="{{ $user->user_email }}">
                                    <input type="hidden" name="shuttle_name" value="{{ $dataOrder->shuttle_name }}">
                                    <input type="hidden" name="shuttle_type" value="{{ $dataOrder->shuttle_type }}">
                                    <input type="hidden" name="shuttle_price" value="{{ $dataOrder->shuttle_price }}">
                                    <input type="hidden" name="shuttle_time" value="{{ $dataOrder->shuttle_time_departure }}">
                                    <input type="hidden" name="shuttle_date" value="{{ $dataOrder->shuttle_date_departure }}">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-sm-12 text-center">
                                                <h3><b>JADWAL PERGI</b></h3> <hr>
                                            </div>
                                            <div class="col-sm-6">
                                                <h5>INFO RUTE</h5>
                                                <small>Rute <b>{{ $route }}</b></small> <br>
                                                <small>Tanggal <b>{{ $date }}</b></small> <br>
                                                <small>Pukul <b>{{ date_format((date_create($dataOrder->shuttle_time_departure)), 'H:i') }}</b></small>
                                                <hr>
                                                <H5>INFO SHUTTLE</H5>
                                                <small><b>{{ $dataOrder->shuttle_name }}</b></small> <br>
                                                <small>{{ $dataOrder->shuttle_type }}</small> <br> 
                                                <small>Rp.{{ number_format($dataOrder->shuttle_price, 0) }}</small> <br><br>
                                                <div class="form-group">
                                                    <H5>PILIH KURSI</H5>  
                                                        @for ($i = 1; $i <= $dataOrder->shuttle_total_seat; $i++)
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox{{$i}}" value="A{{$i}}" name="shuttle_seat[]">
                                                                <label class="form-check-label" for="inlineCheckbox{{$i}}">A{{$i}}</label>
                                                            </div>    
                                                        @endfor
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <h5 class="text-center">DATA PEMESAN</h5>
                                                <div class="row">
                                                    <div class="col-sm-6">Nama</div>
                                                    <div class="col-sm-6"><b>{{ $user->user_full_name }}</b></div>
                                                    <div class="col-sm-6">Nomor Telepon</div>
                                                    <div class="col-sm-6"><b>{{ $user->user_phone }}</b></div>
                                                    <div class="col-sm-6">Email</div>
                                                    <div class="col-sm-6"><b>{{ $user->user_email }}</b></div>
                                                </div>
                                                <div class="row mt-5">
                                                    <div class="col-sm-12">
                                                        <button type="submit" class="btn btn-danger btn-lg btn-block">Bayar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            @else
                                <form method="POST" class="mt-3" action="{{ route('do-pay') }}">
                                    @csrf
                                    <input type="hidden" name="type" value="{{ $type }}">
                                    <input type="hidden" name="user_id" value="{{ $user->user_id }}">
                                    <input type="hidden" name="user_name" value="{{ $user->user_full_name }}">
                                    <input type="hidden" name="user_phone" value="{{ $user->user_phone }}">
                                    <input type="hidden" name="user_email" value="{{ $user->user_email }}">
                                    <input type="hidden" name="bus_name" value="{{ $dataOrder->bus_name }}">
                                    <input type="hidden" name="bus_type" value="{{ $dataOrder->bus_type }}">
                                    <input type="hidden" name="bus_price" value="{{ $dataOrder->bus_price }}">
                                    <input type="hidden" name="bus_time" value="{{ $dataOrder->bus_time_departure }}">
                                    <input type="hidden" name="bus_date" value="{{ $dataOrder->bus_date_departure }}">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-sm-12 text-center">
                                                <h3><b>JADWAL PERGI</b></h3> <hr>
                                            </div>
                                            <div class="col-sm-6">
                                                <h5>INFO RUTE</h5>
                                                <small>Rute <b>{{ $route }}</b></small> <br>
                                                <small>Tanggal <b>{{ $date }}</b></small> <br>
                                                <small>Pukul <b>{{ date_format((date_create($dataOrder->bus_time_departure)), 'H:i') }}</b></small>
                                                <hr>
                                                <H5>INFO BUS</H5>
                                                <small><b>{{ $dataOrder->bus_name }}</b></small> <br>
                                                <small>{{ $dataOrder->bus_type }}</small> <br> 
                                                <small>Rp.{{ number_format($dataOrder->bus_price, 0) }}</small> <br><br>
                                                <div class="form-group">
                                                    <H5>PILIH KURSI</H5>  
                                                        @for ($i = 1; $i <= $dataOrder->bus_total_seat; $i++)
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="checkbox" id="inlineCheckbox{{$i}}" value="A{{$i}}" name="bus_seat[]">
                                                                <label class="form-check-label" for="inlineCheckbox{{$i}}">A{{$i}}</label>
                                                            </div>    
                                                        @endfor
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <h5 class="text-center">DATA PEMESAN</h5>
                                                <div class="row">
                                                    <div class="col-sm-6">Nama</div>
                                                    <div class="col-sm-6"><b>{{ $user->user_full_name }}</b></div>
                                                    <div class="col-sm-6">Nomor Telepon</div>
                                                    <div class="col-sm-6"><b>{{ $user->user_phone }}</b></div>
                                                    <div class="col-sm-6">Email</div>
                                                    <div class="col-sm-6"><b>{{ $user->user_email }}</b></div>
                                                </div>
                                                <div class="row mt-5">
                                                    <div class="col-sm-12">
                                                        <button type="submit" class="btn btn-danger btn-lg btn-block">Bayar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>