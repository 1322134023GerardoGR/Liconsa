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
            display: grid;
            background-color: #D4C19C;
            grid-template-columns: repeat(2, 1fr);
            grid-gap: 20px;
            height: calc(100vh - 160px);
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
    </style>
</head>
<body class="font-sans  antialiased">
<header class="header">
    <h1>Liconsa</h1>
    <h2>Gobierno de México</h2>
</header>
<div class="content">

    <div class="panel">
        <div class="btn-container">
            <button class="btn">Lista de Beneficiarios</button>
        </div>
        <div class="image-container">
            <img src="/img/bx-list-ul.svg" alt="Leche" />
        </div>
    </div>

    <div class="panel">
        <div class="btn-container">
            <button class="btn"><i class="fas fa-user-plus"></i>Registrar Beneficiario</button>
        </div>
        <div class="image-container">
            <img src="/img/bx-user-plus.svg" alt="Leche" />
        </div>
    </div>

    <div class="panel">
        <div class="btn-container">
            <button class="btn"><i class="fas fa-cart-plus"></i>Registrar Nueva Venta</button>
        </div>
        <div class="image-container">
            <img src="/img/bx-dollar-circle.svg" alt="Leche" />
        </div>
    </div>

    <div class="panel">
        <div class="btn-container">
            <button class="btn" onclick="showForm()"><i class="fas fa-search"></i>Buscar Beneficiario</button>
        </div>
        <div class="image-container">
            <img src="/img/bx-search-alt-2.svg" alt="Leche" />
        </div>
    </div>

    <!-- Panel centrado -->
    <div class="panel center-panel">
        <div class="btn-container">
            <button class="btn">Registrar Usuario</button>
        </div>
        <div class="image-container">
            <img src="/img/bx-user.svg" alt="Leche" />
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

<script>
    function showForm() {
        document.getElementById('overlay').style.display = 'flex';
    }

    function hideForm() {
        document.getElementById('overlay').style.display = 'none';
    }
</script>
</body>
</html>
