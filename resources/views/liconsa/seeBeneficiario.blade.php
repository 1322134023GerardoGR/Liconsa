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
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville&display=swap" rel="stylesheet">


    @vite(['resources/js/app.js'])
    <!-- Styles -->
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Libre Baskerville', serif;
        }

        body {
            font-family: 'Libre Baskerville', serif;
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
            background-color: rgba(0, 0, 0, 0.3);
            /* Ajusta la opacidad aquí */
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
            width: 100%;
            /* Ajuste del ancho del formulario */
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

        video {
            margin-top: 10px;
            border-radius: 50px;
        }
    </style>
    <!--
<style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .header {
            background-image: url('{{asset('/img/FondoV1.png')}}');
            color: white;
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 80px;
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
            align-items: center;
            justify-content: center;
        }

        .card {
            width: 70%; /* Ajuste del ancho de la tarjeta */
            max-width: 800px;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            font-weight: bold;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .items-center {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .form-label {
            font-weight: bold;

        }

        .form-control[disabled] {
            background-color: #f8f9fa;
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

        video {
            margin-top: 10px;
            border-radius: 50px;
        }
    </style> -->

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
            <div class="card-header">
                <h2>Datos del Beneficiario {{$beneficiario->nombre}} {{$beneficiario->apellido_p}}</h2>
            </div>

            <div class="form-group">
                <label for="nombre" class="form-label">Nombre del beneficiario:</label>
                <input type="text" class="form-control" id="nombre" value="{{$beneficiario->nombre}}" disabled>
            </div>
            <div class="form-group">
                <label for="apellido_paterno" class="form-label">Apellido paterno:</label>
                <input type="text" class="form-control" id="apellido_paterno" value="{{$beneficiario->apellido_p}}"
                    disabled>
            </div>
            <div class="form-group">
                <label for="apellido_materno" class="form-label">Apellido materno:</label>
                <input type="text" class="form-control" id="apellido_materno" value="{{$beneficiario->apellido_m}}"
                    disabled>
            </div>
            <div class="form-group">
                <label for="curp" class="form-label">CURP del beneficiario:</label>
                <input type="text" class="form-control" id="curp" value="{{$beneficiario->curp}}" disabled>
            </div>
            <div class="form-group">
                <label for="code" class="form-label">Código del Beneficiario:</label>
                <input type="text" class="form-control" id="code" value="{{$beneficiario->folio_cb}}" disabled>
            </div>
            <div class="form-group">
                <label for="direccion" class="form-label">Dirección:</label>
                <input type="text" class="form-control" id="direccion" value="{{$beneficiario->direccion}}" disabled>
            </div>
            <div class="form-group">
                <label for="fecha_nacimiento" class="form-label">Fecha de nacimiento:</label>
                <input type="text" class="form-control" id="fecha_nacimiento" value="{{$beneficiario->fecha_nac}}"
                    disabled>
            </div>
            <div class="form-group">
                <label for="num_beneficiarios" class="form-label">Número de dependientes:</label>
                <input type="text" class="form-control" id="num_beneficiarios" value="{{$beneficiario->n_dependientes}}"
                    disabled>
            </div>
            <div class="form-group">
                <label for="curp_beneficiarios" class="form-label">CURP de los dependientes:</label>
                @foreach($dependientes as $dependiente)
                    <input class="form-control" id="curp_beneficiarios" value="{{$dependiente->curp}}" disabled>
                @endforeach
            </div>
            <div class="form-group">
                <label for="d_asis" class="form-label">Dias de asistencia</label>
                <input disabled type="text" class="form-control" id="d_asist1" name="d_asist1"
                    value="{{$beneficiario->d_asist1}}">
                <input disabled type="text" class="form-control" id="d_asist2" name="d_asist2"
                    value="{{$beneficiario->d_asist2}}">
                <input disabled type="text" class="form-control" id="d_asist3" name="d_asist3"
                    value="{{$beneficiario->d_asist3}}">
            </div>
            <div class="btn-container">
                <a href="{{ route('beneficiarios.edit', $beneficiario->id) }}" class="btn1">Editar</a>
                <a href="{{ route('beneficiarios.destroy', $beneficiario->id) }}" class=" btn1">Borrar</a>
            </div>

            <div class="text-center">
                <div>
                    <video class="video" id="video" width="640" height="360" autoplay></video> <br>
                    <button class="btn1" id="capture-btn">Capturar Foto</button>
                    <button hidden class="btn1" id="getCard">Obtener tarjeta</button>
                </div>
                <div>
                    <form action="{{ route('beneficiarios.imagen') }}" method="post" id="photo-form"
                        style="display: none;">
                        @csrf
                        <input type="hidden" name="photo" id="photo-input">
                        <input type="hidden" name="id" value="{{$beneficiario->id}}">
                        <button type="submit" class="btn">Guardar Foto</button>
                    </form>
                </div>
            </div>
            <br>
            <div class="items-center">
                <canvas id="canvas" style="display: none;"></canvas>
            </div>
            <img hidden id="photo-preview" width="600px" height="400px" src="{{public_path('img/logo_liconsa.jpg')}}"
                alt="Previsualización de la foto">
        </div>

    </div>
    <footer class="footer">
        <p>LICONSA 2024</p>
    </footer>

    <!-- Bootstrap JS (optional) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="{{ asset('JS/photo.js') }}"></script>
    <!-- Agrega este script al final del body para garantizar que los elementos estén cargados -->
    <script>
        // Obtén los botones por su id
        const captureBtn = document.getElementById('capture-btn');
        const getCardBtn = document.getElementById('getCard');

        // Agrega un evento de clic al botón "Capturar Foto"
        captureBtn.addEventListener('click', function () {
            // Tu lógica para capturar la foto aquí

            // Muestra el botón "Obtener tarjeta"
            getCardBtn.hidden = false;
        });

        // Agrega un evento de clic al botón "Obtener tarjeta"
        getCardBtn.addEventListener('click', function () {
            // Obtén el id del beneficiario
            const beneficiarioId = {{$beneficiario->id}};

            // Redirige a la ruta card-pdf con el id del beneficiario
            window.location.href = `/card-pdf/${beneficiarioId}`;
        });
    </script>
    <script>
        // Obtén el botón por su id
        const getCardBtn1 = document.getElementById('getCard');

        // Agrega un evento de clic al botón
        getCardBtn1.addEventListener('click', function () {
            // Obtén el id del beneficiario
            const beneficiarioId = {{$beneficiario->id}};

            // Redirige a la ruta card-pdf con el id del beneficiario
            window.location.href = `/card-pdf/${beneficiarioId}`;
        });
    </script>

</body>

</html>