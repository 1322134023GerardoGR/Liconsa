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
            background-image: url('{{asset('/img/FondoV1.png')}}');
            color: white;
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 93px;
            width: auto;
            padding: 20px;
        }

        .footer {
            background-image: url('{{asset('/img/FondoR1.png')}}');
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
            height: 40px;
        }

        .navbar {
            background-color: #285C4D;
            height: 40px;
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
                        <a class="nav-link " href="{{route('inicio')}}">Inicio</a>
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
                        <a class="nav-link" href="{{route('trabajadores.list')}}">Lista De Usuarios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{route('ventas.list')}}">Lista De Ventas</a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>

</div>
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
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </ul>
    </div>
@endif

<div class="content">
    <div class="user-list">
        <h2>Ventas Registradas</h2>
        <table class="user-table">
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
        <div class="pagination">
            {{ $ventas->links() }}
            <!-- Agrega más botones de paginación si es necesario -->
        </div>
    </div>
</div>
<footer class="footer">
    <p>LICONSA © 2024</p>
</footer>
</body>
</html>
