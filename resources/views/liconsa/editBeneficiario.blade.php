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
    @vite(['resources/js/app.js'])
    <!-- Styles -->
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

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

        .footer-text {
            font-family: 'Libre Baskerville', serif;
            font-size: 20px;
            font-weight: bold;
            color: #FFFFFF;
        }

        .header {
            background-image: url("{{ asset('img/fondofootergob.png') }}");
            background-size: contain;
            background-position: center;
            background-color: #611232;
            color: white;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 24px 50px;
        }

        .card {
            width: 80%;
            max-width: 900px;
            padding: 20px;
            margin: auto;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
        }


        .header::after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 20vh;
            background-color: rgba(0, 0, 0, 0.3); /* Ajusta la opacidad aquí */
        }

        .header img {
            height: 80px;
            width: auto;
            position: relative;
            z-index: 2;
        }

        .header .logo-mexico {
            opacity: 1.5;
        }

        .footer {
            background-color: #621132;
            background-image: url("{{ asset('img/fondofootergob.png') }}");
            background-size: cover;
            background-position: center;
            color: white;
            text-align: center;
            padding: 15px;
        }

        .content {
            background-color: #D4C19C;
            display: flex;
            padding: 100px 20px;
            align-items: center;
            justify-content: center;
        }

        .form-container {
            width: 100%; /* Ajuste del ancho del formulario */
            max-width: 800px;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: white;
        }

        .form-row {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .form-group {
            flex: 1 1 calc(50% - 20px);
            display: flex;
            flex-direction: column;
        }

        .form-group label {
            font-weight: 600;
        }

        .form-control {
            border-radius: 8px;
            padding: 10px 15px;
        }

        .btn-container {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            margin-top: 30px;
        }

        .btn1 {
            flex: 1;
            padding: 12px 0;
            border-radius: 8px;
            background-color: #621132;
            color: white;
            font-size: 16px;
            font-weight: bold;
            border: none;
            transition: background-color 0.3s ease;
        }

        .btn1:hover {
            background-color: #4a0e27;
        }

        nav.navbar {
            background-color: #A57F2C;
            padding: 12px 20px;
            display: flex;
            justify-content: center;
            gap: 20px;
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

        .navbar a:hover {
            background-color: #621132;
        }

        .text-agregarbenif {
            font-family: 'Libre Baskerville', serif;
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

        .obligatorio {
            color: red;
        }
    </style>
    @vite(['resources/js/app.js'])


</head>
<body class="font-sans  antialiased">
<header class="header">
    <h1 class="logo-text">LICONSA</h1>
    <img class="logo-mexico" src="{{ asset('img/logo_gobierno_mexico.png') }}" alt="logo de mexico">
</header>
<nav class="navbar">
    <a href="{{route('inicio')}}">Inicio</a>
    <a href="{{route('beneficiarios.list')}}">Lista de Beneficiarios</a>
    <a href="{{route('beneficiarios.nuevo')}}">Registrar Beneficiario</a>
    <a href="{{route('add.sell')}}">Registrar Nueva Venta</a>
    <a href="{{route('user.nuevo')}}">Registrar Usuario</a>
    <a href="{{route('trabajadores.list')}}">Lista de Usuarios</a>
    <a href="{{route('ventas.list')}}">Lista de Ventas</a>
</nav>
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

    <div class="card">
        <div class="card-header"><h2>Datos del Beneficiario {{$beneficiario->nombre}} {{$beneficiario->apellido_p}}</h2>
        </div>
        <form action="{{route('beneficiarios.update',$beneficiario->id)}}" method="get">

            <div class="form-group">
                <label for="nombre" class="form-label">Nombre del beneficiario:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{$beneficiario->nombre}}">
            </div>
            <div class="form-group">
                <label for="apellido_paterno" class="form-label">Apellido paterno:</label>
                <input type="text" class="form-control" id="apellido_paterno" name="apellido_p"
                       value="{{$beneficiario->apellido_p}}">
            </div>
            <div class="form-group">
                <label for="apellido_materno" class="form-label">Apellido materno:</label>
                <input type="text" class="form-control" id="apellido_materno" name="apellido_m"
                       value="{{$beneficiario->apellido_m}}">
            </div>
            <div class="form-group">
                <label for="curp" class="form-label">CURP del beneficiario:</label>
                <input type="text" class="form-control" id="curp" name="curp" value="{{$beneficiario->curp}}">
            </div>
            <div class="form-group">
                <label for="direccion" class="form-label">Dirección:</label>
                <input type="text" class="form-control" id="direccion" name="direccion"
                       value="{{$beneficiario->direccion}}">
            </div>
            <div class="form-group">
                <label for="fecha_nacimiento" class="form-label">Fecha de nacimiento:</label>
                <input type="text" class="form-control" id="fecha_nacimiento" name="fecha_nac"
                       value="{{$beneficiario->fecha_nac}}">
            </div>
            <div class="form-group">
                <label for="num_beneficiarios" class="form-label">Número de dependientes:</label>
                <input type="text" class="form-control" id="num_beneficiarios" name="n_dependientes"
                       value="{{$beneficiario->n_dependientes}}">
            </div>
            <!-- No es necesario agregar name a curp_beneficiarios ya que está deshabilitado y no se enviará en el formulario -->
            <div class="form-group">
                <label for="curp_dependiente" class="form-label">CURP de los dependientes:</label>
                @foreach($dependientes as $dependiente)
                    <input class="form-control" id="curp_dependiente_{{ $dependiente->id }}"
                           name="curp_dependiente_{{ $dependiente->id }}" value="{{ $dependiente->curp }}">
                @endforeach
            </div>

            <div class="form-group">
                <label for="d_asis" class="form-label">Dias de asistencia</label>
                <input type="text" class="form-control" id="d_asist1" name="d_asist1"
                       value="{{$beneficiario->d_asist1}}">
                <input type="text" class="form-control" id="d_asist2" name="d_asist2"
                       value="{{$beneficiario->d_asist2}}">
                <input type="text" class="form-control" id="d_asist3" name="d_asist3"
                       value="{{$beneficiario->d_asist3}}">
            </div>
            <div class="form-group">
                <label for="num_lecheria" class="form-label">N° Lecheria:</label>
                <input type="number" class="form-control" id="num_lecheria" name="num_lecheria"
                       placeholder="Ej. 65469158647" value="{{$beneficiario->num_lecheria}}">
            </div>

            <div class="btn-container">
                <button type="submit" class="btn1">Guardar</button>
                <button type="reset" class="btn1" onclick="index()">Cancelar</button>
            </div>
        </form>
    </div>
</div>
<footer class="footer">
    <p class="footer-text">LICONSA © 2025</p>
</footer>

<!-- Bootstrap JS (optional) -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    function index() {
        window.location.href = "{{ route('inicio') }}"; // Reemplaza 'route('index')' con la ruta adecuada en tu aplicación
    }
</script>
</body>
</html>
