function showImage(inputId, imgId) {
    const fileInput = document.getElementById(inputId);
    const file = fileInput.files[0];

    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const img = document.getElementById(imgId);
            img.src = e.target.result; // Establece la fuente de la imagen
            img.style.display = 'block'; // Muestra la imagen

        };
        reader.readAsDataURL(file); // Lee el archivo como URL de datos
    }
}

