<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>LICONSA</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <!-- Scripts -->
    @vite(['resources/js/app.js'])

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .header {
            background-color: #13322B; /* Cambio de color */
            color: white;
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 80px;
            padding: 20px;
        }
        .footer {
            background-color: #9D2449; /* Cambio de color */
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 80px;
            padding: 20px;
        }
        .content {
            background-color: #FFFFFF; /* Cambio de color */
            min-height: calc(100vh - 160px);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        .login {
            width: 300px;
            border: 1px solid #ccc;
            padding: 20px;
        }
        .login input {
            width: 100%;
            margin: 10px 0;
            padding: 10px;
            border: 1px solid #ccc;
        }
        .login button {
            width: 100%;
            margin: 10px 0;
            padding: 10px;
            border: 1px solid #621132; /* Cambio de color */
            background-color: white;
            color: #621132; /* Cambio de color */
        }
        .login a {
            display: block;
            text-align: center;
            color: #006633;
            text-decoration: none;
        }
    </style>
</head>
<body class="font-sans antialiased">
<header class="header">
    <h1>Liconsa</h1>
    <h2>Gobierno de México</h2>
</header>

<div class="content mt-5">
    <div class="row">
        <div class="col-md-6">
            <!-- Botón para acceder a beneficiarios -->
            <a href="beneficiarios.html" class="btn btn-primary btn-lg btn-block">Acceder a Beneficiarios</a>
        </div>
        <div class="col-md-6">
            <!-- Botón para acceder a ventas -->
            <a href="ventas.html" class="btn btn-success btn-lg btn-block">Acceder a Ventas</a>
        </div>
    </div>
</div>

<footer class="footer">
    <p>LICONSA © 2024</p>
</footer>
</body>
</html>
