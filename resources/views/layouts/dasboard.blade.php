<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Next Nest</title>
    {{-- scripts --}}
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    {{-- CDN Icon  --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css"
        rel="stylesheet">
    {{-- css --}}
    <link rel="stylesheet" href="css/dasboard.css">
</head>

<body>
    <header class="header">
        <nav class="navbar">
            <div class="Logo">
                <a href="/">
                    <img src="{{asset('img/logo.png')}}" width="150px">
                </a>
            </div>
            <ul>
                <div class="input-group rounded search ">
                    <form action="" method="GET"></form>
                    <input type="search" class="form-control rounded-5" placeholder="Cari Buku" aria-label="Search"
                        aria-describedby="search-addon" style="width: 400px;" />
                </div>
                @guest
                    @if (Route::has('login'))
                        <div class="nav-masuk">
                            <a href="{{ route('login') }}" class="bold-text">Masuk</a>
                        </div>
                    @endif
                    @if (Route::has('register'))
                        <div class="nav-daftar">
                            <a href="{{ route('register') }}" class="bold-text">Daftar</a>
                        </div>
                    @endif
                @else
                    <div class="nav-item dropdown profile">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle fw-bold " href="#" role="button"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-end menu" aria-labelledby="navbarDropdown">
                            @hasrole('admin')
                                <a class="dropdown-item" href="/admin">
                                    <i class="bi bi-person-fill me-2"></i>
                                    Halaman admin
                                </a>
                                <hr class="garis">
                            @endhasrole
                            <a class="dropdown-item" href="">
                                <i class="bi bi-person-fill-gear me-2"></i>
                                Ubah Profil
                            </a>
                            <hr class="garis">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                                <i class="bi bi-door-open-fill me-2"></i>
                                Keluar
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>
                @endguest
            </ul>
        </nav>
    </header>
    <hr class="hr">
    <main>
        @yield('content')
    </main>
</body>

</html>
