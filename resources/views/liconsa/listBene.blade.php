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
        body {
            font-family: 'figtree', sans-serif;
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
        .user-list {
            width: 80%;
            max-width: 1150px;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .user-list h2 {
            margin-bottom: 20px;
            text-align: center;
        }
        .user-table {
            width: 100%;
            border-collapse: collapse;
        }
        .user-table th, .user-table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        .user-table th {
            background-color: #13322B;
            color: white;
        }
        .user-table tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .user-table tr:hover {
            background-color: #ddd;
        }
        .pagination {
            margin-top: 20px;
            display: flex;
            justify-content: center;
        }
        .pagination button {
            padding: 5px 10px;
            margin: 0 5px;
            background-color: #13322B;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .pagination button:hover {
            background-color: #0b1b14;
        }
    </style>
</head>
<body>
<header class="header">
    <h1>Liconsa</h1>
    <h2>Gobierno de México</h2>
</header>
<div class="content">
    <div class="user-list">
        <h2>Beneficiarios Registrados</h2>
        <table class="user-table">
            <thead>
            <tr>
                <th>Nombre(s)</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>CURP</th>
                <th>Dirección</th>
                <th>Fecha de Nacimiento</th>
                <th>Número de Beneficiarios</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>Juan</td>
                <td>Pérez</td>
                <td>Gómez</td>
                <td>PERJ901011HDFJR01</td>
                <td>Calle 123, Col. Centro</td>
                <td>1990-10-11</td>
                <td>3</td>
            </tr>
            <tr>
                <td>Maria</td>
                <td>González</td>
                <td>Rodríguez</td>
                <td>GORM890325MDFNG02</td>
                <td>Avenida XYZ, Col. Norte</td>
                <td>1989-03-25</td>
                <td>2</td>
            </tr>
            <!-- Agrega más filas con datos de ejemplo -->
            <!-- Aquí agregamos más filas con datos de ejemplo -->
            <tr>
                <td>José</td>
                <td>López</td>
                <td>Hernández</td>
                <td>LOPH880715MDFJR05</td>
                <td>Calle 456, Col. Sur</td>
                <td>1988-07-15</td>
                <td>4</td>
            </tr>
            <tr>
                <td>Ana</td>
                <td>Martínez</td>
                <td>García</td>
                <td>MAGA920420MDFNA08</td>
                <td>Avenida ABC, Col. Este</td>
                <td>1992-04-20</td>
                <td>1</td>
            </tr>
            <!-- Agrega más filas con datos de ejemplo -->
            </tbody>
        </table>
        <div class="pagination">
            <button>1</button>
            <button>2</button>
            <!-- Agrega más botones de paginación si es necesario -->
        </div>
    </div>
</div>
<footer class="footer">
    <p>LICONSA © 2024</p>
</footer>
</body>
</html>