<template>
    <Header />
    <Navbar />

    <div class="content">
        <Panel
            text="Lista de Beneficiarios"
            link="/beneficiarios/list"
            imgSrc="/img/bx-list-ul.svg"
            altText="Lista"
        />
        <Panel
            text="Registrar Beneficiario"
            link="/beneficiarios/nuevo"
            imgSrc="/img/bx-user-plus.svg"
            altText="Beneficiario"
        />
        <Panel
            text="Registrar Nueva Venta"
            link="/add/sell"
            imgSrc="/img/bx-dollar-circle.svg"
            altText="Venta"
        />
        <Panel
            text="Registrar Usuario"
            link="/user/nuevo"
            imgSrc="/img/bx-user.svg"
            altText="Usuario"
        />
    </div>

    <Footer />
</template>

<script>
import Header from "./Header.vue";
import Navbar from "./Navbar.vue";
import Panel from "./Panel.vue";
import Footer from "./Footer.vue";

export default {
    components: {
        Header,
        Navbar,
        Panel,
        Footer
    }
};
</script>

<style scoped>
.content {
    display: grid;
    background-color: #D4C19C;
    grid-template-columns: repeat(2, 1fr);
    grid-gap: 20px;
    padding: 20px;
    justify-items: center;
}
</style>
