<template>
    <div class="panel">
        <div class="btn-container">
            <a class="btn1" :href="link">{{ text }}</a>
        </div>
        <div class="image-container">
            <img :src="imgSrc" :alt="altText" />
        </div>
    </div>
</template>

<script>
export default {
    props: {
        text: String,
        link: String,
        imgSrc: String,
        altText: String
    }
};
</script>

<style scoped>
/*
.panel {
    background-color: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    text-align: center;
    width: 40%;
    margin: auto;
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
    text-decoration: none;
}
.btn1:hover {
    background-color: #4a0e27;
}*/
.panel {
    background-color: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    text-align: center;
    margin: 0 80px; /* Margen añadido a los lados */
}

.btn-container {
    display: flex;
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

.image-container {
    grid-column: span 2;
    text-align: center;
}

img {
    width: 100px; /* Ajuste del ancho de la imagen */
}
</style>
