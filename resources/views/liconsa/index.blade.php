<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <!-- Encabezado omitido por brevedad -->
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
            padding: 40px;
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
            display: grid;
            background-color: #D4C19C;
            grid-template-columns: repeat(2, 1fr);
            grid-gap: 20px;
            padding: 20px;
        }

        .panel {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            margin: 0 80px; /* Margen añadido a los lados */
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

        .image-container {
            grid-column: span 2;
            text-align: center;
        }

        img {
            width: 100px; /* Ajuste del ancho de la imagen */
        }

        /* Estilos para el formulario flotante */
        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: none;
            align-items: center;
            justify-content: center;
        }

        .form-container {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
        }

        h1 {
            text-align: center;
        }

        /* Clase adicional para centrar el último panel */
        .center-panel {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            margin: 0 450px; /* Margen añadido a los lados */
            grid-column: span 2;
        }
        .mynav{
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
        .asd{
            background-color: #285C4D;
        }
        .alerta2{
            margin-bottom: 0;
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
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse asd" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link "  href="{{route('index')}}">Inicio</a>
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
                        <a class="nav-link" href="">Buscar Beneficiario</a>
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

    <div class="panel">
        <div class="btn-container">
            <a class=" btn1">Lista de Beneficiarios</a>
        </div>
        <div class="image-container">
            <img src="/img/bx-list-ul.svg" alt="Leche"/>
        </div>
    </div>

    <div class="panel">
        <div class="btn-container">
            <button class="btn1"><i class="fas fa-user-plus"></i>Registrar Beneficiario</button>
        </div>
        <div class="image-container">
            <img src="/img/bx-user-plus.svg" class="" alt="Leche"/>
        </div>
    </div>

    <div class="panel">
        <div class="btn-container">
            <button class=" btn1"><i class="fas fa-cart-plus"></i>Registrar Nueva Venta</button>
        </div>
        <div class="image-container">
            <img src="/img/bx-dollar-circle.svg" alt="Leche"/>
        </div>
    </div>

    <div class="panel">
        <div class="btn-container">
            <button class=" btn1"  onclick="showForm()"><i class="fas fa-search"></i>Buscar Beneficiario</button>
        </div>
        <div class="image-container">
            <img src="/img/bx-search-alt-2.svg" alt="Leche"/>
        </div>
    </div>

    <!-- Panel centrado -->
    <div class="panel center-panel">
        <div class="btn-container">
            <button class=" btn1">Registrar Usuario</button>
        </div>
        <div class="image-container">
            <img src="/img/bx-user.svg" alt="Leche"/>
        </div>
    </div>

    <!-- Formulario flotante -->
    <div class="overlay" id="overlay">
        <div class="form-container">
            <span class="close-btn" onclick="hideForm()">&times;</span>
            <h2>Buscar Beneficiario</h2>
            <form>
                <div class="form-group">
                    <label for="curp">Ingrese CURP:</label>
                    <input type="text" id="curp" class="form-control">
                </div>
                <div class="btn-container">
                    <button type="button" class="btn btn-primary">Buscar</button>
                    <button type="button" class="btn btn-secondary" onclick="hideForm()">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<footer class="footer">
    <p>LICONSA © 2024</p>
</footer>


</body>
</html>
