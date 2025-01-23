<template>
    <div class="mynav">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid asd">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse asd" id="navbarNav">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li v-for="item in menuItems" :key="item.name" class="nav-item">
                            <a class="nav-link" :href="item.link">{{ item.name }}</a>
                        </li>
                    </ul>
                </div>
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
/*.mynav, .navbar {
    background-color: #285C4D;
    color: white;
}
.navbar a:hover {
    color: #621132;
}*/
.mynav {
    background-color: #285C4D;
    color: white;
    display: flex;
    align-items: center;
    justify-content: right;
    height: 40px;
}

.navbar {
    background-color: #285C4D;
    height: 40px;
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

</style>
