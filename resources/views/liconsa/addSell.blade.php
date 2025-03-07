<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>LICONSA</title>

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <!-- Fonts -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@400;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
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
            color: #FFFFFF;
        }

        /* Encabezado */
        .header {
            background-image: url("{{ asset('img/fondofootergob.png') }}");
            color: white;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 24px 50px;
        }

        .header .logo-mexico {
            opacity: 1.5;
        }

        .header::after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 20vh;
            background-color: rgba(0, 0, 0, 0.3);
        }

        .header img {
            height: 80px;
            width: auto;
            position: relative;
            z-index: 2;
        }

        .header h1,
        .header h2 {
            margin: 0;
            font-family: 'Libre Baskerville', serif;
        }

        /* Barra de navegación */
        nav.navbar {
            background-color: #A57F2C;
            padding: 10px 20px;
            display: flex;
            gap: 15px;
            align-items: center;
            justify-content: center !important;
        }

        .navbar a:hover {
            background-color: #621132;
            color: #FFFFFF;
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

        .nav-link {
            position: relative;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border-radius: 4px;
        }

        .nav-link.active {
            background: #621132 !important;
            color: #FFFFFF !important;
            font-weight: 700;
            border: 1px solid #A57F2C;
        }

        .navbar a:not(.active):hover {
            background-color: #621132;
            color: #FFFFFF !important;
        }

        .nav-link::before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            width: 0;
            height: 2px;
        }

        .nav-link:hover::before {
            width: 80%;
        }

        /* Contenido principal */
        .content {
            display: flex;
            justify-content: center;
            align-items: flex-start;
            padding: 50px 20px;
            max-width: 1200px;
            width: 100%;
            margin: 0 auto;
        }

        /* Tarjeta del formulario */
        .form-card {
            background-color: #FFFFFF;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            width: 100%;
            max-width: 600px;
        }

        .form-card h1 {
            font-family: 'Libre Baskerville', serif;
            font-size: 28px;
            margin-bottom: 20px;
        }

        .form-group label {
            font-weight: 600;
        }

        .form-control {
            border-radius: 6px;
        }

        /* Botones personalizados */
        .btn1 {
            background-color: #621132;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
            text-decoration: none;
            margin: 5px;
        }

        .btn1:hover {
            background-color: #4a0e27;
        }

        .btn-container {
            margin-top: 20px;
            display: flex;
            gap: 10px;
            justify-content: center;
        }

        /* Footer */
        .footer {
            background-color: #621132;
            background-image: url("{{ asset('img/fondofootergob.png') }}");
            background-size: cover;
            background-position: center;
            color: white;
            text-align: center;
            padding: 15px;
            margin-top: auto;
        }

        /* Ajustes específicos para el viewport de la cámara */
        #interactive {
            width: 100%;
            max-width: 600px;
            height: 250px;
            background: #000;
            margin: 20px auto;
            border-radius: 8px;
            overflow: hidden;
            position: relative;
        }

        #camera-message {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            z-index: 100;
            font-size: 1.2rem;
            text-shadow: 1px 1px 3px rgba(0,0,0,0.5);
        }

        #interactive video {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Estilos de Accesibilidad */
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
            position: fixed;
            top: 50%;
            left: 0;
            right: 0;
            height: 10px; /* Grosor de la línea aumentado */
            background: #621132; /* Color burdeos */
            pointer-events: none;
            transform: translateY(-50%);
            display: none;
            z-index: 10000;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        /* Añadir "tacos" negros en los extremos */
        .reading-guide::before,
        .reading-guide::after {
            content: "";
            position: absolute;
            width: 10px; /* Ancho del "taco" */
            height: 10px; /* Altura del "taco" ajustada al grosor de la línea */
            background: #000000; /* Negro */
            transform: translateY(-50%);
        }

        .reading-guide::before {
            left: -5px; /* Ajuste para centrar el taco a la izquierda */
        }

        .reading-guide::after {
            right: -5px; /* Ajuste para centrar el taco a la derecha */
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
            color: #0D161C;
        }

        .modo-oscuro .form-card {
            background-color: #E0E0E0;
            box-shadow: 0 4px 8px rgba(255, 255, 255, 0.1);
        }

        .modo-oscuro .navbar {
            background-color: #333;
        }

        .modo-oscuro .header {
            background-color: #300a1e;
        }

        .modo-oscuro .footer {
            background-color: #300a1e;
        }

        .modo-oscuro .btn1 {
            background-color: #A57F2C;
            color: #FFFFFF;
        }

        .modo-oscuro .btn1:hover {
            background-color: #623b2a;
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
    </style>

    @vite(['resources/js/app.js'])
</head>
<body class="font-sans antialiased">

<!-- HEADER -->
<header class="header">
    <h1 class="logo-text">LICONSA</h1>
    <img class="logo-mexico" src="{{ asset('img/logo_gobierno_mexico.png') }}" alt="logo de mexico">
</header>

<!-- NAVBAR -->
<nav class="navbar">
    <a class="nav-link {{ Route::is('inicio') ? 'active' : '' }}" href="{{route('inicio')}}">Inicio</a>
    <a class="nav-link {{ Route::is('beneficiarios.list') ? 'active' : '' }}" href="{{route('beneficiarios.list')}}">Lista de Beneficiarios</a>
    <a class="nav-link {{ Route::is('beneficiarios.nuevo') ? 'active' : '' }}" href="{{route('beneficiarios.nuevo')}}">Registrar Beneficiario</a>
    <a class="nav-link {{ Route::is('add.sell') ? 'active' : '' }}" href="{{route('add.sell')}}">Registrar Nueva Venta</a>
    <a class="nav-link {{ Route::is('user.nuevo') ? 'active' : '' }}" href="{{route('user.nuevo')}}">Registrar Usuario</a>
    <a class="nav-link {{ Route::is('trabajadores.list') ? 'active' : '' }}" href="{{route('trabajadores.list')}}">Lista de Usuarios</a>
    <a class="nav-link {{ Route::is('ventas.list') ? 'active' : '' }}" href="{{route('ventas.list')}}">Lista de Ventas</a>
</nav>

<!-- Mensajes de éxito y error -->
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<!-- CONTENIDO PRINCIPAL -->
<form action="{{route('ventas.store')}}" method="POST">
    @csrf
    <div class="content">
        <div class="form-card">
            <h1>Registrar Venta</h1>
            <div class="form-group">
                <label for="code">
                    <strong>Código del Beneficiario</strong><span class="text-danger">*</span>
                </label>
                <input name="code" type="text" class="form-control" id="code">
            </div>
            <div class="form-group">
                <label for="litros_v">
                    <strong>Número de litros de leche</strong><span class="text-danger">*</span>
                </label>
                <input onchange="changePrice(this.value)" name="litros_v" type="number" class="form-control" id="litros_v">
            </div>
            <div class="form-group">
                <label for="num_lecheria">
                    <strong>Número de Lechería</strong><span class="text-danger">*</span>
                </label>
                <input name="num_lecheria" type="number" class="form-control" id="num_lecheria">
            </div>
            <div class="form-group">
                <label for="costo">
                    <strong>Costo total</strong>
                </label>
                <input disabled name="costo" type="number" class="form-control" id="costo">
            </div>

            <div id="interactive" class="viewport">
                <p id="camera-message">Enfoca el código de barras del beneficiario</p>
            </div>

            <div class="btn-container">
                <button type="submit" class="btn1">Realizar Compra</button>
                <button type="reset" class="btn1" onclick="index()">Cancelar Compra</button>
            </div>
        </div>

        <!-- Menú Lateral de Accesibilidad -->
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
                <div id="listeningIcon" class="listening-icon">
                    <i class="bi bi-mic-fill"></i>
                </div>
            </div>

            <div class="menu-option" onclick="toggleDropdown('personalizacionDropdown')">
                <i class="bi bi-palette"></i> Personalización
            </div>
            <div class="submenu" id="personalizacionDropdown">
                <div class="menu-option" onclick="toggleModoOscuro()"><i class="bi bi-moon"></i> Modo Oscuro</div>
                <div class="menu-option" onclick="toggleDaltonismoMenu()"><i class="bi bi-eye"></i>Modo Daltónico</div>
                <div class="submenu" id="daltonismoDropdown" style="display: none;">
                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" style="display: none;">
                        <defs>
                            <filter id="protanopia">
                                <feColorMatrix type="matrix" values="0.567 0.433 0 0 0 0.558 0.442 0 0 0 0 0.242 0.758 0 0 0 0 0 1 0" />
                            </filter>
                            <filter id="deuteranopia">
                                <feColorMatrix type="matrix" values="0.625 0.375 0 0 0 0.7 0.3 0 0 0 0 0.3 0.7 0 0 0 0 0 1 0" />
                            </filter>
                            <filter id="tritanopia">
                                <feColorMatrix type="matrix" values="0.95 0.05 0 0 0 0 0.433 0.567 0 0 0 0.475 0.525 0 0 0 0 0 1 0" />
                            </filter>
                        </defs>
                    </svg>
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
                <div class="menu-option" onclick="toggleScreenReader()">
                    <i class="bi bi-volume-up"></i> Lector de Pantalla
                </div>
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
                <div class="menu-option" id="toggleDyslexiaFont"><i class="bi bi-fonts"></i> Cambio de Tipografía Dislexia</div>
                <div class="menu-option" id="toggleReadingMask"><i class="bi bi-distribute-vertical"></i> Máscara de Lectura</div>
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
    </div>
</form>

<!-- FOOTER -->
<footer class="footer">
    <br>
    <p class="footer-text">LICONSA © 2024</p>
</footer>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/quagga/dist/quagga.min.js"></script>
<script src="{{ asset('JS/script.js') }}"></script>
<script>
    function changePrice(value) {
        const litros = parseFloat(value);
        if (!isNaN(litros)) {
            const costo = litros * 6.50;
            document.getElementById('costo').value = costo.toFixed(2);
        } else {
            alert('Por favor ingrese un número válido de litros.');
        }
    }

    function index() {
        window.location.href = "{{ route('inicio') }}";
    }

    // Funciones de Accesibilidad
    function toggleMenu() {
        let menu = document.getElementById('sideMenu');
        let button = document.getElementById('accessibilityBtn');
        menu.classList.toggle('active');
        button.style.opacity = menu.classList.contains('active') ? "0" : "1";
    }

    document.addEventListener('click', function(event) {
        let menu = document.getElementById('sideMenu');
        let button = document.getElementById('accessibilityBtn');
        if (!menu.contains(event.target) && !button.contains(event.target)) {
            menu.classList.remove('active');
            button.style.opacity = "1";
        }
    });

    function toggleDropdown(id) {
        let submenu = document.getElementById(id);
        submenu.style.display = submenu.style.display === "flex" ? "none" : "flex";
    }

    let defaultSettings = {
        modoOscuro: false,
        daltonismo: "",
        textSize: getComputedStyle(document.body).fontSize,
        cursorSize: "",
        highlightLinks: false,
        screenReader: false,
        readingMask: false
    };

    function hayCambios() {
        return (
            document.body.classList.contains("modo-oscuro") ||
            document.body.classList.contains("protanopia") ||
            document.body.classList.contains("deuteranopia") ||
            document.body.classList.contains("tritanopia") ||
            getComputedStyle(document.body).fontSize !== defaultSettings.textSize ||
            document.body.classList.contains("cursor-small") ||
            document.body.classList.contains("cursor-medium") ||
            document.body.classList.contains("cursor-large") ||
            document.getElementById("readingMask").style.display === "block" ||
            screenReaderEnabled ||
            document.querySelectorAll('.highlighted').length > 0
        );
    }

    function resetSettings() {
        if (!hayCambios()) {
            alert("No se ha realizado ningún cambio.");
            return;
        }

        document.body.classList.remove("modo-oscuro");
        document.body.classList.remove("protanopia", "deuteranopia", "tritanopia");
        document.querySelectorAll('.submenu').forEach(submenu => {
            submenu.style.display = "none";
        });
        document.querySelectorAll('body, .navbar, .navbar a, .header, .content, .footer, .menu-option, .submenu .menu-option, .btn1')
            .forEach(el => el.style.fontSize = defaultSettings.textSize);
        document.body.classList.remove("cursor-small", "cursor-medium", "cursor-large");
        document.getElementById("readingMask").style.display = "none";
        document.getElementById("readingGuide").style.display = "none";
        document.querySelectorAll('.highlighted').forEach(el => {
            el.classList.remove('highlighted');
        });
        if (screenReaderEnabled) {
            toggleScreenReader();
        }
        detenerReconocimientoVoz();
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

    document.getElementById("highlightToggle").addEventListener("click", highlightLinksAndButtons);

    function toggleDyslexiaFont() {
        document.body.classList.toggle("dyslexia-font");
    }

    document.getElementById("toggleDyslexiaFont").addEventListener("click", toggleDyslexiaFont);

    let maskActive = false;
    let mask = document.getElementById("readingMask");
    let guide = document.getElementById("readingGuide");

    document.getElementById("toggleReadingMask").addEventListener("click", function() {
        maskActive = !maskActive;
        mask.style.display = maskActive ? "block" : "none";
        guide.style.display = maskActive ? "block" : "none";
    });

    document.addEventListener("mousemove", function(event) {
        if (maskActive) {
            let mouseY = event.clientY - 60;
            guide.style.top = `${mouseY}px`;
            mask.style.clipPath = `polygon(
                0% 0%, 100% 0%, 100% ${mouseY}px,
                0% ${mouseY}px, 0% ${mouseY + 120}px,
                100% ${mouseY + 120}px, 100% 100%, 0% 100%
            )`;
        }
    });

    let screenReaderEnabled = false;

    function speakText(text) {
        let speech = new SpeechSynthesisUtterance(text);
        speech.lang = 'es-ES';
        speech.rate = 1;
        speech.pitch = 1;
        window.speechSynthesis.speak(speech);
    }

    function toggleScreenReader() {
        if (screenReaderEnabled) {
            speakText("Desactivando lector de pantalla");
            setTimeout(() => {
                screenReaderEnabled = false;
                document.querySelectorAll("a, button, .btn1, .menu-option, input, label, .floating-icon").forEach(el => {
                    el.removeEventListener("mouseover", handleHover);
                });
                speakText("Lector de pantalla desactivado");
            }, 500);
        } else {
            screenReaderEnabled = true;
            document.querySelectorAll("a, button, .btn1, .menu-option, input, label, .floating-icon").forEach(el => {
                el.addEventListener("mouseover", handleHover);
            });
            speakText("Lector de pantalla activado");
        }
    }

    function handleHover(event) {
        if (!screenReaderEnabled) return;
        let text = event.target.innerText || event.target.alt || event.target.placeholder || event.target.getAttribute("aria-label");
        speakText(text);
    }

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

    let zoomEnabled = false;
    let magnifier = null;
    const ZOOM_LEVEL = 1.5;
    const MAGNIFIER_SIZE = 150;

    document.getElementById("toggleCursorZoom").addEventListener("click", function() {
        zoomEnabled = !zoomEnabled;
        if (zoomEnabled) {
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
            document.addEventListener('mousemove', handleZoomMouseMove);
            alert("Zoom en cursor activado.");
        } else {
            document.body.classList.remove('zoom-cursor-active');
            magnifier.style.display = 'none';
            document.removeEventListener('mousemove', handleZoomMouseMove);
        }
    });

    function handleZoomMouseMove(e) {
        if (!zoomEnabled) return;
        const x = e.clientX;
        const y = e.clientY;
        magnifier.style.left = (x - MAGNIFIER_SIZE/2) + 'px';
        magnifier.style.top = (y - MAGNIFIER_SIZE/2) + 'px';
        const elementsUnderCursor = document.elementsFromPoint(x, y);
        let targetElement = null;
        for (let el of elementsUnderCursor) {
            if (el.textContent && el !== magnifier && !el.contains(magnifier) && !magnifier.contains(el) && el.nodeName !== 'BODY' && el.nodeName !== 'HTML') {
                targetElement = el;
                break;
            }
        }
        if (targetElement) {
            const rect = targetElement.getBoundingClientRect();
            magnifierContent.innerHTML = targetElement.outerHTML;
            magnifierContent.style.transform = `scale(${ZOOM_LEVEL})`;
            const offsetX = (x - rect.left) * ZOOM_LEVEL;
            const offsetY = (y - rect.top) * ZOOM_LEVEL;
            magnifierContent.style.left = (MAGNIFIER_SIZE/2 - offsetX) + 'px';
            magnifierContent.style.top = (MAGNIFIER_SIZE/2 - offsetY) + 'px';
            magnifier.style.transform = 'scale(1)';
        } else {
            magnifier.style.transform = 'scale(0)';
        }
    }

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
            if (existingStyle) existingStyle.remove();
        }
    }

    let guideActive = false;
    const readingGuide = document.createElement('div');
    readingGuide.className = 'reading-guide';
    document.body.appendChild(readingGuide);

    document.getElementById("toggleReadingGuide").addEventListener("click", function() {
        guideActive = !guideActive;
        readingGuide.style.display = guideActive ? "block" : "none";
        if (guideActive) {
            document.addEventListener('mousemove', moveReadingGuide);
            if (screenReaderEnabled) {
                speakText("Guía de lectura activada.");
            }
        } else {
            document.removeEventListener('mousemove', moveReadingGuide);
        }
    });

    function moveReadingGuide(e) {
        const y = e.clientY;
        readingGuide.style.top = `${y}px`;
    }
</script>
</body>
</html>
