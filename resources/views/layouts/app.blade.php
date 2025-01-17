<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Novel Nest</title>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet"> <!-- Link ke CSS Kustom -->

    <!-- link bootstrap icon -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css"
        rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container navbar-container">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false">
                    <span class="navbar-toggler-icon"></span>
                </button>
                @if (Request::is('Book'))
                    <div class="search">
                        <form method="GET" action="{{ route('Book.index') }}" id="form-search">
                            <input type="text" name="search" placeholder="Cari"
                                value="{{ old('search', $search) }}">
                            <button type="submit" class="btn btn-primary"><i class="bi bi-search"></i></button>
                        </form>
                    </div>
                @endif
                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <ul class="navbar-nav ms-auto">
                        @guest
                        @else

                            <button id="toggle-sidebar" class="btn btn-primary ms-3">
                                <i class="bi bi-list"></i> <!-- Icon untuk toggle -->
                            </button>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>


        <div class="container-fluid">
            <div class="row">
                <!-- Sidebar -->
                <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block bg-dark sidebar collapse show">
                    <div class="position-sticky">
                        <span id="admin-text">
                            <center>
                                <h3> Admin </h3>
                            </center>
                        </span>
                        <ul class="nav flex-column">
                            <hr>
                            <li class="nav-item mb-1">
                                <a class="nav-link {{ Request::is('/') ? 'active' : '' }} text-light"
                                    href="{{ route('home') }}">
                                    <i class="bi bi-house-fill fs-5"></i>
                                    <span>Dashboard</span>
                                </a>
                            </li>
                            <li class="nav-item mb-1">
                                <a class="nav-link text-light dropdown-toggle" href="#" id="sidebarDropdown"
                                    role="button" data-bs-toggle="collapse" data-bs-target="#menuItems"
                                    aria-expanded="false">
                                    <i class="bi bi-folder-fill fs-5"></i>
                                    <span>Produk</span>
                                </a>
                                <div class="collapse" id="menuItems">
                                    <ul class="nav flex-column ms-3">
                                        <li class="nav-item mb-1">
                                            <a class="nav-link {{ Request::is('Book*') ? 'active' : '' }} text-light"
                                                href="{{ route('Book.index') }}">
                                                <i class="bi bi-book-fill"></i>
                                                <span>Daftar Buku</span>
                                            </a>
                                        </li>
                                        <li class="nav-item mb-1">
                                            <a class="nav-link {{ Request::is('Publisher*') ? 'active' : '' }} text-light"
                                                href="{{ route('Publisher.index') }}">
                                                <i class="bi bi-buildings-fill"></i>
                                                <span>Penerbit Buku</span>
                                            </a>
                                        </li>
                                        <li class="nav-item mb-1">
                                            <a class="nav-link {{ Request::is('Category*') ? 'active' : '' }} text-light"
                                                href="{{ route('Category.index') }}">
                                                <i class="bi bi-stack fs-5"></i>
                                                <span>Kategori Buku</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item mb-1">
                                <a class="nav-link {{ Request::is('/User') ? 'active' : '' }} text-light"
                                    href="/User">
                                    <i class="bi bi-person-fill"></i>
                                    <span>Pengguna</span>
                                </a>
                            </li>
                        </ul>
                        <div class="das-link">
                            <a class="nav-link {{ Request::is('/User') ? 'active' : '' }} text-light" href="/">
                                <i class="bi bi-arrow-left-square-fill"></i>
                                <span>Halaman Utama</span>
                            </a>
                        </div>
                    </div>
                </nav>

                <!-- Main content -->
                <main class="col-md-9 col-lg-10 mt-3">
                    @yield('content')
                </main>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var sidebar = document.getElementById("sidebar");
            var toggleButton = document.getElementById("toggle-sidebar");
            var mainContent = document.querySelector("main");

            toggleButton.addEventListener("click", function() {
                sidebar.classList.toggle("closed");
                mainContent.classList.toggle("sidebar-closed");
            });
        });
        document.addEventListener("click", function(event) {
            var isClickInside = document.getElementById("sidebar").contains(event.target);

            if (!isClickInside) {
                var dropdown = document.getElementById("menuItems");
                if (dropdown.classList.contains("show")) {
                    dropdown.classList.remove("show");
                }
            }
        });
    </script>
</body>

</html>
