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

        .sidebar {
            position: fixed;
            top: 0;
            left: -250px; /* Oculta la barra lateral al inicio */
            width: 250px; /* Ancho original de la barra lateral */
            min-width: 80px; /* Ancho mínimo para asegurar visibilidad de íconos */
            height: 100%;
            background-color: #13322B;
            transition: all 0.3s ease;
            z-index: 1000; /* Asegura que esté por encima de otros elementos */
            padding-top: 80px; /* Ajusta para que no cubra el encabezado */
        }

        .sidebar.active {
            left: 0; /* Muestra la barra lateral al activarse */
        }

        .sidebar .nav-item {
            margin: 20px;
        }

        /* Estilo para el botón de alternancia */
        #sidebarToggle {
            position: absolute;
            left: 20px;
            top: 20px;
            cursor: pointer;
            z-index: 1500; /* Asegura que esté por encima de otros elementos */
        }

        /* Estilo para el icono de alternancia */
        #sidebarToggle span {
            background-color: white;
            width: 30px;
            height: 5px;
            display: block;
            margin-bottom: 5px;
            transition: all 0.3s ease;
        }

        /* Estilo para el icono de alternancia cuando está activo */
        #sidebarToggle.active span:nth-child(1) {
            transform: rotate(45deg) translate(5px, 5px);
        }

        #sidebarToggle.active span:nth-child(2) {
            opacity: 0;
        }

        #sidebarToggle.active span:nth-child(3) {
            transform: rotate(-45deg) translate(7px, -8px);
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
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .panel {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 70%; /* Ajuste del ancho del panel */
            max-width: 800px;
            margin-bottom: 20px;
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

        img {
            width: 200px; /* Ajuste del ancho de la imagen */
            margin-bottom: 20px;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
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
                        <a class="nav-link " href="#">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Lista de Beneficiarios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Registrar Beneficiario</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Registrar Nueva Venta</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Buscar Beneficiario</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"> Registrar Usuario</a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>
</div>
<div class="content">
    <div class="panel"> <!-- Contenedor del panel blanco -->
        <h1>Registrar Venta</h1>
        <div class="form-group">
            <label for="curp">CURP del Beneficiario:</label>
            <input type="text" class="form-control" id="curp">
        </div>
        <div class="form-group">
            <label for="litros">Número de litros de leche:</label>
            <input type="number" class="form-control" id="litros">
        </div>
        <div class="form-group">
            <label for="num_lecheria">Número de Lechería:</label>
            <input type="text" class="form-control" id="num_lecheria">
        </div>
        <img src="https://via.placeholder.com/200" alt="Leche"/>
        <div class="btn-container">
            <button class="btn">Realizar Compra</button>
            <button class="btn" onclick="showForm()">Cancelar Compra</button>
        </div>
    </div>

    <!-- Formulario flotante -->
    <div class="overlay" id="overlay">
        <div class="form-container">
            <span class="close-btn" onclick="hideForm()">&times;</span>
            <h2>Ingrese la contraseña del Supervisor</h2>
            <form>
                <div class="form-group">
                    <label for="password">Contraseña:</label>
                    <input type="password" id="password" class="form-control">
                </div>
                <div class="btn-container">
                    <button type="submit" class="btn btn-primary">Confirmar</button>
                    <button type="button" class="btn btn-secondary" onclick="hideForm()">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<footer class="footer">
    <p>LICONSA © 2024</p>
</footer>

<script>
    function showForm() {
        document.getElementById('overlay').style.display = 'flex';
    }

    function hideForm() {
        document.getElementById('overlay').style.display = 'none';
    }

    function toggleSidebar() {
        var sidebar = document.getElementById('sidebar');
        var sidebarToggle = document.getElementById('sidebarToggle');
        sidebar.classList.toggle('active');
        sidebarToggle.classList.toggle('active');
    }
</script>
</body>
</html>
