<template>
    <div class="header-navbar">
        <div class="header">
            <div class="logo-container">
                <h1 class="liconsa-text">LICONSA</h1>
                <img src="/public/img/vaca.png" alt="Logo LICONSA" class="liconsa-logo">
            </div>
            <h2 class="gov-text">Gobierno de México</h2>
        </div>
        <nav class="navbar">
            <div class="container-fluid">
                <ul class="navbar-nav">
                    <li v-for="item in menuItems" :key="item.name" class="nav-item">
                        <a class="nav-link" :href="item.link">{{ item.name }}</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</template>

<script>
export default {
    data() {
        return {
            menuItems: [
                { name: "Inicio", link: "/" },
                { name: "Lista de Beneficiarios", link: "/beneficiarios/list" },
                { name: "Registrar Beneficiario", link: "/beneficiarios/nuevo" },
                { name: "Registrar Nueva Venta", link: "/add/sell" },
                { name: "Registrar Usuario", link: "/user/nuevo" },
                { name: "Lista De Usuarios", link: "/trabajadores/list" },
                { name: "Lista De Ventas", link: "/ventas/list" },
            ],
        };
    }
};
</script>

<style scoped>
/* Unifica el header y el navbar en una sola barra */
.header-navbar {
    background-image: url('/img/FondoV1.png');
    color: white;
    width: 100%;
}
.logo-container {
    display: flex;
    align-items: center;
    gap: 10px;
}
.liconsa-logo {
    width: 40px;
    height: auto;
    vertical-align: middle;
}
/* Estilos del header */
.header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 10px 100px;
}

.liconsa-text {
    font-family: 'Montserrat', serif;
    font-weight: 700;
    font-size: 45px;
    font-style: normal;
}

.gov-text {
    font-family: 'Montserrat', serif;
    font-weight: 400;
    font-size: 30px;
    font-style: normal;
}
/* Estilos del navbar */
.navbar {
    display: flex;
    justify-content: center; /* Centra los elementos del navbar */
    align-items: center;
    padding: 10px 0;
    background: linear-gradient(to bottom, rgba(19, 50, 43, 0.9), rgba(212, 193, 156, 0.95));
    backdrop-filter: blur(1px); /* Difuminado para mejorar legibilidad */
}

.container-fluid {
    display: flex;
    justify-content: center; /* Centra todo el contenido */
    width: 100%;
}

/* Asegura que los elementos del navbar estén en una fila centrada */
.navbar-nav {
    display: flex;
    flex-direction: row;
    list-style: none;
    padding: 0;
    margin: 0;
    justify-content: center;
}

/* Espaciado entre elementos del navbar */
.nav-item {
    margin: 0 15px;
}

/* Estilo de los enlaces */
.nav-link {
    color: #621132;
    text-decoration: none;
    font-size: 19px;
    padding: 10px 15px;
    border-radius: 5px; /* Bordes redondeados */
    transition: background-color 0.3s ease, color 0.3s ease; /* Suavizar efectos */
}

.nav-link:hover {
    color: white;
}
</style>
