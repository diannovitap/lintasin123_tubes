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
              <label style="float: left; font-weight: bold;">Bus</label>
              <button type="button" class="btn btn-success" style="float: right" data-toggle="modal" data-target="#exampleModal">Tambah</button>

              <div class="modal fade text-dark" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Tambah Data bus</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form action="/bus-insert" method="POST">
                      <div class="modal-body">
                        @csrf
                        <div class="form-group">
                          <label for="name">Nama bus</label>
                          <input type="text" class="form-control" id="name" name="bus_name" required>
                        </div>
                        <div class="form-group">
                          <label for="type">Tipe</label>
                          <select class="form-control" id="type" name="bus_type" required>
                              <option value="STANDARD">STANDARD</option>
                              <option value="PREMIUM">PREMIUM</option>
                              <option value="EXECUTIVE">EXECUTIVE</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label>Jam Berangkat</label>
                          <input type="time" class="form-control" name="bus_time" required>
                        </div>
                        <div class="form-group">
                          <label>Tanggal Berangkat</label>
                          <input type="date" class="form-control" name="bus_date" required>
                        </div>
                        <div class="form-group">
                          <label>Harga</label>
                          <input type="number" class="form-control" name="bus_price" required>
                        </div>
                        <div class="form-group">
                          <label>Jumlah Tempat Duduk</label>
                          <input type="number" class="form-control" name="bus_seat" required>
                        </div>
                        <div class="form-group">
                          <label>Rute</label>
                          <select class="form-control" name="bus_route" required>
                              @foreach ($route as $item)
                                  <option value="{{ $item->route_id }}">{{ $item->route_from }} - {{ $item->route_to }}</option>
                              @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm">
              <table class="table table-hover bg-light">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Bus</th>
                    <th scope="col">Tipe</th>
                    <th scope="col">Jam</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Jumlah Bangku</th>
                    <th scope="col">Rute</th>
                    <th scope="col">Opsi</th>
                  </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @foreach ($data as $item)
                        <tr>
                        <th scope="row">{{$no++ }}</th>
                        <td>{{ $item->bus_name }}</td>
                        <td>{{ $item->bus_type }}</td>
                        <td>{{ $item->bus_time_departure }}</td>
                        <td>{{ $item->bus_date_departure	 }}</td>
                        <td>{{ $item->bus_total_seat }}</td>
                        <td>{{ $item->route->route_from }} - {{ $item->route->route_to }} </td>
                        <td>
                          <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#bus_edit{{ $no }}">Edit</button>
                          <button type="button" class="btn btn-danger btn-sm"data-toggle="modal" data-target="#bus_delete{{ $no }}">Hapus</button>
                          {{-- HAPUS  --}}
                          <div class="modal fade text-dark" id="bus_delete{{ $no }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Perhatian</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                    Akan menghapus Data, Yakin?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                    <a href="/bus-delete/{{ $item->bus_id }}"><button type="submit" class="btn btn-danger">Hapus</button></a>
                                </div>
                              </div>
                            </div>
                          </div>

                          {{-- EDIT --}}
                          <div class="modal fade text-dark" id="bus_edit{{ $no }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalLabel">Edit Data bus</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <form action="/bus-update" method="POST">
                                  <div class="modal-body">
                                    @csrf
                                    <input type="hidden" name="bus_id" value="{{ $item->bus_id }}">
                                    <div class="form-group">
                                      <label for="name">Nama bus</label>
                                      <input type="text" class="form-control" id="name" name="bus_name" value="{{ $item->bus_name }}" required>
                                    </div>
                                    <div class="form-group">
                                      <label for="type">Tipe</label>
                                        <select class="form-control" id="type" name="bus_type" required>
                                          <option value="STANDARD">STANDARD</option>
                                          <option value="PREMIUM">PREMIUM</option>
                                          <option value="EXECUTIVE">EXECUTIVE</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                      <label>Jam Berangkat</label>
                                      <input type="time" class="form-control" name="bus_time" value="{{ $item->bus_time_departure }}" required>
                                    </div>
                                    <div class="form-group">
                                      <label>Tanggal Berangkat</label>
                                      <input type="date" class="form-control" name="bus_date" value="{{ $item->bus_date_departure }}" required>
                                    </div>
                                    <div class="form-group">
                                      <label>Harga</label>
                                      <input type="number" class="form-control" name="bus_price" value="{{ $item->bus_price }}" required>
                                    </div>
                                    <div class="form-group">
                                      <label>Jumlah Tempat Duduk</label>
                                      <input type="number" class="form-control" name="bus_seat" value="{{ $item->bus_total_seat }}" required>
                                    </div>
                                    <div class="form-group">
                                      <label>Rute</label>
                                      <select class="form-control" name="bus_route" required>
                                          @foreach ($route as $item)
                                              <option value="{{ $item->route_id }}">{{ $item->route_from }} - {{ $item->route_to }}</option>
                                          @endforeach
                                      </select>
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary">Update </button>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
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