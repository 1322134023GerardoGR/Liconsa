<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LICONSA</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
    @vite(['resources/js/app.js'])
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Lexend+Deca:wght@400;700&display=swap');
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
            background-color: rgba(0, 0, 0, 0.3);
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

        nav.navbar {
            background-color: #A57F2C;
            padding: 10px 20px;
            display: flex;
            gap: 15px;
            align-items: center;
            justify-content: center !important;
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

        .content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 33px;
            padding: 100px 20px;
            max-width: 1200px;
            margin: auto;
        }

        .panel {
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .wide-panel {
            grid-column: span 2;
        }

        .centered-panel {
            justify-self: center;
        }

        .btn1 {
            background-color: #621132;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 20px;
            cursor: pointer;
            transition: 0.3s;
            text-decoration: none;
            display: inline-block;
            margin-bottom: 10px;
            margin-top: 20px;
            height: 50px;
        }

        .btn1.buscar-btn {
            margin-top: 10px;
        }

        .btn1:hover {
            background-color: #4a0e27;
        }

        .image-container img {
            width: 50px;
            height: auto;
        }

        .footer {
            background-color: #621132;
            background-image: url("{{ asset('img/fondofootergob.png') }}");
            background-size: cover;
            background-position: center;
            color: white;
            text-align: center;
            padding: 15px;
            margin-top: 40px;
        }

        .codigo-benef {
            font-size: 20px;
        }

        .num-benef {
            font-family: 'Libre Baskerville', serif;
            height: 50px;
            padding: 0 10px;
            font-size: 18px;
            border: 1px solid #ccc;
            border-radius: 5px;
            display: inline-flex;
            align-items: center;
        }

        .form-container {
            display: flex;
            align-items: center;
            gap: 10px;
            width: 100%;
            justify-content: center;
        }

        .wide-panel .form-container, .wide-panel .image-container {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .num-benef::placeholder {
            color: #aaa;
            font-size: 18px;
        }
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
            transition: opacity 0.3s ease-in-out; /* Animación suave */
        }

        .floating-icon i {
            padding-top: 7px;
            color: black;
            font-size: 54px;
        }

        /* Estilos del menú lateral */
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
        /* Botones para ajustar tamaño del texto */
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
    </style>
</head>
<body>
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

<div class="content">
    <div class="panel">
        <a class="btn1" href="{{route('beneficiarios.list')}}">Lista de Beneficiarios</a>
        <div class="image-container">
            <img src="/img/bx-list-ul.svg" alt="Leche"/>
        </div>
    </div>

    <div class="panel">
        <a class="btn1" href="{{route('beneficiarios.nuevo')}}">Registrar Beneficiario</a>
        <div class="image-container">
            <img src="/img/bx-user-plus.svg" alt="Leche"/>
        </div>
    </div>

    <div class="panel">
        <a class="btn1" href="{{route('add.sell')}}">Registrar Nueva Venta</a>
        <div class="image-container">
            <img src="/img/bx-dollar-circle.svg" alt="Leche"/>
        </div>
    </div>

    <div class="panel wide-panel">
        <form class="form-container" action="{{ route('beneficiarios.buscar') }}" method="GET">
            @csrf
            <input class="num-benef" type="text" id="codigo" name="codigo" placeholder="Código del Beneficiario" required>
            <button type="submit" class="btn1 buscar-btn">Buscar</button>
            <div class="image-container">
                <img src="/img/bx-search-alt-2.svg" alt="Leche"/>
            </div>
        </form>
    </div>

    <div class="panel">
        <a class="btn1" href="{{route('user.nuevo')}}">Registrar Usuario</a>
        <div class="image-container">
            <img src="/img/bx-user.svg" alt="Leche"/>
        </div>
    </div>
    <div class="side-menu" id="sideMenu">
        <div class="reset-button" onclick="resetSettings()">
            <i class="bi bi-arrow-counterclockwise"></i> Restablecer
        </div>

        <div class="menu-option" onclick="toggleDropdown('vozDropdown')">
            <i class="bi bi-mic"></i> Control de Voz
        </div>
        <div class="submenu" id="vozDropdown">
            <div class="menu-option"><i class="bi bi-mic-fill"></i> Activar Reconocimiento</div>
            <div class="menu-option"><i class="bi bi-sliders"></i> Configurar Comandos</div>
        </div>

        <div class="menu-option" onclick="toggleDropdown('personalizacionDropdown')">
            <i class="bi bi-palette"></i> Personalización
        </div>
        <div class="submenu" id="personalizacionDropdown">
            <div class="menu-option"><i class="bi bi-moon"></i> Modo Oscuro</div>
            <div class="menu-option"><i class="bi bi-fonts"></i> Tamaño de Fuente</div>
        </div>

        <div class="menu-option" onclick="toggleDropdown('accesibilidadDropdown')">
            <i class="bi bi-universal-access"></i> Accesibilidad
        </div>
        <div class="submenu" id="accesibilidadDropdown">
            <div class="menu-option"><i class="bi bi-keyboard"></i> Navegación por Teclado</div>
            <div class="menu-option"><i class="bi bi-volume-up"></i> Lector de Pantalla</div>
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
            <div class="menu-option" id=""><i class="bi bi-distribute-vertical"></i> Mascara de Lectura</div>
        </div>
    </div>

    <div class="floating-icon" id="accessibilityBtn" onclick="toggleMenu()"aria-label="Abrir menú de accesibilidad">
        <i class="bi bi-universal-access-circle"></i>
    </div>
</div>

<footer class="footer">
    <p class="footer-text">LICONSA © 2025</p>
</footer>
<script>
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

    function resetSettings() {
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
</script>
</body>
</html>
