<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#"><img src="{{ asset('image/logo.png') }}"></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('shuttle') }}"> Shuttle </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('bus') }}"> Bus </a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <div class="btn-group">
                    <div class="btn-group dropleft" role="group">
                        <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-expanded="false">
                        <span class="sr-only">Toggle Dropleft</span>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{ route('profile') }}">Profil</a>
                            <a class="dropdown-item" href="{{ route('list-order', ['id' => session()->get('user_id')]) }}">My Booking</a>
                            <a class="dropdown-item" href="{{ route('logout') }}">Keluar</a>
                        </div>
                    </div>
                    <button type="button" class="btn btn-secondary btn-sm">
                        {{ session()->get('user') }}
                    </button>
                </div>
            </form>
        </div>
    </nav>
</header>