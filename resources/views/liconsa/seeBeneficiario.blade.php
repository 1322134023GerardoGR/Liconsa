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
        .btn {
            margin: 0 10px;
            padding: 15px 30px;
            border: none;
            border-radius: 5px;
            background-color: #621132;
            color: white;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .btn i {

        }
        .btn:hover {
            background-color: #4a0e27;
        }
    </style>
</head>
<body class="font-sans  antialiased">
<header class="header">
    <h1>Liconsa</h1>
    <h2>Gobierno de México</h2>
</header>

<div class="content">

    <div class="card">
        <div class="card-header"><h2>Datos del Beneficiario {{$beneficiario->nombre}} {{$beneficiario->apellido_p}}</h2></div>

        <div class="form-group">
            <label for="nombre" class="form-label">Nombre del beneficiario:</label>
            <input type="text" class="form-control" id="nombre" value="{{$beneficiario->nombre}}" disabled>
        </div>
        <div class="form-group">
            <label for="apellido_paterno" class="form-label">Apellido paterno:</label>
            <input type="text" class="form-control" id="apellido_paterno" value="{{$beneficiario->apellido_p}}" disabled>
        </div>
        <div class="form-group">
            <label for="apellido_materno" class="form-label">Apellido materno:</label>
            <input type="text" class="form-control" id="apellido_materno" value="{{$beneficiario->apellido_m}}" disabled>
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
            <input type="text" class="form-control" id="num_beneficiarios" value="{{$beneficiario->n_dependientes}}" disabled>
        </div>
        <div class="form-group">
            <label for="curp_beneficiarios" class="form-label">CURP de los dependientes:</label>
            <textarea class="form-control" id="curp_beneficiarios" rows="3" disabled>MALA010101HDFXXXA1
MALB010101HDFXXXA2</textarea>
        </div>
        <div class="btn-container">
            <a href="{{ route('beneficiarios.destroy', $beneficiario->id) }}" class="btn">Borrar</a>
            <a href="{{ route('beneficiarios.edit', $beneficiario->id) }}" class="btn">Editar</a>

        </div>

        <div class="">
            <div>
                <video id="video" width="640" height="480" autoplay></video>
                <button id="capture-btn">Capturar Foto</button>
            </div>
            <div>
                <form action="{{ route('beneficiarios.store') }}" method="post" id="photo-form" style="display: none;">
                    @csrf
                    <input type="hidden" name="photo" id="photo-input">
                    <input type="hidden" name="id" value="{{$beneficiario->id}}">
                    <button type="submit" class="btn">Guardar Foto</button>
                </form>
            </div>
            <div>
                <canvas id="canvas" style="display: none;"></canvas>

            </div>
            <img id="photo-preview" width="600px" height="400px" src="" alt="Previsualización de la foto">

        </div>

    </div>

</div>
<footer class="footer">
    <p>LICONSA  2024</p>
</footer>

<!-- Bootstrap JS (optional) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="{{ asset('JS/photo.js') }}"></script>
</body>
</html>
