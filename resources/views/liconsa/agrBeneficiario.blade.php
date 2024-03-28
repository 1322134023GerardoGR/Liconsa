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
            display: block;
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

        .mynav {
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

        .asd {
            background-color: #285C4D;
        }

        .alert-margin {
            margin-bottom: 0; /* Ajusta esto a tu preferencia */
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
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse asd" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link " href="{{route('index')}}">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('beneficiarios.list')}}">Lista de Beneficiarios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="{{route('beneficiarios.nuevo')}}">Registrar Beneficiario</a>
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
    <div class="form-container">
        <div class="card-header"><h2>Agregar beneficiario</h2></div>
        <form action="../beneficiarios/store" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="nombre" class="form-label">Nombre del interesado:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ej. Gerardo">
            </div>
            <div class="form-group">
                <label for="apellido_p" class="form-label">Apellido paterno:</label>
                <input type="text" class="form-control" id="apellido_p" name="apellido_p" placeholder="Ej. Gutiérrez">
            </div>
            <div class="form-group">
                <label for="apellido_m" class="form-label">Apellido materno:</label>
                <input type="text" class="form-control" id="apellido_m" name="apellido_m" placeholder="Ej. Ramírez">
            </div>

            <div class="form-group">
                <label for="curp" class="form-label">CURP del interesado:</label>
                <input type="text" class="form-control" id="curp" name="curp" placeholder="Ej. GURG080412HDFDRRA3">
            </div>
            <div class="form-group">
                <label for="direccion" class="form-label">Dirección:</label>
                <input type="text" class="form-control" id="direccion" name="direccion"
                       placeholder="Ej. Villa del Real, Canes 35, Tecámac Edo.Mex.">
            </div>
            <div class="form-group">
                <label for="fecha_nac" class="form-label">Fecha de nacimiento:</label>
                <input type="date" class="form-control" id="fecha_nac" name="fecha_nac" placeholder="Ej. 12/08/2004">
            </div>
            <div class="form-group">
                <label for="n_dependientes" class="form-label">Número de dependientes:</label>
                <input type="number" class="form-control" id="n_dependientes" name="n_dependientes" placeholder="Ej. 3"
                       onchange="showCurpsInputs(this.value)">
            </div>
            <div class="form-group">
                <label for="curp_beneficiarios" class="form-label">CURP de los dependientes:</label>
                <div id="curpsInputsContainer">
                    <input class="form-control" id="curp_beneficiarios" name="curp_beneficiarios"
                           placeholder="Ej. GURG080412HDFDRRA3">
                </div>

            </div>
            <div class="form-group">
                <label for="num_lecheria" class="form-label">N° Lecheria:</label>
                <input type="number" class="form-control" id="num_lecheria" name="num_lecheria"
                       placeholder="Ej. 65469158647">
            </div>

            <div class="btn-container text-center">
                <button type="submit" class="btn1"><i class="fas fa-save"></i>Guardar</button>
                <button type="reset" class="btn1"><i class="fas fa-times"></i>Cancelar</button>
            </div>


        </form>

    </div>
</div>
<footer class="footer">
    <p>LICONSA © 2024</p>
</footer>

<!-- Bootstrap JS (optional) -->


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // Función para mostrar u ocultar los inputs de CURP de dependientes
    function showCurpsInputs(numDependientes) {
        // Obtener el contenedor de los inputs de CURP
        const curpsContainer = document.getElementById('curpsInputsContainer');
        // Crear y mostrar los inputs según el número de dependientes
        curpsContainer.innerHTML = '';
        if (numDependientes <= 0) {
            const inputCurp = document.createElement('input');
            inputCurp.type = 'text';
            inputCurp.className = 'form-control';
            inputCurp.name = 'curp_beneficiarios[]'; // Usar corchetes para recibir varios valores en PHP
            inputCurp.placeholder = 'Ej. GURG080412HDFDRRA3';

            // Agregar input al contenedor
            curpsContainer.appendChild(inputCurp);
        } else {
            for (let i = 0; i < numDependientes; i++) {
                // Crear input de CURP
                const inputCurp = document.createElement('input');
                inputCurp.type = 'text';
                inputCurp.className = 'form-control';
                inputCurp.name = 'curp_beneficiarios[]'; // Usar corchetes para recibir varios valores en PHP
                inputCurp.placeholder = 'Ej. GURG080412HDFDRRA3';

                // Agregar input al contenedor
                curpsContainer.appendChild(inputCurp);
            }
        }
    }
</script>
</body>
</html>
