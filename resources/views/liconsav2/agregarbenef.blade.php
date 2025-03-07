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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
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

        /* Estilos para accesibilidad */
        .floating-icon {
            position: fixed;
            bottom: 20px;
            left: 20px;
            background-color: white;
            color: black;
            width: 70px;
            height: 70px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            border: 2px solid white;
            z-index: 1000;
            transition: opacity 0.3s ease-in-out;
        }

        .floating-icon i {
            padding-top: 7px;
            color: black;
            font-size: 54px;
        }

        .side-menu {
            position: fixed;
            top: 0;
            left: -300px;
            width: 300px;
            height: 100%;
            background-color: #E5E5E5;
            color: #621132;
            padding: 20px;
            transition: left 0.3s ease-in-out;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.3);
            z-index: 999;
            display: flex;
            flex-direction: column;
            gap: 10px;
            overflow-y: auto;
            scrollbar-width: thin;
            scrollbar-color: #B85E7D #E5E5E5;
        }

        .side-menu::-webkit-scrollbar {
            width: 8px;
        }
        .side-menu::-webkit-scrollbar-thumb {
            background-color: #B85E7D;
            border-radius: 4px;
        }
        .side-menu.active {
            left: 0;
        }
        .menu-option {
            display: flex;
            align-items: center;
            background-color: #621132;
            color: white;
            padding: 15px;
            border-radius: 10px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .menu-option:hover {
            background-color: #B85E7D;
        }

        .menu-option i {
            font-size: 24px;
            margin-right: 15px;
        }
        .submenu {
            display: none;
            flex-direction: column;
            padding-left: 20px;
            margin-top: 5px;
            background-color: #E5E5E5;
            border-radius: 10px;
        }
        .submenu .menu-option {
            background-color: #E5E5E5;
            color: black;
        }
        .submenu .menu-option:hover {
            background-color: #D0D0D0;
        }
        .reset-button {
            background-color: #A01942;
            color: white;
            padding: 15px;
            border-radius: 10px;
            font-size: 18px;
            text-align: center;
            cursor: pointer;
        }
        .text-size-controls {
            display: flex;
            justify-content: space-around;
            margin-top: 10px;
        }

        .text-size-btn {
            background-color: #A01942;
            color: white;
            padding: 15px;
            border-radius: 10px;
            font-size: 24px;
            cursor: pointer;
            width: 50px;
            text-align: center;
        }

        .highlighted {
            background-color: yellow !important;
            color: black !important;
            font-weight: bold;
            border-radius: 5px;
            padding: 5px;
        }
        .dyslexia-font {
            font-family: 'Lexend Deca', 'Comic Sans MS', Arial, sans-serif !important;
            letter-spacing: 0.05em;
            line-height: 1.5;
        }
        .reading-mask {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            pointer-events: none;
            z-index: 9999;
            display: none;
            clip-path: polygon(0% 0%, 100% 0%, 100% 100%, 0% 100%);
        }
        .reading-guide {
            position: absolute;
            left: 0;
            width: 100%;
            height: 120px;
            background: rgba(0, 0, 0, 0);
            pointer-events: none;
            z-index: 10000;
        }

        .reading-guide::before {
            content: "";
            position: absolute;
            top: -10px;
            left: 0;
            width: 100%;
            height: 20px;
            background: #A57F2C;
        }

        .reading-guide::after {
            content: "";
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 100%;
            height: 20px;
            background: #621132;
        }
        .tooltip-container {
            position: relative;
            display: inline-block;
        }
        .tooltip-container .tooltip-text {
            visibility: hidden;
            width: 200px;
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 5px;
            border-radius: 5px;
            position: absolute;
            bottom: 125%;
            left: 50%;
            transform: translateX(-50%);
            opacity: 0;
            transition: opacity 0.3s;
        }
        .tooltip-container:hover .tooltip-text {
            visibility: visible;
            opacity: 1;
        }
        .protanopia {
            filter: url(#protanopia);
        }
        .deuteranopia {
            filter: url(#deuteranopia);
        }
        .tritanopia {
            filter: url(#tritanopia);
        }
        .modo-oscuro {
            background-color: #111B22;
            color: #E0E0E0;
        }
        .modo-oscuro .panel {
            background-color: #292929;
            box-shadow: 0 4px 8px rgba(255, 255, 255, 0.1);
        }
        .modo-oscuro .navbar {
            background-color: #333;
        }
        .modo-oscuro .menu-option {
            background-color: #333;
            color: #E0E0E0;
        }
        .modo-oscuro .menu-option:hover {
            background-color: #555;
        }
        .modo-oscuro .header {
            background-color: #300a1e;
        }
        .modo-oscuro .submenu {
            background-color: #292929;
        }
        .modo-oscuro .btn1 {
            background-color: #A57F2C;
            color: #FFFFFF;
        }
        .modo-oscuro .btn1:hover {
            background-color: #623b2a;
        }
        .modo-oscuro .footer {
            background-color: #300a1e;
        }
        .modo-oscuro .side-menu {
            background-color: #292929;
        }
        .modo-oscuro form {
            background-color: #292929;
            color: #E0E0E0;
        }
        .modo-oscuro input,
        .modo-oscuro select,
        .modo-oscuro textarea {
            background-color: #3a3a3a;
            color: #E0E0E0;
            border-color: #555;
        }
        .modo-oscuro label {
            color: #E0E0E0;
        }

        .reading-guide {
            position: fixed;
            top: 50%;
            left: 0;
            right: 0;
            height: 4px;
            background: transparent;
            border-top: 3px solid #A57F2C;
            border-bottom: 3px solid #621132;
            pointer-events: none;
            transform: translateY(-50%);
            display: none;
            z-index: 10000;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        }

        .listening-icon {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: red;
            color: white;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            visibility: hidden;
            animation: pulse 1.5s infinite;
        }

        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.2); }
            100% { transform: scale(1); }
        }

        .cursor-small {
            cursor: url('{{ asset('img/cursores/cursor_small.png') }}'), auto;
        }
        .cursor-medium {
            cursor: url('{{ asset('img/cursores/cursor_medium.png') }}'), auto;
        }
        .cursor-large {
            cursor: url('{{ asset('img/cursores/cursor_large.png') }}'), auto;
        }
        a, button, .menu-option:hover, .floating-icon, .btn1 {
            cursor: url('{{ asset('img/cursores/pointer_small.png') }}'), auto;
        }
        .cursor-medium a, .cursor-medium button, .cursor-medium .menu-option:hover, .cursor-medium .floating-icon, .cursor-medium .btn1 {
            cursor: url('{{ asset('img/cursores/pointer_medium.png') }}'), auto;
        }
        .cursor-large a, .cursor-large button, .cursor-large .menu-option:hover, .cursor-large .floating-icon, .cursor-large .btn1 {
            cursor: url('{{ asset('img/cursores/pointer_large.png') }}'), auto;
        }

        .zoom-cursor-active {
            cursor: url('{{ asset('img/cursores/zoom_cursor.png') }}'), zoom-in;
        }

        .magnifier {
            position: absolute;
            border: 2px solid #621132;
            background-color: white;
            border-radius: 50%;
            pointer-events: none;
            transform: scale(0);
            z-index: 9998;
            transition: transform 0.1s ease;
            display: none;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            overflow: hidden;
        }

        .magnifier-content {
            position: absolute;
            transform-origin: 0 0;
        }

        .epilepsia-mode {
            filter: grayscale(100%) contrast(120%);
        }

        .epilepsia-mode img,
        .epilepsia-mode video,
        .epilepsia-mode iframe {
            filter: grayscale(100%) contrast(120%);
            -webkit-filter: grayscale(100%) contrast(120%);
        }

        .epilepsia-mode .floating-icon {
            position: fixed;
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

<!-- SVG para filtros de daltonismo -->
<svg xmlns="http://www.w3.org/2000/svg" version="1.1" style="display: none;">
    <defs>
        <!-- Protanopia (deficiencia del rojo) -->
        <filter id="protanopia">
            <feColorMatrix type="matrix" values="
        0.567 0.433 0 0 0
        0.558 0.442 0 0 0
        0 0.242 0.758 0 0
        0 0 0 1 0" />
        </filter>

        <!-- Deuteranopia (deficiencia del verde) -->
        <filter id="deuteranopia">
            <feColorMatrix type="matrix" values="
        0.625 0.375 0 0 0
        0.7 0.3 0 0 0
        0 0.3 0.7 0 0
        0 0 0 1 0" />
        </filter>

        <!-- Tritanopia (deficiencia del azul) -->
        <filter id="tritanopia">
            <feColorMatrix type="matrix" values="
        0.95 0.05 0 0 0
        0 0.433 0.567 0 0
        0 0.475 0.525 0 0
        0 0 0 1 0" />
        </filter>
    </defs>
</svg>

<!-- Elementos para accesibilidad -->
<div class="side-menu" id="sideMenu">
    <div class="reset-button" onclick="resetSettings()">
        <i class="bi bi-arrow-counterclockwise"></i> Restablecer
    </div>

    <div class="menu-option" onclick="toggleDropdown('vozDropdown')">
        <i class="bi bi-mic"></i> Control de Voz
    </div>
    <div class="submenu" id="vozDropdown">
        <div class="menu-option" onclick="iniciarReconocimientoVoz()">
            <i class="bi bi-mic"></i> Activar Control de Voz
        </div>
        <div class="menu-option" onclick="detenerReconocimientoVoz()">
            <i class="bi bi-mic-mute"></i> Detener Control de Voz
        </div>
        <div class="menu-option"><i class="bi bi-sliders"></i> Configurar Comandos</div>
    </div>

    <div class="menu-option" onclick="toggleDropdown('personalizacionDropdown')">
        <i class="bi bi-palette"></i> Personalización
    </div>
    <div class="submenu" id="personalizacionDropdown">
        <div class="menu-option" onclick="toggleModoOscuro()"><i class="bi bi-moon"></i> Modo Oscuro</div>
        <div class="menu-option" onclick="toggleDaltonismoMenu()"><i class="bi bi-eye"></i>Modo Daltonico</div>
        <div class="submenu" id="daltonismoDropdown" style="display: none;">
            <div class="menu-option" onclick="activarDaltonismo('protanopia')">
                <i class="bi bi-circle-fill" style="color: red;"></i> Protanopia (Rojo)
            </div>
            <div class="menu-option" onclick="activarDaltonismo('deuteranopia')">
                <i class="bi bi-circle-fill" style="color: green;"></i> Deuteranopia (Verde)
            </div>
            <div class="menu-option" onclick="activarDaltonismo('tritanopia')">
                <i class="bi bi-circle-fill" style="color: blue;"></i> Tritanopia (Azul)
            </div>
            <div class="menu-option" onclick="activarDaltonismo('')">
                <i class="bi bi-eye-slash"></i> Desactivar Filtro
            </div>
        </div>
    </div>

    <div class="menu-option" onclick="toggleDropdown('accesibilidadDropdown')">
        <i class="bi bi-universal-access"></i> Accesibilidad
    </div>
    <div class="submenu" id="accesibilidadDropdown">
        <div class="menu-option"><i class="bi bi-volume-up"></i> Lector de Pantalla</div>
        <div class="menu-option" onclick="toggleCursorMenu()">
            <i class="bi bi-arrow-up-right-circle"></i> Cambiar tamaño del Cursor
        </div>
        <div class="submenu" id="cursorDropdown" style="display: none;">
            <div class="menu-option" onclick="cambiarTamanioCursor('cursor-small')"><i class="bi bi-circle"></i> Pequeño</div>
            <div class="menu-option" onclick="cambiarTamanioCursor('cursor-medium')"><i class="bi bi-circle-fill"></i> Mediano</div>
            <div class="menu-option" onclick="cambiarTamanioCursor('cursor-large')"><i class="bi bi-record-circle"></i> Grande</div>
        </div>
    </div>

    <div class="menu-option" onclick="toggleDropdown('ayudasVisualesDropdown')">
        <i class="bi bi-eye"></i> Ayudas Visuales
    </div>
    <div class="submenu" id="ayudasVisualesDropdown">
        <div class="menu-option"><i class="bi bi-zoom-in"></i> Aumentar Tamaño de Texto</div>
        <div class="text-size-controls">
            <div class="text-size-btn" onclick="adjustTextSize(-1)"><i class="bi bi-zoom-out"></i></div>
            <div class="text-size-btn" onclick="adjustTextSize(1)"><i class="bi bi-zoom-in"></i></div>
        </div>
        <div class="menu-option" id="highlightToggle"><i class="bi bi-brush"></i> Resaltar Enlaces</div>
        <div class="menu-option" id="toggleDyslexiaFont"><i class="bi bi-fonts"></i> Cambio de Tipografia Dislexia</div>
        <div class="menu-option" id="toggleReadingMask"><i class="bi bi-distribute-vertical"></i> Mascara de Lectura</div>
        <div class="reading-mask" id="readingMask">
            <div class="reading-guide" id="readingGuide"></div>
        </div>
        <div class="menu-option" id="toggleCursorZoom"><i class="bi bi-zoom-in"></i> Zoom en Cursor</div>
        <div class="menu-option" onclick="toggleEpilepsiaMode()">
            <i class="bi bi-shield-exclamation"></i> Modo Epilepsia
        </div>
        <div class="menu-option" id="toggleReadingGuide">
            <i class="bi bi-book"></i> Guía de Lectura
        </div>
    </div>
</div>

<div class="floating-icon" id="accessibilityBtn" onclick="toggleMenu()" aria-label="Abrir menú de accesibilidad">
    <i class="bi bi-universal-access-circle"></i>
</div>

<div id="listeningIcon" class="listening-icon">
    <i class="bi bi-mic-fill"></i>
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

    function toggleMenu() {
        let menu = document.getElementById('sideMenu');
        let button = document.getElementById('accessibilityBtn');

        // Alternar clase "active" en el menú
        menu.classList.toggle('active');

        // Ajustar opacidad del botón flotante
        button.style.opacity = menu.classList.contains('active') ? "0" : "1";
    }

    // Cerrar el menú si el usuario hace clic fuera de él
    document.addEventListener('click', function(event) {
        let menu = document.getElementById('sideMenu');
        let button = document.getElementById('accessibilityBtn');

        if (!menu.contains(event.target) && !button.contains(event.target)) {
            menu.classList.remove('active'); // Cerrar menú
            button.style.opacity = "1"; // Volver a mostrar el botón flotante
        }
    });

    function toggleDropdown(id) {
        let submenu = document.getElementById(id);
        submenu.style.display = submenu.style.display === "flex" ? "none" : "flex";
    }

    // Objeto para almacenar los valores por defecto al cargar la página
    let defaultSettings = {
        modoOscuro: false,
        daltonismo: "",
        textSize: getComputedStyle(document.body).fontSize,
        cursorSize: "",
        highlightLinks: false,
        screenReader: false,
        readingMask: false
    };

    // Función para verificar si hay cambios
    function hayCambios() {
        return (
            document.body.classList.contains("modo-oscuro") || // Modo oscuro activado
            document.body.classList.contains("protanopia") ||
            document.body.classList.contains("deuteranopia") ||
            document.body.classList.contains("tritanopia") || // Daltonismo activado
            getComputedStyle(document.body).fontSize !== defaultSettings.textSize || // Tamaño de texto cambiado
            document.body.classList.contains("cursor-small") ||
            document.body.classList.contains("cursor-medium") ||
            document.body.classList.contains("cursor-large") || // Cambio en el cursor
            document.getElementById("readingMask").style.display === "block" || // Máscara de lectura activa
            screenReaderEnabled || // Lector de pantalla activado
            document.querySelectorAll('.highlighted').length > 0 // Enlaces resaltados
        );
    }

    // Función para restablecer configuraciones con validación
    function resetSettings() {
        if (!hayCambios()) {
            alert("No se ha realizado ningún cambio.");
            return;
        }

        // 1. Restablecer modo oscuro
        document.body.classList.remove("modo-oscuro");

        // 2. Restablecer filtros de daltonismo
        document.body.classList.remove("protanopia", "deuteranopia", "tritanopia");

        // 3. Cerrar todos los submenús
        document.querySelectorAll('.submenu').forEach(submenu => {
            submenu.style.display = "none";
        });

        // 4. Restablecer tamaño de texto
        document.querySelectorAll('body, .navbar, .navbar a, .header, .content, .footer, .menu-option, .submenu .menu-option, .btn1')
            .forEach(el => el.style.fontSize = defaultSettings.textSize);

        // 5. Restablecer el tamaño del cursor
        document.body.classList.remove("cursor-small", "cursor-medium", "cursor-large");

        // 6. Apagar la máscara de lectura
        document.getElementById("readingMask").style.display = "none";
        document.getElementById("readingGuide").style.display = "none";

        // 7. Desactivar el resaltado de enlaces
        document.querySelectorAll('.highlighted').forEach(el => {
            el.classList.remove('highlighted');
        });

        // 8. Desactivar el lector de pantalla si está activado
        if (screenReaderEnabled) {
            toggleScreenReader();
        }

        // 9. Detener el reconocimiento de voz si está activo
        detenerReconocimientoVoz();

        // 10. Confirmación
        alert("Configuraciones restablecidas a valores predeterminados.");
    }

    function adjustTextSize(change) {
        const minSize = 15;
        const maxSize = 30;
        let elements = document.querySelectorAll('body, .navbar, .navbar a, .header, .content, .footer, .menu-option, .submenu .menu-option, .btn1');

        elements.forEach(el => {
            let currentSize = parseFloat(window.getComputedStyle(el).fontSize);
            let newSize = Math.min(Math.max(currentSize + change, minSize), maxSize);
            el.style.fontSize = newSize + "px";
        });
    }
    function highlightLinksAndButtons() {
        let elements = document.querySelectorAll('a, button, .btn1, .menu-option');
        elements.forEach(el => {
            el.classList.toggle('highlighted');
        });
    }
    // Evento para activar el resaltado al hacer clic en "Resaltar Enlaces"
    document.getElementById("highlightToggle").addEventListener("click", highlightLinksAndButtons);

    // Cerrar el menú si el usuario hace clic fuera de él
    document.addEventListener('click', function(event) {
        let menu = document.getElementById('sideMenu');
        let icon = document.querySelector('.floating-icon');
        if (!menu.contains(event.target) && !icon.contains(event.target)) {
            menu.classList.remove('active');
        }

        function toggleDyslexiaFont() {
            document.body.classList.toggle("dyslexia-font");
        }
        document.getElementById("toggleDyslexiaFont").addEventListener("click", toggleDyslexiaFont);
    });

    let maskActive = false;
    let mask = document.getElementById("readingMask");
    let guide = document.getElementById("readingGuide");

    // Evento para activar/desactivar la máscara de lectura
    document.getElementById("toggleReadingMask").addEventListener("click", function() {
        maskActive = !maskActive; // Alternar estado
        mask.style.display = maskActive ? "block" : "none"; // Mostrar u ocultar
        guide.style.display = maskActive ? "block" : "none";
    });

    // Mueve la ventana de lectura con el cursor
    document.addEventListener("mousemove", function(event) {
        if (maskActive) {
            let mouseY = event.clientY - 60; // Centra el rectángulo

            // Ajusta la posición del rectángulo
            guide.style.top = `${mouseY}px`;

            // Crear el efecto de ventana transparente con clip-path
            mask.style.clipPath = `polygon(
                    0% 0%, 100% 0%, 100% ${mouseY}px,
                    0% ${mouseY}px, 0% ${mouseY + 120}px,
                    100% ${mouseY + 120}px, 100% 100%, 0% 100%
                )`;

        }
    });

    let screenReaderEnabled = false;

    // Función para leer texto con el lector de pantalla
    function speakText(text) {
        let speech = new SpeechSynthesisUtterance(text);
        speech.lang = 'es-ES'; // Idioma español
        speech.rate = 1; // Velocidad de lectura
        speech.pitch = 1;
        window.speechSynthesis.speak(speech);
    }

    // Función para activar/desactivar el lector de pantalla
    function toggleScreenReader() {
        if (screenReaderEnabled) {
            speakText("Desactivando lector de pantalla");
            setTimeout(() => {
                screenReaderEnabled = false;
                document.querySelectorAll("a, button, .btn1, .menu-option, input, label, .floating-icon").forEach(el => {
                    el.removeEventListener("mouseover", handleHover);
                });
                speakText("Lector de pantalla desactivado");
            }, 500); // Espera breve para asegurarse de que el mensaje se escuche
        } else {
            screenReaderEnabled = true;
            document.querySelectorAll("a, button, .btn1, .menu-option, input, label, .floating-icon").forEach(el => {
                el.addEventListener("mouseover", handleHover);
            });
            speakText("Lector de pantalla activado");
        }
    }

    // Evento de hover para leer elementos
    function handleHover(event) {
        if (!screenReaderEnabled) return;
        let text = event.target.innerText || event.target.alt || event.target.placeholder || event.target.getAttribute("aria-label");
        speakText(text);
    }

    // Agregar evento de clic al botón del menú de accesibilidad
    document.querySelector("#accesibilidadDropdown .menu-option").addEventListener("click", toggleScreenReader);

    // Agregar evento de clic al botón de Control de Voz para desactivar el narrador
    document.querySelector(".menu-option[onclick=\"toggleDropdown('vozDropdown')\"]").addEventListener("click", function() {
        if (screenReaderEnabled) {
            toggleScreenReader(); // Desactivar narrador si está activado
        }
    });
    function activarDaltonismo(tipo) {
        document.body.classList.remove("protanopia", "deuteranopia", "tritanopia");
        if (tipo) {
            document.body.classList.add(tipo);
        }
    }
    function toggleDaltonismoMenu() {
        var menu = document.getElementById('daltonismoDropdown');
        menu.style.display = menu.style.display === 'block' ? 'none' : 'block';
    }

    function toggleModoOscuro() {
        document.body.classList.toggle("modo-oscuro");
    }

    let recognition;
    let isListening = false;

    function iniciarReconocimientoVoz() {
        const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
        if (!SpeechRecognition) {
            alert("Tu navegador no soporta reconocimiento de voz");
            return;
        }

        if (!isListening) {
            recognition = new SpeechRecognition();
            recognition.lang = "es-ES";
            recognition.continuous = true;
            document.getElementById("listeningIcon").style.visibility = "visible";
            isListening = true;
            recognition.start();

            recognition.onresult = function(event) {
                const comando = event.results[event.results.length - 1][0].transcript.toLowerCase();

                if (comando.includes("inicio")) {
                    window.location.href = "{{route('inicio')}}";
                } else if (comando.includes("lista de beneficiarios")) {
                    window.location.href = "{{route('beneficiarios.list')}}";
                } else if (comando.includes("registrar beneficiario")) {
                    window.location.href = "{{route('beneficiarios.nuevo')}}";
                } else if (comando.includes("registrar nueva venta")) {
                    window.location.href = "{{route('add.sell')}}";
                } else if (comando.includes("registrar usuario")) {
                    window.location.href = "{{route('user.nuevo')}}";
                } else if (comando.includes("lista de usuarios")) {
                    window.location.href = "{{route('trabajadores.list')}}";
                } else if (comando.includes("lista de ventas")) {
                    window.location.href = "{{route('ventas.list')}}";
                } else if (comando.includes("detener escucha")) {
                    detenerReconocimientoVoz();
                } else {
                    alert("No reconozco el comando: " + comando);
                }
            };
        }
    }

    function detenerReconocimientoVoz() {
        if (recognition && isListening) {
            recognition.stop();
            document.getElementById("listeningIcon").style.visibility = "hidden";
            isListening = false;
        }
    }
    function cambiarTamanioCursor(size) {
        document.body.classList.remove("cursor-small", "cursor-medium", "cursor-large");
        if (size) {
            document.body.classList.add(size);
        }
    }
    function toggleCursorMenu() {
        var menu = document.getElementById('cursorDropdown');
        menu.style.display = menu.style.display === 'block' ? 'none' : 'block';
    }

    // Cursor

    // Zoom en cursor
    let zoomEnabled = false;
    let magnifier = null;
    let magnifierContent = null;
    const ZOOM_LEVEL = 1.5; // Nivel de zoom (1.5 = 150%)
    const MAGNIFIER_SIZE = 150; // Tamaño del magnificador en px

    document.getElementById("toggleCursorZoom").addEventListener("click", function() {
        zoomEnabled = !zoomEnabled;

        if (zoomEnabled) {
            // Crear magnificador si no existe
            if (!magnifier) {
                magnifier = document.createElement('div');
                magnifier.className = 'magnifier';
                magnifier.style.width = MAGNIFIER_SIZE + 'px';
                magnifier.style.height = MAGNIFIER_SIZE + 'px';

                magnifierContent = document.createElement('div');
                magnifierContent.className = 'magnifier-content';
                magnifier.appendChild(magnifierContent);

                document.body.appendChild(magnifier);
            }

            document.body.classList.add('zoom-cursor-active');
            magnifier.style.display = 'block';

            // Agregar evento de movimiento
            document.addEventListener('mousemove', handleZoomMouseMove);

            // Mensaje de confirmación
            alert("Zoom en cursor activado. Mueve el cursor sobre el texto para ampliarlo.");
        } else {
            document.body.classList.remove('zoom-cursor-active');
            magnifier.style.display = 'none';

            // Remover evento de movimiento
            document.removeEventListener('mousemove', handleZoomMouseMove);
        }
    });

    function handleZoomMouseMove(e) {
        if (!zoomEnabled) return;

        // Posición del cursor
        const x = e.clientX;
        const y = e.clientY;

        // Posición del magnificador (centrado en el cursor)
        magnifier.style.left = (x - MAGNIFIER_SIZE/2) + 'px';
        magnifier.style.top = (y - MAGNIFIER_SIZE/2) + 'px';

        // Clonar el contenido bajo el cursor
        const elementsUnderCursor = document.elementsFromPoint(x, y);
        let targetElement = null;

        // Buscar el primer elemento de texto significativo
        for (let el of elementsUnderCursor) {
            if (el.textContent &&
                el !== magnifier &&
                !el.contains(magnifier) &&
                !magnifier.contains(el) &&
                el.nodeName !== 'BODY' &&
                el.nodeName !== 'HTML') {
                targetElement = el;
                break;
            }
        }

        if (targetElement) {
            // Copiar el estilo y contenido
            const rect = targetElement.getBoundingClientRect();
            const computedStyle = window.getComputedStyle(targetElement);

            // Establecer el contenido
            magnifierContent.innerHTML = targetElement.outerHTML;

            // Aplicar zoom
            magnifierContent.style.transform = `scale(${ZOOM_LEVEL})`;

            // Colocar el contenido correctamente dentro del magnificador
            const offsetX = (x - rect.left) * ZOOM_LEVEL;
            const offsetY = (y - rect.top) * ZOOM_LEVEL;

            magnifierContent.style.left = (MAGNIFIER_SIZE/2 - offsetX) + 'px';
            magnifierContent.style.top = (MAGNIFIER_SIZE/2 - offsetY) + 'px';

            // Mostrar el magnificador con animación
            magnifier.style.transform = 'scale(1)';
        } else {
            // Ocultar el magnificador si no hay elementos de texto
            magnifier.style.transform = 'scale(0)';
        }
    }

    // Actualizar la función resetSettings para incluir el zoom en cursor
    const originalResetSettings = resetSettings;
    resetSettings = function() {
        originalResetSettings();

        // Resetear zoom en cursor
        if (zoomEnabled) {
            zoomEnabled = false;
            document.body.classList.remove('zoom-cursor-active');
            if (magnifier) {
                magnifier.style.display = 'none';
            }
            document.removeEventListener('mousemove', handleZoomMouseMove);
        }
    };

    function toggleEpilepsiaMode() {
        document.body.classList.toggle('epilepsia-mode');

        const existingStyle = document.getElementById('epilepsia-styles');
        if (document.body.classList.contains('epilepsia-mode')) {
            if (existingStyle) existingStyle.remove();

            const style = document.createElement('style');
            style.id = 'epilepsia-styles';
            style.innerHTML = `
                *:not(.floating-icon):not(.floating-icon *) {
                    transition: none !important;
                    animation: none !important;
                    scroll-behavior: auto !important;
                }
            `;
            document.head.appendChild(style);
        } else {
            if (existingStyle) {
                existingStyle.remove();
            }
        }
    }

    // Configuración de la Guía de Lectura
    let guideActive = false;
    const readingGuide = document.createElement('div');
    readingGuide.className = 'reading-guide';
    document.body.appendChild(readingGuide);

    // Evento para activar/desactivar
    document.getElementById("toggleReadingGuide").addEventListener("click", function() {
        guideActive = !guideActive;
        readingGuide.style.display = guideActive ? "block" : "none";

        if(guideActive) {
            document.addEventListener('mousemove', moveReadingGuide);
            if(screenReaderEnabled) {
                speakText("Guía de lectura activada. La línea te ayudará a mantener el enfoque durante la lectura.");
            }
        } else {
            document.removeEventListener('mousemove', moveReadingGuide);
        }
    });

    // Mover la guía con el cursor
    function moveReadingGuide(e) {
        const y = e.clientY;
        readingGuide.style.top = `${y}px`;
    }

    // Actualizar función resetSettings
    function resetSettings() {
        // ... código existente ...

        // Resetear Guía de Lectura
        readingGuide.style.display = "none";
        guideActive = false;
        document.removeEventListener('mousemove', moveReadingGuide);
    }
</script>
</body>
</html>
