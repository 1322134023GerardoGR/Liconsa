navigator.mediaDevices.getUserMedia({ video: true })
    .then(stream => {
        const video = document.getElementById('video');
        video.srcObject = stream;
    })
    .catch(err => {
        console.error('Error al acceder a la cámara: ', err);
    });


document.getElementById('capture-btn').addEventListener('click', () => {
    const video = document.getElementById('video');
    const canvas = document.getElementById('canvas');
    const photoPreview = document.getElementById('photo-preview');
    const context = canvas.getContext('2d');

    // Dibujar la imagen capturada en el canvas
    context.drawImage(video, 0, 0, canvas.width, canvas.height);

    // Obtener la foto como una URL de datos
    const photoData = canvas.toDataURL('image/png');
    photoPreview.src = photoData;
    // Obtener el nombre de archivo de la imagen existente (si hay una)
    const existingPhoto = 'usuario.jpg'; // Reemplaza esto con el nombre de archivo existente

    // Enviar la foto y el nombre de archivo al servidor Laravel utilizando AJAX
    fetch('../../beneficiarios/imagen', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({ photo: photoData, existing_photo: existingPhoto })
    })
        .then(response => response.json())
        .then(data => {
            // Manejar la respuesta del servidor
            console.log(data.message);
            console.log(data.photo_path); // Si el servidor devuelve la ruta de la foto guardada
        })
        .catch(error => {
            console.error('Error al enviar la foto al servidor: ', error);
        });
});
