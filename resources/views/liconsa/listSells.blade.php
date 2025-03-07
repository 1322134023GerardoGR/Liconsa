<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>LICONSA</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #D4C19C;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        .logo-text {
            font-family: 'Libre Baskerville', serif;
            font-size: 50px;
            font-weight: bold;
            color: #FFFFFF;
            z-index: 1;
        }

        /* Encabezado */
        .header {
            background-image: url("{{ asset('img/fondofootergob.png') }}");
            color: white;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 24px 50px;
        }

        .header .logo-mexico {
            opacity: 1.5;
        }

        .header::after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 20vh;
            background-color: rgba(0, 0, 0, 0.3);
        }

        .header img {
            height: 80px;
            width: auto;
            position: relative;
            z-index: 2;
        }

        .header h1,
        .header h2 {
            margin: 0;
            font-family: 'Libre Baskerville', serif;
        }

        nav.navbar {
            background-color: #A57F2C;
            padding: 10px 20px;
            display: flex;
            gap: 15px;
            align-items: center;
            justify-content: center !important;
        }

        .navbar a:hover {
            background-color: #621132;
            color: #FFFFFF;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            font-size: 20px;
            padding: 10px 15px;
            border-radius: 5px;
            transition: background-color 0.3s;
            justify-content: center;
        }

        .nav-link {
            position: relative;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border-radius: 4px;
        }

        .nav-link.active {
            background: #621132 !important;
            color: #FFFFFF !important; /* Agrega !important aquí */
            font-weight: 700;
            border: 1px solid #A57F2C; /* Opcional: para mejor contraste */
        }

        .navbar a:not(.active):hover {
            background-color: #621132;
            color: #FFFFFF !important;
        }

        .nav-link::before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            width: 0;
            height: 2px;
        }

        .nav-link:hover::before {
            width: 80%;
        }

        /* Contenido principal */
        .content {
            flex: 1; /* Para que el footer se mantenga abajo */
            max-width: 1200px;
            margin: auto;
            padding: 40px 20px;
        }

        .user-list {
            background-color: #fff;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .user-list h2 {
            margin-bottom: 20px;
            font-family: 'Libre Baskerville', serif;
        }

        /* Estilos mejorados para el header de la tabla */
        table.user-table thead {
            color: #fff;
            border-bottom: 3px solid #621132;
        }

        table.user-table thead th {
            font-family: 'Libre Baskerville', serif;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            font-size: 12px;
            padding: 1rem 1.2rem;
            vertical-align: middle;
            border: none;
            position: relative;
        }

        /* Ajustes para las celdas del cuerpo */
        table.user-table tbody td {
            padding: 10px 15px;
            vertical-align: middle;
            border-bottom: 1px solid #dee2e6;
            white-space: nowrap; /* Mantener en una línea */
        }

        /* Tabla con clases de Bootstrap + personalización */
        .table-responsive {
            border-radius: 8px;
            overflow: hidden;
        }

        table.user-table thead {
            background-color: #A57F2C;
            color: #fff;
        }

        table.user-table thead th {
            border: none;
        }

        table.user-table tbody tr:hover {
            background-color: #f9f9f9;
        }

        /* Botones de la tabla */
        .table .btn {
            margin-right: 5px;
        }

        .btn-warning {
            color: #fff;
        }

        /* Paginación centrada */
        .pagination {
            margin-top: 20px;
            display: flex;
            justify-content: center;
        }

        /* Footer */
        .footer {
            background-color: #621132;
            background-image: url("{{ asset('img/fondofootergob.png') }}");
            background-size: cover;
            background-position: center;
            color: white;
            text-align: center;
            padding: 15px;
            margin-top: 8px;
        }

        .footer-text {
            font-family: 'Libre Baskerville', serif;
            font-size: 20px;
            color: #FFFFFF;
        }
    </style>

    @vite(['resources/js/app.js'])
</head>
<body>
<header class="header">
    <h1 class="logo-text">LICONSA</h1>
    <img class="logo-mexico" src="{{ asset('img/logo_gobierno_mexico.png') }}" alt="logo de mexico">
</header>

<!-- NAVBAR -->
<nav class="navbar">
    <a class="nav-link {{ Route::is('inicio') ? 'active' : '' }}" href="{{route('inicio')}}">Inicio</a>
    <a class="nav-link {{ Route::is('beneficiarios.list') ? 'active' : '' }}" href="{{route('beneficiarios.list')}}">Lista de Beneficiarios</a>
    <a class="nav-link {{ Route::is('beneficiarios.nuevo') ? 'active' : '' }}" href="{{route('beneficiarios.nuevo')}}">Registrar Beneficiario</a>
    <a class="nav-link {{ Route::is('add.sell') ? 'active' : '' }}" href="{{route('add.sell')}}">Registrar Nueva Venta</a>
    <a class="nav-link {{ Route::is('user.nuevo') ? 'active' : '' }}" href="{{route('user.nuevo')}}">Registrar Usuario</a>
    <a class="nav-link {{ Route::is('trabajadores.list') ? 'active' : '' }}" href="{{route('trabajadores.list')}}">Lista de Usuarios</a>
    <a class="nav-link {{ Route::is('ventas.list') ? 'active' : '' }}" href="{{route('ventas.list')}}">Lista de Ventas</a>
</nav>

<!-- Mensajes de éxito y errores -->
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<!-- Contenido principal -->
<div class="content">
    <div class="user-list">
        <h2>Ventas Registradas</h2>
        <div class="table-responsive">
            <!-- Usamos clases de Bootstrap: table, table-hover, etc. -->
            <table class="table table-hover user-table">
                <thead>
                <tr>
                    <th>Folio de venta</th>
                    <th>Nombre del beneficiario</th>
                    <th>Código de beneficiario</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Litros vendidos</th>
                    <th>Costo total</th>
                    <th>Num de Lechería</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($ventas as $venta)
                    @foreach($beneficiarios as $beneficiario)
                        <tr>
                            <td>{{ $venta->folio }}</td>
                            <td>{{ $beneficiario->nombre .' ' .$beneficiario->apellido_p .' '. $beneficiario->apellido_m }}</td>
                            <td>{{ $beneficiario->folio_cb }}</td>
                            <td>{{ $venta->fecha }}</td>
                            <td>{{ $venta->hora }}</td>
                            <td>{{ $venta->litros_v }}</td>
                            <td>{{ $venta->total }}</td>
                            <td>{{ $venta->num_lecheria }}</td>
                        </tr>
                    @endforeach
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="pagination">
            {{ $ventas->links() }}
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="footer">
    <br>
    <p class="footer-text">LICONSA © 2024</p>
</footer>

</body>
</html>
