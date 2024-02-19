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
<div class="content">
    <div class="form-container">
        <form>
            <div class="form-group">
                <label for="nombre" class="form-label">Nombre del interesado:</label>
                <input type="text" class="form-control" id="nombre">
            </div>
            <div class="form-group">
                <label for="apellido_paterno" class="form-label">Apellido paterno:</label>
                <input type="text" class="form-control" id="apellido_paterno">
            </div>
            <div class="form-group">
                <label for="apellido_materno" class="form-label">Apellido materno:</label>
                <input type="text" class="form-control" id="apellido_materno">
            </div>
            <div class="form-group">
                <label for="curp" class="form-label">CURP del interesado:</label>
                <input type="text" class="form-control" id="curp">
            </div>
            <div class="form-group">
                <label for="direccion" class="form-label">Dirección:</label>
                <input type="text" class="form-control" id="direccion">
            </div>
            <div class="form-group">
                <label for="fecha_nacimiento" class="form-label">Fecha de nacimiento:</label>
                <input type="date" class="form-control" id="fecha_nacimiento">
            </div>
            <div class="form-group">
                <label for="num_beneficiarios" class="form-label">Número de beneficiarios:</label>
                <input type="number" class="form-control" id="num_beneficiarios">
            </div>
            <div class="form-group">
                <label for="curp_beneficiarios" class="form-label">CURP de los beneficiarios:</label>
                <textarea class="form-control" id="curp_beneficiarios" rows="3"></textarea>
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
