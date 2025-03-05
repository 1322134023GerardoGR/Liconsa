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
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&display=swap"
        rel="stylesheet">

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

        .footer-text {
            font-family: 'Libre Baskerville', serif;
            font-size: 20px;
            color: #FFFFFF;
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

        /* Barra de navegación */
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
            color: #FFFFFF !important;
            font-weight: 700;
            border: 1px solid #A57F2C;
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
            display: flex;
            justify-content: center;
            align-items: flex-start;
            padding: 50px 20px;
            max-width: 1200px;
            width: 100%;
            margin: 0 auto;
        }

        /* Tarjeta del formulario */
        .form-card {
            background-color: #FFFFFF;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            width: 100%;
            max-width: 600px;
        }

        .form-card h1 {
            font-family: 'Libre Baskerville', serif;
            font-size: 28px;
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: 600;
        }

        .form-control {
            border-radius: 6px;
        }

        /* Botones personalizados */
        .btn1 {
            background-color: #621132;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
            text-decoration: none;
            margin: 5px;
        }

        .btn1:hover {
            background-color: #4a0e27;
        }

        .btn-container {
            margin-top: 20px;
            display: flex;
            gap: 10px;
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
            margin-top: auto; /* Para forzar el footer al fondo de la página */
        }
    </style>

    @vite(['resources/js/app.js'])
</head>
<body class="font-sans antialiased">

<!-- HEADER (sin cambios) -->
<header class="header">
    <h1 class="logo-text">LICONSA</h1>
    <img class="logo-mexico" src="{{ asset('img/logo_gobierno_mexico.png') }}" alt="logo de mexico">
</header>

<!-- NAVBAR (sin cambios) -->
<nav class="navbar">
    <a class="nav-link {{ Route::is('inicio') ? 'active' : '' }}" href="{{route('inicio')}}">Inicio</a>
    <a class="nav-link {{ Route::is('beneficiarios.list') ? 'active' : '' }}" href="{{route('beneficiarios.list')}}">Lista de Beneficiarios</a>
    <a class="nav-link {{ Route::is('beneficiarios.nuevo') ? 'active' : '' }}" href="{{route('beneficiarios.nuevo')}}">Registrar Beneficiario</a>
    <a class="nav-link {{ Route::is('add.sell') ? 'active' : '' }}" href="{{route('add.sell')}}">Registrar Nueva Venta</a>
    <a class="nav-link {{ Route::is('user.nuevo') ? 'active' : '' }}" href="{{route('user.nuevo')}}">Registrar Usuario</a>
    <a class="nav-link {{ Route::is('trabajadores.list') ? 'active' : '' }}" href="{{route('trabajadores.list')}}">Lista de Usuarios</a>
    <a class="nav-link {{ Route::is('ventas.list') ? 'active' : '' }}" href="{{route('ventas.list')}}">Lista de Ventas</a>
</nav>

<!-- Mensajes de éxito y error -->
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

<!-- CONTENIDO PRINCIPAL -->
<form action="{{route('ventas.store')}}" method="POST">
    @csrf
    <div class="content">
        <div class="form-card">
            <h1>Registrar Venta</h1>
            <div class="form-group">
                <label for="code">
                    <strong>Código del Beneficiario</strong><span class="text-danger">*</span>
                </label>
                <input name="code" type="text" class="form-control" id="code">
            </div>
            <div class="form-group">
                <label for="litros_v">
                    <strong>Número de litros de leche</strong><span class="text-danger">*</span>
                </label>
                <input onchange="changePrice(this.value)" name="litros_v" type="number" class="form-control" id="litros_v">
            </div>
            <div class="form-group">
                <label for="num_lecheria">
                    <strong>Número de Lechería</strong><span class="text-danger">*</span>
                </label>
                <input name="num_lecheria" type="number" class="form-control" id="num_lecheria">
            </div>
            <div class="form-group">
                <label for="costo">
                    <strong>Costo total</strong>
                </label>
                <input disabled name="costo" type="number" class="form-control" id="costo">
            </div>

            <div id="interactive" class="viewport" style="margin: 20px 0;"></div>

            <div class="btn-container">
                <button type="submit" class="btn1">Realizar Compra</button>
                <button type="reset" class="btn1" onclick="index()">Cancelar Compra</button>
            </div>
        </div>
    </div>
</form>

<!-- FOOTER (sin cambios) -->
<footer class="footer">
    <br>
    <p class="footer-text">LICONSA © 2024</p>
</footer>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/quagga/dist/quagga.min.js"></script>
<script src="{{ asset('JS/script.js') }}"></script>
<script>
    function changePrice(value) {
        const litros = parseFloat(value);
        if (!isNaN(litros)) {
            const costo = litros * 6.50;
            document.getElementById('costo').value = costo.toFixed(2);
        } else {
            alert('Por favor ingrese un número válido de litros.');
        }
    }

    function index() {
        window.location.href = "{{ route('inicio') }}";
    }
</script>
</body>
</html>
