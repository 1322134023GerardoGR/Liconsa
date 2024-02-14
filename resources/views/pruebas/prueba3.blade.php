<html lang="">
<head>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        .header {
            background-color: #006633;
            color: white;
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 80px;
            padding: 20px;
        }
        .footer {
            background-color: #006633;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 80px;
            padding: 20px;
        }
        .content {
            background-color: white;
            min-height: calc(100vh - 160px);
        }
        .jumbotron {
            background-color: #99cc99;
            color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 200px;
            padding: 20px;
        }
        .login {
            width: 300px;
            margin: 0 auto;
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
    <title></title>
</head>
<body>
<div class="header">
    <h1>Liconsa</h1>
    <h2>Gobierno de México</h2>
</div>
<div class="content">
    <div class="jumbotron">
        <h1>Inicio de sesión</h1>
        <p>Ingresa tus credenciales para acceder al sistema de Liconsa.</p>
    </div>
    <div class="login">
        <input type="text" placeholder="Usuario">
        <input type="password" placeholder="Contraseña">
        <button>Iniciar</button>
        <a href="#">¿Olvidaste tu contraseña?</a>
    </div>
</div>
<div class="footer">
    <p>Todos los derechos reservados © 2024</p>
</div>
</body>
</html>
