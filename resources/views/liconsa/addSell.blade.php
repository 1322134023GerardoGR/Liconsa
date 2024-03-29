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

        .items-center {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .viewport {
            width: 100%;
            max-width: 640px; /* Ajuste del ancho del lector */
            height: 470px; /* Ajuste de la altura del lector */
            margin-top: -6px;
            border-radius: 2px;
        }

        video {
            border-radius: 50px;
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
                        <a class="nav-link active" href="{{route('add.sell')}}">Registrar Nueva Venta</a>
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


<form action="{{route('ventas.store')}}" method="POST">
    @csrf
    <div class="content">
        <div class="panel"> <!-- Contenedor del panel blanco -->
            <h1>Registrar Venta</h1>
            <div class="form-group">
                <label for="code">Código del Beneficiario:</label>
                <input name="code" type="text" class="form-control" id="code">
            </div>
            <div class="form-group">
                <label for="litros_v">Número de litros de leche:</label>
                <input onchange="changePrice(this.value)" name="litros_v" type="number" class="form-control" id="litros_v">
            </div>
            <div class="form-group">
                <label for="num_lecheria">Número de Lechería:</label>
                <input name="num_lecheria" type="number" class="form-control" id="num_lecheria">
            </div>
            <div class="form-group">
                <label for="costo">Costo total:</label>
                <input disabled name="costo" type="number" class="form-control" id="costo">
            </div>

            <div class="items-center">
                <div id="interactive" class="viewport"></div>
            </div>
            <div class="btn-container">
                <button type="submit" class=" btn1">Realizar Compra</button>
                <button type="reset" class=" btn1" onclick="showForm()">Cancelar Compra</button>
            </div>

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
    </div>
</form>
<footer class="footer">
    <p>LICONSA © 2024</p>
</footer>
<script src="https://cdn.jsdelivr.net/npm/quagga/dist/quagga.min.js"></script>
<script src="{{ asset('JS/script.js') }}"></script>
<script>
    function changePrice(value) {
        // Obtener el valor del input litros_v y convertirlo a número
        const litros = parseFloat(value);

        // Verificar si litros es un número válido
        if (!isNaN(litros)) {
            // Calcular el costo multiplicando litros por 6.50
            const costo = litros * 6.50;

            // Actualizar el valor del input costo con el costo calculado
            document.getElementById('costo').value = costo.toFixed(2); // Limitar a 2 decimales
        } else {
            // Si el valor ingresado no es un número válido, mostrar un mensaje de error o manejarlo según necesites
            alert('Por favor ingrese un número válido de litros.');
        }
    }

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
