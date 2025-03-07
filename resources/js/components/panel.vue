<template>
    <div :class="['panel', { 'horizontal-panel': isForm }]">
        <template v-if="isForm">
            <form :action="formAction" method="GET" class="form-container">
                <h4>{{ formLabel }}</h4>
                <div class="input-group">
                    <input type="text" class="form-control" :id="inputId" :name="inputName" required>
                    <button type="submit" class="btn1">Buscar</button>
                    <div class="icon-container">
                        <img :src="imgSrc" :alt="altText" />
                    </div>
                </div>
            </form>
        </template>
        <template v-else>
            <div class="btn-container">
                <a class="btn1" :href="link">{{ text }}</a>
            </div>
            <div class="image-container">
                <img :src="imgSrc" :alt="altText" />
            </div>
        </template>
    </div>
</template>

<script>
export default {
    props: {
        text: String,
        link: String,
        imgSrc: String,
        altText: String,
        isForm: Boolean,
        formAction: String,
        formLabel: String,
        inputId: String,
        inputName: String
    }
};
</script>

<style scoped>

.panel {
    font-family: 'Montserrat', serif;
    background-color: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    text-align: center;
    margin: 0 80px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

.btn-container {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 10px;
    width: 100%;
}

.btn1 {
    padding: 15px 30px;
    border-radius: 5px;
    background-color: #621132;
    color: white;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    text-decoration: none;
    text-align: center;
}

.btn1:hover {
    background-color: #4a0e27;
}


.image-container {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 10px;
}

img {
    width: 100px;
}


.horizontal-panel {
    width: 100%;
    flex-direction: row;
    justify-content: center;
    padding: 20px;
}


.form-container {
    display: flex;
    flex-direction: column;
    width: 100%;
    align-items: center;
}


.input-group {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 80%;
    gap: 15px;
}


input {
    flex-grow: 2;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
}


button {
    background-color: #621132;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
}

button:hover {
    background-color: #4a0e27;
}


.icon-container img {
    width: 50px;
    height: auto;
}
</style>
