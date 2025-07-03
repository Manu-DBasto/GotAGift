@php
    use Illuminate\Support\Facades\Auth;
@endphp
@if (auth()->check())
    @if (auth()->user()->activo === 0)
        @php
            auth()->logout();
            header('Location: ' . route('login'));
            exit();
        @endphp
    @endif
@endif
<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Fidelidad') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->



    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Íconos de Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>


    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="{{ asset('css/nav.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>



<!-- Navbar -->
<nav class="navbar navbar-expand-lg shadow-sm sticky-top" style="">
    <div class="container position-relative">
        <!-- Botón para abrir el offcanvas -->
        <a class="navbar-brand" href="{{ route('tienda') }}"><i class="fa-solid fa-gifts"></i><span
                class="ms-2">GotAGift</span> </a>
        <button class="navbar-toggler btn btn-dark" type="button" data-bs-toggle="offcanvas"
            data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-expanded="false"
            aria-label="Toggle navigation">
            <i class="navbar-toggler-icon"></i> </button>


        <!-- Offcanvas -->
        <div class="offcanvas offcanvas-start sidebar" tabindex="-1" id="offcanvasNavbar"
            aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">GotAGift</h5>
                <button type="button" class="btn-close btn-close-white text-light" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">


                <ul class="navbar-nav ms-1">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('tienda') }}">Productos</a>
                    </li>
                </ul>

                <ul class="navbar-nav ms-1">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('premios') }}">Premios</a>
                    </li>
                </ul>
                @if (Auth::check())
                    <ul class="navbar-nav ms-1">
                        <li class="nav-item text-white">

                        </li>
                    </ul>

                    <ul class="navbar-nav ms-1">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('perfil') }}">
                                Cuenta</a>
                        </li>
                    </ul>
                @else
                    <ul class="navbar-nav ms-1">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">
                                Iniciar
                                Sesión</a>
                        </li>
                    </ul>
                @endif
                @auth
                    @if (auth()->user()->rol === 'admin')
                        <ul class="navbar-nav ms-1">
                            {{-- <li class="nav-item">
                                <a class="nav-link" href="{{ route('productos.index') }}">
                                    Panel de control
                                </a>
                            </li> --}}
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    Panel de control
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="{{ route('productos.index') }}">Productos</a></li>
                                    <li><a class="dropdown-item" href="{{ route('users.index') }}">Usuarios</a></li>

                                </ul>
                            </li>
                        </ul>
                    @endif

                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link btn btn-warning ps-3 pe-3" href="{{ route('carrito') }}"><i
                                    class="fa-solid fa-cart-shopping"></i></a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ms-2">

                        <li class="nav-item">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="nav-link btn btn-danger fw-bold"
                                    style="text-decoration: none;">
                                    Cerrar sesión
                                </button>
                            </form>
                        </li>
                    </ul>
                @endauth
            </div>
        </div>

    </div>
</nav>



<!-- Modal de Información -->
<div class="modal fade" id="infoModal" tabindex="-1" aria-labelledby="infoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="infoModalLabel">ℹ️ Información</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Una tienda dedicada a la venta de productos de comida, cortesia de : Felipe Alfonso Alcocer Cervantes
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- Inicio del section -->

<body>
    <main class="py-4">
        @yield('content')
    </main>
</body>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>




</html>
