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
            background-color: #D4C19C;
            min-height: calc(100vh - 160px);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .form-container {
            width: 100%; /* Ajuste del ancho del formulario */
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
    <div id="sidebarToggle" onclick="toggleSidebar()">
        <span></span>
        <span></span>
        <span></span>
    </div>
</header>
<div class="sidebar" id="sidebar">
    <!-- Barra de navegación -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <div class="container-fluid">
            <!-- Botón de alternancia de la barra lateral -->
            <!-- Contenido de la barra de navegación -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                    <li class="nav-item active"><a class="nav-link" href="#!">
                            <button class="btn">Lista de Beneficiarios</button>
                        </a></li>
                    <li class="nav-item"><a class="nav-link" href="#!">
                            <button class="btn"><i class="fas fa-user-plus"></i>Registrar Beneficiario</button>
                        </a></li>
                    <li class="nav-item"><a class="nav-link" href="#!">
                            <button class="btn"><i class="fas fa-cart-plus"></i>Registrar Nueva Venta</button>
                        </a></li>
                    <li class="nav-item"><a class="nav-link" href="#!">
                            <button class="btn" onclick="showForm()"><i class="fas fa-search"></i>Buscar Beneficiario
                            </button>
                        </a></li>
                    <li class="nav-item"><a class="nav-link" href="#!">
                            <button class="btn">Registrar Usuario</button>
                        </a></li>
                </ul>
            </div>
        </div>
    </nav>
</div>
<div class="content">
    <div class="form-container">
        <form>
            <div class="form-group">
                <label for="nombre" class="form-label">Nombre del interesado:</label>
                <input type="text" class="form-control" id="nombre" placeholder="Ej. Gerardo">
            </div>
            <div class="form-group">
                <label for="apellido_paterno" class="form-label">Apellido paterno:</label>
                <input type="text" class="form-control" id="apellido_paterno" placeholder="Ej. Gutiérrez">
            </div>
            <div class="form-group">
                <label for="apellido_materno" class="form-label">Apellido materno:</label>
                <input type="text" class="form-control" id="apellido_materno" placeholder="Ej. Ramírez">
            </div>
            <div class="form-group">
                <label for="edad" class="form-label">Edad:</label>
                <input type="number" class="form-control" id="edad" placeholder="Ej. 25">
            </div>
            <div class="form-group">
                <label for="curp" class="form-label">CURP del interesado:</label>
                <input type="text" class="form-control" id="curp" placeholder="Ej. GURG080412HDFDRRA3">
            </div>
            <div class="form-group">
                <label for="direccion" class="form-label">Dirección:</label>
                <input type="text" class="form-control" id="direccion"
                       placeholder="Ej. Villa del Real, Canes 35, Tecámac Edo.Mex.">
            </div>
            <div class="form-group">
                <label for="fecha_nacimiento" class="form-label">Fecha de nacimiento:</label>
                <input type="date" class="form-control" id="fecha_nacimiento" placeholder="Ej. 12/08/2004">
            </div>
            <div class="form-group">
                <label for="num_beneficiarios" class="form-label">Número de beneficiarios:</label>
                <input type="number" class="form-control" id="num_beneficiarios" placeholder="Ej. 3">
            </div>
            <div class="form-group">
                <label for="curp_beneficiarios" class="form-label">CURP de los beneficiarios:</label>
                <input class="form-control" id="curp_beneficiarios" placeholder="Ej. GURG080412HDFDRRA3">
            </div>
            <div class="form-group">
                <label for="Nlecheria" class="form-label">N° Lecheria:</label>
                <input type="number" class="form-control" id="Nlecheria" placeholder="Ej. 65469158647">
            </div>
            <div class="btn-container">
                <button type="button" class="btn">Tomar foto de tarjeta</button>
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
<script>
    function toggleSidebar() {
        var sidebar = document.getElementById('sidebar');
        var sidebarToggle = document.getElementById('sidebarToggle');
        sidebar.classList.toggle('active');
        sidebarToggle.classList.toggle('active');
    }
</script>
</body>
</html>
