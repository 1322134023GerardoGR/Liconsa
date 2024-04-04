<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>LICONSA</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    <!-- Styles -->
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'figtree', sans-serif;
        }

        .header {
            background-color: #13322B;
            color: white;
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 80px;
            padding: 20px;
        }

        .footer {
            background-color: #9D2449;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 80px;
            padding: 20px;
        }

        .content {
            background-color: #D4C19C;
            min-height: calc(100vh - 160px);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .user-list {
            width: 80%;
            max-width: 1150px;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .user-list h2 {
            margin-bottom: 20px;
            text-align: center;
        }

        .user-table {
            width: 100%;
            border-collapse: collapse;
        }

        .user-table th, .user-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .user-table th {
            background-color: #13322B;
            color: white;
        }

        .user-table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .user-table tr:hover {
            background-color: #ddd;
        }

        .pagination {
            margin-top: 20px;
            display: flex;
            justify-content: center;
        }

        .pagination button {
            padding: 5px 10px;
            margin: 0 5px;
            background-color: #13322B;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .pagination button:hover {
            background-color: #0b1b14;
        }

        .btn1 {
            margin: 0 10px;
            padding: 15px 30px;
            border-radius: 5px;
            background-color: #621132;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn1:hover {
            background-color: #4a0e27;
        }

        .mynav {
            background-color: #285C4D;
            color: white;
            display: flex;
            align-items: center;
            justify-content: right;
            height: 80px;

        }

        .navbar {
            background-color: #285C4D;
        }

        .navbar a {
            color: white;
            background-color: #285C4D;
        }

        .navbar a:hover {
            color: #621132;
            background-color: #285C4D;
        }

        .navbar-toggler {
            background-color: #285C4D;
            color: white;
            border: none;
        }

        .navbar-toggler:hover {
            background-color: #285C4D;
            color: #621132;
        }

        .asd {
            background-color: #285C4D;
        }

        .alerta2 {
            --bs-alert-bg: transparent;
            --bs-alert-padding-x: 1rem;
            --bs-alert-padding-y: 1rem;
            --bs-alert-margin-bottom: 0;
            --bs-alert-color: inherit;
            --bs-alert-border-color: transparent;
            --bs-alert-border: var(--bs-border-width) solid var(--bs-alert-border-color);
            --bs-alert-border-radius: var(--bs-border-radius);
            --bs-alert-link-color: inherit;
            position: relative;
            padding: var(--bs-alert-padding-y) var(--bs-alert-padding-x);
            margin-bottom: var(--bs-alert-margin-bottom);
            color: var(--bs-alert-color);
            background-color: var(--bs-alert-bg);
            border: var(--bs-alert-border);
            border-radius: var(--bs-alert-border-radius);
        }
    </style>

    @vite(['resources/js/app.js'])

</head>
<body class="font-sans  antialiased">
<header class="header">
    <h1>Liconsa</h1>
    <h2>Gobierno de México</h2>
</header>
<div class="mynav">

    <nav class="navbar navbar-expand-lg ">
        <div class="container-fluid asd">
            <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse asd" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link " href="{{route('index')}}">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('beneficiarios.list')}}">Lista de Beneficiarios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('beneficiarios.nuevo')}}">Registrar Beneficiario</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('add.sell')}}">Registrar Nueva Venta</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('user.nuevo')}}"> Registrar Usuario</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{route('trabajadores.list')}}">Lista De Usuarios</a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>

</div>
@if(session('success'))
    <div class="alerta2 alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
    </div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
@endif
@if($errors->any())
    <div class="alerta2 alert-danger alert-dismissible fade show" role="alert">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </ul>
    </div>
@endif

<div class="content">
    <div class="user-list">
        <h2>Usuarios Registrados</h2>
        <table class="user-table">
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
                           class="btn btn-warning">Editar</a>
                        <a href="{{ route('trabajadores.destroy', $trabajador->id) }}"
                           class="btn btn-danger">Eliminar</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination">
            {{ $trabajadores->links() }}
            <!-- Agrega más botones de paginación si es necesario -->
        </div>
    </div>
</div>
<footer class="footer">
    <p>LICONSA © 2024</p>
</footer>
</body>
</html>
