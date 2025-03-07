<template>
    <HeaderNavbar/>

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
        <Panel
            isForm="true"
            formAction="/beneficiarios/buscar"
            formLabel="Código del Beneficiario:"
            inputId="codigo"
            inputName="codigo"
            imgSrc="/img/bx-search-alt-2.svg"
            altText="Buscar Beneficiario"
        />
    </div>

    <Footer />
</template>

<script>
import HeaderNavbar from "./header_navbar.vue";
import Panel from "./Panel.vue";
import Footer from "./Footer.vue";

export default {
    components: {
        HeaderNavbar,
        Panel,
        Footer
    }
};
</script>

<style scoped>
.content {
    display: grid;
    background-color: #D4C19C;
    grid-template-columns: repeat(3, 1fr);
    grid-gap: 20px;
    padding: 20px;
    justify-items: center;
}

.content > :last-child {
    grid-column: span 1;
}
</style>
