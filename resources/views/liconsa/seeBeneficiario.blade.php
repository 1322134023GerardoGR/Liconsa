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
            margin-bottom: 0;
        }
        video {
            margin-top: 10px;
            border-radius: 50px;
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
                        <a class="nav-link active" href="">Buscar Beneficiario</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('user.nuevo')}}"> Registrar Usuario</a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>

</div>
@if(session('success'))
    <div class="alert alert-success alerta2 " role="alert">
        {{ session('success') }}
    </div>
@endif
@if($errors->any())
    <div class="alert alert-danger alerta2" role="alert">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="content">

    <div class="card">
        <div class="card-header"><h2>Datos del Beneficiario {{$beneficiario->nombre}} {{$beneficiario->apellido_p}}</h2>
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
            <label for="direccion" class="form-label">Dirección:</label>
            <input type="text" class="form-control" id="direccion" value="{{$beneficiario->direccion}}" disabled>
        </div>
        <div class="form-group">
            <label for="fecha_nacimiento" class="form-label">Fecha de nacimiento:</label>
            <input type="text" class="form-control" id="fecha_nacimiento" value="{{$beneficiario->fecha_nac}}" disabled>
        </div>
        <div class="form-group">
            <label for="num_beneficiarios" class="form-label">Número de dependientes:</label>
            <input type="text" class="form-control" id="num_beneficiarios" value="{{$beneficiario->n_dependientes}}"
                   disabled>
        </div>
        <div class="form-group">
            <label for="curp_beneficiarios" class="form-label">CURP de los dependientes:</label>
            <textarea class="form-control" id="curp_beneficiarios" rows="3" disabled>MALA010101HDFXXXA1
MALB010101HDFXXXA2</textarea>
        </div>
        <div class="btn-container">
            <a href="{{ route('beneficiarios.edit', $beneficiario->id) }}" class="btn1">Editar</a>
            <a href="{{ route('beneficiarios.destroy', $beneficiario->id) }}" class=" btn1">Borrar</a>
        </div>

        <div class="text-center">
            <div>
                <video class="video" id="video" width="640" height="360" autoplay></video>
                <button class="btn1" id="capture-btn">Capturar Foto</button>
                <button hidden class="btn1" id="getCard">Obtener tarjeta</button>
            </div>
            <div>
                <form action="{{ route('beneficiarios.imagen') }}" method="post" id="photo-form" style="display: none;">
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
        <img id="photo-preview" width="600px" height="400px" src="" alt="Previsualización de la foto">
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
    captureBtn.addEventListener('click', function() {
        // Tu lógica para capturar la foto aquí

        // Muestra el botón "Obtener tarjeta"
        getCardBtn.hidden = false;
    });

    // Agrega un evento de clic al botón "Obtener tarjeta"
    getCardBtn.addEventListener('click', function() {
        // Obtén el id del beneficiario
        const beneficiarioId = {{$beneficiario->id}};

        // Redirige a la ruta card-pdf con el id del beneficiario
        window.location.href = `/card-pdf/${beneficiarioId}`;
    });
</script>
<script>
    // Obtén el botón por su id
    const getCardBtn = document.getElementById('getCard');

    // Agrega un evento de clic al botón
    getCardBtn.addEventListener('click', function() {
        // Obtén el id del beneficiario
        const beneficiarioId = {{$beneficiario->id}};

        // Redirige a la ruta card-pdf con el id del beneficiario
        window.location.href = `/card-pdf/${beneficiarioId}`;
    });
</script>

</body>
</html>
