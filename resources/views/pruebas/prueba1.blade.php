<!DOCTYPE html>
<html lang="">
<head>
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
    <title>prueba1</title>
</head>
<body>
<div class="header">
    <h1>Liconsa</h1>
    <h2>Gobierno de México</h2>
</div>
<div class="content">
    <div class="login">
        <h3>Inicio de sesión</h3>
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
