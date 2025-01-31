<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LICONSA</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    @vite(['resources/js/app.js'])
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
        .header::after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 16vh;
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
        nav.navbar {
            background-color: #A57F2C;
            padding: 10px 20px;
            display: flex;
            gap: 15px;
            align-items: center;
            justify-content: center;!important;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            font-weight: bold;
            font-size: 20px;
            padding: 10px 15px;
            border-radius: 5px;
            transition: background-color 0.3s;
            justify-content: center;
        }

        .navbar a:hover {
            background-color: #621132;
        }

        .content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            padding: 20px;
            max-width: 1200px;
            margin: auto;
        }

        .panel {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .btn1 {
            background-color: #621132;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 20px;
            cursor: pointer;
            transition: 0.3s;
            text-decoration: none;
            display: inline-block;
            margin-bottom: 10px;
            margin-top: 20px;
        }

        .btn1:hover {
            background-color: #4a0e27;
        }

        .image-container img {
            width: 50px;
            height: auto;
        }

        .footer {
            background-color: #621132;
            background-image: url("{{ asset('img/fondofootergob.png') }}");
            background-size: cover;
            background-position: center;
            color: white;
            text-align: center;
            padding: 15px;
            margin-top: auto;
        }
        .codigo-benef{
         font-size: 20px;
        }
        .num-benef{
            font-family: 'Libre Baskerville', serif;
            height: 50px;
        }
    </style>
</head>
<body>
<header class="header">
    <h1 class="logo-text">LICONSA</h1>
    <img class="logo-mexico" src="{{ asset('img/logo_gobierno_mexico.png') }}" alt="logo de mexico">
</header>
<nav class="navbar">
    <a href="{{route('index')}}">Inicio</a>
    <a href="{{route('beneficiarios.list')}}">Lista de Beneficiarios</a>
    <a href="{{route('beneficiarios.nuevo')}}">Registrar Beneficiario</a>
    <a href="{{route('add.sell')}}">Registrar Nueva Venta</a>
    <a href="{{route('user.nuevo')}}">Registrar Usuario</a>
    <a href="{{route('trabajadores.list')}}">Lista de Usuarios</a>
    <a href="{{route('ventas.list')}}">Lista de Ventas</a>
</nav>

<div class="content">
    <div class="panel">
        <a class="btn1" href="{{route('beneficiarios.list')}}">Lista de Beneficiarios</a>
        <div class="image-container">
            <img src="/img/bx-list-ul.svg" alt="Leche"/>
        </div>
    </div>

    <div class="panel">
        <a class="btn1" href="{{route('beneficiarios.nuevo')}}">Registrar Beneficiario</a>
        <div class="image-container">
            <img src="/img/bx-user-plus.svg" alt="Leche"/>
        </div>
    </div>

    <div class="panel">
        <a class="btn1" href="{{route('add.sell')}}">Registrar Nueva Venta</a>
        <div class="image-container">
            <img src="/img/bx-dollar-circle.svg" alt="Leche"/>
        </div>
    </div>

    <div class="panel">
        <form action="{{ route('beneficiarios.buscar') }}" method="GET">
            @csrf
            <label class="codigo-benef" for="codigo">Código del Beneficiario:</label>
            <input class="num-benef" type="text" id="codigo" name="codigo" required>
            <button type="submit" class="btn1">Buscar</button>
        </form>
        <div class="image-container">
            <img src="/img/bx-search-alt-2.svg" alt="Leche"/>
        </div>
    </div>

    <div class="panel">
        <a class="btn1" href="{{route('user.nuevo')}}">Registrar Usuario</a>
        <div class="image-container">
            <img src="/img/bx-user.svg" alt="Leche"/>
        </div>
    </div>
</div>

<footer class="footer">
    <p class="footer-text">LICONSA © 2025</p>
</footer>
</body>
</html>
