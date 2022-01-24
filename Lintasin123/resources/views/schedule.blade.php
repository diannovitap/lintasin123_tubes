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
                        @if (isset($schedule))
                            <div class="text-center">
                                <h4>Jadwal <span style="text-transform: capitalize;">{{ $type }}</span></h4>
                            </div>
                            <small>Rute : <b>{{ $schedule->route_from }} > {{ $schedule->route_to }}</b></small>
                            <small>Tanggal : <b>{{ $date }}</b></small>
                            @if ($type == "bus")
                                @foreach ($schedule->bus as $data)
                                    <div class="card bg-dark text-light mt-3">
                                        <div class="card-body">
                                            <form method="POST" class="mt-3" action="{{ route('do-order') }}">
                                                @csrf
                                                <input type="hidden" name="user_id" value="{{ session()->get('user_id') }}"> 
                                                <input type="hidden" name="bus_id" value="{{ $data->bus_id }}"> 
                                                <input type="hidden" name="date" value="{{ $date }}">
                                                
                                                <input type="hidden" name="route" value="{{ $schedule->route_from }} > {{ $schedule->route_to }}">
                                                <input type="hidden" name="type" value="{{ $type }}">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <h5><b>{{ $data->bus_name }}</b></h5>
                                                            <small>Tipe <b>{{ $data->bus_type }}</b></small> | <small>Harga <b>Rp.{{ number_format($data->bus_price, 0) }}</b></small>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <h1>{{ date_format((date_create($data->bus_time_departure)), 'H:i') }}</h1>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <button type="submit" class="btn btn-danger btn-lg btn-block">Pesan</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                @endforeach
                            @elseif ($type == "shuttle")
                                @foreach ($schedule->shuttle as $data)
                                    <div class="card bg-dark text-light mt-3">
                                        <div class="card-body">
                                            <form method="POST" class="mt-3" action="{{ route('do-order') }}">
                                                @csrf
                                                <input type="hidden" name="user_id" value="{{ session()->get('user_id') }}">
                                                <input type="hidden" name="shuttle_id" value="{{ $data->shuttle_id }}">
                                                <input type="hidden" name="date" value="{{ $date }}">
                                                <input type="hidden" name="route" value="{{ $schedule->route_from }} > {{ $schedule->route_to }}">
                                                <input type="hidden" name="type" value="{{ $type }}">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <h5><b>{{ $data->shuttle_name }}</b></h5>
                                                            <small>Tipe <b>{{ $data->shuttle_type }}</b></small> | <small>Harga <b>Rp.{{ number_format($data->shuttle_price) }}</b></small>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <h1>{{ date_format((date_create($data->shuttle_time_departure)), 'H:i') }}</h1>
                                                        </div>
                                                        <div class="col-sm-3">
                                                            <button type="submit" class="btn btn-danger btn-lg btn-block">Pesan</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        @else
                            <h4 class="text-center">Oops, tidak ada jadwal pada rute dan tanggal tersebut!</h4>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>