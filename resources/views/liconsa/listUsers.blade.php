<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>LICONSA</title>

    <!-- CSS principal -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- Fuente Libre Baskerville -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&display=swap"
        rel="stylesheet"
    >

    <!-- Estilos -->
    <style>
        /* Ajustes globales */
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
            position: relative; /* Para poder usar ::after */
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
        .header h1 {
            margin: 0;
            font-family: 'Libre Baskerville', serif;
        }

        /* Barra de navegación */
        nav.navbar {
            background-color: #A57F2C;
            padding: 10px 20px;
            display: flex;
            gap: 15px;
            align-items: center;
            justify-content: center !important;
        }
        .navbar a {
            color: white;
            text-decoration: none;
            font-size: 20px;
            padding: 10px 15px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .navbar a:hover {
            background-color: #621132;
            color: #FFFFFF;
        }
        .nav-link {
            position: relative;
            border-radius: 4px;
            transition: all 0.3s;
        }
        .nav-link.active {
            background: #621132 !important;
            color: #FFFFFF !important;
            font-weight: 700;
            border: 1px solid #A57F2C;
        }
        .navbar a:not(.active):hover {
            background-color: #621132;
            color: #FFFFFF !important;
        }

        /* Contenedor principal */
        .content {
            flex: 1; /* Para que el footer se mantenga abajo */
            max-width: 1200px;
            margin: auto;
            padding: 40px 20px;
        }

        /* Contenedor de la tabla de usuarios */
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

        /* Tabla (similar a la de “Beneficiarios”) */
        .table-responsive {
            border-radius: 8px;
            overflow: hidden;
        }
        table.user-table {
            width: 100%;
            border-collapse: collapse;
        }
        table.user-table thead {
            background-color: #A57F2C;
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
        }
        table.user-table tbody tr:hover {
            background-color: #f9f9f9;
        }
        table.user-table tbody td {
            padding: 10px 15px;
            vertical-align: middle;
            border-bottom: 1px solid #dee2e6;
            white-space: nowrap;
        }
        /* Botones dentro de la tabla */
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

<!-- Encabezado -->
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

<!-- Mensajes de éxito / error -->
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert" style="margin: 20px;">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert" style="margin: 20px;">
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
        <h2>Usuarios Registrados</h2>
        <div class="table-responsive">
            <table class="table table-hover user-table">
                <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>CURP</th>
                    <th>RFC</th>
                    <th>ROL</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($trabajadores as $trabajador)
                    <tr>
                        <td>{{ $trabajador->nombre }}</td>
                        <td>{{ $trabajador->apellido_p }}</td>
                        <td>{{ $trabajador->apellido_m }}</td>
                        <td>{{ $trabajador->curp }}</td>
                        <td>{{ $trabajador->rfc }}</td>
                        <td>{{ $trabajador->rol }}</td>
                        <td>
                            <a href="{{ route('trabajadores.edit', $trabajador->id) }}"
                               class="btn btn-warning btn-sm">Editar</a>
                            <a href="{{ route('trabajadores.destroy', $trabajador->id) }}"
                               class="btn btn-danger btn-sm">Eliminar</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <!-- Paginación -->
        <div class="pagination">
            {{ $trabajadores->links() }}
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
