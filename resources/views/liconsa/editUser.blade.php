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

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
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
                <input type="text" name="apellido_p" class="form-control" id="apellido_p" value="{{$trabajadores->apellido_p}}">
            </div>
            <div class="form-group">
                <label for="apellido_m" class="form-label">Apellido materno:</label>
                <input type="text" name="apellido_m" class="form-control" id="apellido_m" value="{{$trabajadores->apellido_m}}">
            </div>
            <div class="form-group">
                <label for="curp" class="form-label">CURP:</label>
                <input type="text" name="curp" class="form-control" id="curp" value="{{$trabajadores->curp}}">
            </div>
            <div class="form-group">
                <label for="rfc" class="form-label">RFC:</label>
                <input type="text" name="rfc" class="form-control" id="rfc"  value="{{$trabajadores->rfc}}">
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
                <button type="submit" class="btn"><i class="fas fa-save"></i>Guardar</button>
                <button type="reset" class="btn"><i class="fas fa-times"></i>Cancelar</button>
            </div>
        </form>
    </div>
</div>
<footer class="footer">
    <p>LICONSA © 2024</p>
</footer>

<!-- Bootstrap JS (optional) -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
