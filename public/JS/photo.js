// Acceder a la cámara y mostrar la vista previa
navigator.mediaDevices.getUserMedia({ video: true })
    .then(stream => {
        const video = document.getElementById('video');
        video.srcObject = stream;
    })
    .catch(err => {
        console.error('Error al acceder a la cámara: ', err);
    });

// Capturar la foto cuando se haga clic en el botón
document.getElementById('capture-btn').addEventListener('click', () => {
    const video = document.getElementById('video');
    const canvas = document.getElementById('canvas');
    const photo = document.getElementById('photo');
    const context = canvas.getContext('2d');

    // Dibujar la imagen capturada en el canvas
    context.drawImage(video, 0, 0, canvas.width, canvas.height);

    // Obtener la foto como una URL de datos y mostrarla en la etiqueta de la imagen
    photo.src = canvas.toDataURL('image/png');

    // Aquí puedes enviar la foto al servidor para guardarla
    // Puedes usar AJAX para enviar la foto al servidor Laravel
});
