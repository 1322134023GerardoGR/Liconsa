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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #D4C19C;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .logo-text {
            font-family: 'Libre Baskerville', serif;
            font-size: 50px;
            font-weight: bold;
            color: #FFFFFF;
            z-index: 1;
        }
        .footer-text {
            font-family: 'Libre Baskerville', serif;
            font-size: 20px;
            font-weight: bold;
            color: #FFFFFF;
        }

        .header {
            background-image: url("{{ asset('img/fondofootergob.png') }}");
            background-size: contain;
            background-position: center;
            background-color: #611232;
            color: white;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 24px 50px;
        }
        .header::after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 20vh;
            background-color: rgba(0, 0, 0, 0.3); /* Ajusta la opacidad aquí */
        }
        .header img {
            height: 80px;
            width: auto;
            position: relative;
            z-index: 2;
        }

        .header .logo-mexico {
            opacity: 1.5;
        }

        .footer {
            background-color: #621132;
            background-image: url("{{ asset('img/fondofootergob.png') }}");
            background-size: cover;
            background-position: center;
            color: white;
            text-align: center;
            padding: 15px;
        }

        .content {
            background-color: #D4C19C;
            display: flex;
            padding: 100px 20px;
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

        .form-row {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .form-group {
            flex: 1 1 calc(50% - 20px);
            display: flex;
            flex-direction: column;
        }

        .form-group label {
            font-weight: 600;
        }

        .form-control {
            border-radius: 8px;
            padding: 10px 15px;
        }

        .btn-container {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            margin-top: 30px;
        }

        .btn1 {
            flex: 1;
            padding: 12px 0;
            border-radius: 8px;
            background-color: #621132;
            color: white;
            font-size: 16px;
            font-weight: bold;
            border: none;
            transition: background-color 0.3s ease;
        }

        .btn1:hover {
            background-color: #4a0e27;
        }

        nav.navbar {
            background-color: #A57F2C;
            padding: 12px 20px;
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            font-size: 20px;
            padding: 10px 15px;
            border-radius: 5px;
            transition: background-color 0.3s;
            justify-content: center;
        }

        .navbar a:hover {
            background-color: #621132;
        }

        .text-agregarbenif{
            font-family: 'Libre Baskerville', serif;
        }

        .asd {
            background-color: #285C4D;
        }

        .alerta2 {
            --bs-alert-bg: transparent;
            --bs-alert-padding-x: 1rem;
            --bs-alert-padding-y: 1rem;
            --bs-alert-margin-bottom: 0;
            --bs-alert-color: inherit;
            --bs-alert-border-color: transparent;
            --bs-alert-border: var(--bs-border-width) solid var(--bs-alert-border-color);
            --bs-alert-border-radius: var(--bs-border-radius);
            --bs-alert-link-color: inherit;
            position: relative;
            padding: var(--bs-alert-padding-y) var(--bs-alert-padding-x);
            margin-bottom: var(--bs-alert-margin-bottom);
            color: var(--bs-alert-color);
            background-color: var(--bs-alert-bg);
            border: var(--bs-alert-border);
            border-radius: var(--bs-alert-border-radius);
        }

        .obligatorio {
            color: red;
        }
    </style>
    @vite(['resources/js/app.js'])

</head>
<body class="font-sans  antialiased">
<header class="header">
    <h1 class="logo-text">LICONSA</h1>
    <img class="logo-mexico" src="{{ asset('img/logo_gobierno_mexico.png') }}" alt="logo de mexico">
</header>
<nav class="navbar">
    <a href="{{route('inicio')}}">Inicio</a>
    <a href="{{route('beneficiarios.list')}}">Lista de Beneficiarios</a>
    <a href="{{route('beneficiarios.nuevo')}}">Registrar Beneficiario</a>
    <a href="{{route('add.sell')}}">Registrar Nueva Venta</a>
    <a href="{{route('user.nuevo')}}">Registrar Usuario</a>
    <a href="{{route('trabajadores.list')}}">Lista de Usuarios</a>
    <a href="{{route('ventas.list')}}">Lista de Ventas</a>
</nav>

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
    </div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
@endif
@if($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </ul>
    </div>
@endif

<div class="content">
    <div class="form-container">
    <h2 class="text-center mb-4 text-agregarbenif">Agregar Beneficiario</h2>
    <form action="../beneficiarios/store" method="POST">
        @csrf
        <div class="form-row">
            <div class="form-group">
                <label for="nombre" class="text-agregarbenif">Nombre del interesado <span class="obligatorio">*</span></label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ej. Gerardo">
            </div>

            <div class="form-group">
                <label for="apellido_p" class="text-agregarbenif">Apellido paterno <span class="obligatorio">*</span></label>
                <input type="text" class="form-control" id="apellido_p" name="apellido_p" placeholder="Ej. Gutiérrez">
            </div>

            <div class="form-group">
                <label for="apellido_m" class="text-agregarbenif">Apellido materno <span class="obligatorio">*</span></label>
                <input type="text" class="form-control" id="apellido_m" name="apellido_m" placeholder="Ej. Ramírez">
            </div>

            <div class="form-group">
                <label for="curp" class="text-agregarbenif">CURP del interesado <span class="obligatorio">*</span></label>
                <input type="text" class="form-control" id="curp" name="curp" placeholder="Ej. GURG080412HDFDRRA3">
            </div>

            <div class="form-group">
                <label for="direccion" class="text-agregarbenif">Dirección <span class="obligatorio">*</span></label>
                <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Ej. Villa del Real, Canes 35, Tecámac Edo.Mex.">
            </div>

            <div class="form-group">
                <label for="fecha_nac" class="text-agregarbenif">Fecha de nacimiento <span class="obligatorio">*</span></label>
                <input type="date" class="form-control" id="fecha_nac" name="fecha_nac">
            </div>

            <div class="form-group">
                <label for="n_dependientes" class="text-agregarbenif">Número de dependientes <span class="obligatorio">*</span></label>
                <input type="number" class="form-control" id="n_dependientes" name="n_dependientes" placeholder="Ej. 3">
            </div>

            <div class="form-group">
                <label for="curp_beneficiarios" class="text-agregarbenif">CURP de los dependientes <span class="obligatorio">*</span></label>
                <input type="text" class="form-control" id="curp_beneficiarios" name="curp_beneficiarios" placeholder="Ej. GURG080412HDFDRRA3">
            </div>

            <div class="form-group">
                <label for="dias_asistencia" class="text-agregarbenif">Días de asistencia <span class="obligatorio">*</span></label>
                <input type="text" class="form-control mb-2" id="d_asist1" name="d_asist1" placeholder="Ej. Lunes">
                <input type="text" class="form-control mb-2" id="d_asist2" name="d_asist2" placeholder="Ej. Miércoles">
                <input type="text" class="form-control" id="d_asist3" name="d_asist3" placeholder="Ej. Viernes">
            </div>

            <div class="form-group">
                <label for="num_lecheria" class="text-agregarbenif">N° Lechería <span class="obligatorio">*</span></label>
                <input type="number" class="form-control" id="num_lecheria" name="num_lecheria" placeholder="Ej. 65469158647">
            </div>
        </div>

        <div class="btn-container">
            <button type="submit" class="btn1">Guardar</button>
            <button type="reset" class="btn1">Cancelar</button>
        </div>
    </form>
</div>
</div>

<footer class="footer">
    <p class="footer-text">LICONSA © 2025</p>
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

    function index() {
        window.location.href = "{{ route('inicio') }}";
    }
</script>
</body>
</html>
