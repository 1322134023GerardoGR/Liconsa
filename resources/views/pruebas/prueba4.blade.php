<html>
<head>
    <!-- Importar bootstrap desde un CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Estilos personalizados */
        .header {
            background-color: #006633;
            color: white;
        }
        .footer {
            background-color: #006633;
            color: white;
        }
        .login {
            border: 1px solid #ccc;
            padding: 20px;
        }
        .login input {
            margin: 10px 0;
            padding: 10px;
            border: 1px solid #ccc;
        }
        .login button {
            margin: 10px 0;
            padding: 10px;
            border: 1px solid #f00;
            background-color: white;
            color: #f00;
        }
        .login a {
            display: block;
            text-align: center;
            color: #006633;
            text-decoration: none;
        }
    </style>
</head>
<body>
<!-- Header con navbar -->
<div class="header">
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="liconsa-logo.png" alt="Liconsa" height="40">
            </a>
            <div class="navbar-text ml-auto">
                Gobierno de México
            </div>
        </div>
    </nav>
</div>
<!-- Contenido con container, row y col -->
<div class="container">
    <!-- Zona que dice inicio de sesión con jumbotron -->
    <div class="jumbotron">
        <h1 class="display-4">Inicio de sesión</h1>
        <p class="lead">Ingresa tus credenciales para acceder al sistema de Liconsa.</p>
    </div>
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="login">
                <input type="text" placeholder="Usuario">
                <input type="password" placeholder="Contraseña">
                <button>Iniciar</button>
                <a href="#">¿Olvidaste tu contraseña?</a>
            </div>
        </div>
    </div>
</div>
<!-- Footer con card -->
<div class="footer">
    <div class="card">
        <div class="card-body">
            <p class="card-text text-center">
                Todos los derechos reservados © 2024
            </p>
        </div>
    </div>
</div>
<!-- Importar bootstrap desde un CDN -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
