<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>LICONSA</title>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

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
            align-items: center;
            justify-content: center;
        }

        .form-container {
            width: 70%; /* Ajuste del ancho del formulario */
            max-width: 800px;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: white;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            font-weight: bold;
        }

        .btn-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
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
                        <a class="nav-link" href="{{route('trabajadores.list')}}">Lista De Usuarios</a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>

</div>
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
    </div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
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
    <div class="form-container">
        <div class="card-header"><h2>Editar Usuario {{$trabajadores->nombre}} {{$trabajadores->apellido_p}}</h2></div>

        <form action="{{route('trabajadores.update',$trabajadores->id)}}" method="GET">
            @csrf
            <div class="form-group">
                <label for="nombre" class="form-label">Nombre(s):</label>
                <input type="text" name="nombre" class="form-control" id="nombre" value="{{$trabajadores->nombre}}">
            </div>
            <div class="form-group">
                <label for="apellido_p" class="form-label">Apellido paterno:</label>
                <input type="text" name="apellido_p" class="form-control" id="apellido_p"
                       value="{{$trabajadores->apellido_p}}">
            </div>
            <div class="form-group">
                <label for="apellido_m" class="form-label">Apellido materno:</label>
                <input type="text" name="apellido_m" class="form-control" id="apellido_m"
                       value="{{$trabajadores->apellido_m}}">
            </div>
            <div class="form-group">
                <label for="curp" class="form-label">CURP:</label>
                <input type="text" name="curp" class="form-control" id="curp" value="{{$trabajadores->curp}}">
            </div>
            <div class="form-group">
                <label for="rfc" class="form-label">RFC:</label>
                <input type="text" name="rfc" class="form-control" id="rfc" value="{{$trabajadores->rfc}}">
            </div>
            <div class="form-group">
                <label for="rol" class="form-label">Rol:</label>
                <select name="rol" class="form-control" id="rol">
                    <option value="vendedor">Vendedor</option>
                    <option value="atencion_clientes">At. Clientes</option>
                    <option value="supervisor">Supervisor</option>
                </select>
            </div>
            <div class="btn-container">
                <button type="submit" class="btn1"><i class="fas fa-save"></i>Guardar</button>
                <button type="reset" class="btn1" onclick="index()"><i class="fas fa-times"></i>Cancelar</button>
            </div>
        </form>
    </div>
</div>
<footer class="footer">
    <p>LICONSA © 2024</p>
</footer>

<!-- Bootstrap JS (optional) -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    function index() {
        window.location.href = "{{ route('index') }}"; // Reemplaza 'route('index')' con la ruta adecuada en tu aplicación
    }
</script>
</body>
</html>
