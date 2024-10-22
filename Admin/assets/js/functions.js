function showImage(inputId, imgId) {
    const fileInput = document.getElementById(inputId);
    const file = fileInput.files[0];

    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const img = document.getElementById(imgId);
            img.src = e.target.result; // Establece la fuente de la imagen
            img.style.display = 'block'; // Muestra la imagen

            // Muestra el botón de descarga
            document.getElementById('downloadBtn').style.display = 'block';
        };
        reader.readAsDataURL(file); // Lee el archivo como URL de datos
    }
}

function downloadImage(imgId) {
const img = document.getElementById(imgId);
const link = document.createElement('a');
link.href = img.src; // Usa la fuente de la imagen
link.download = 'imagen.png'; // Nombre del archivo
document.body.appendChild(link);
link.click();
document.body.removeChild(link);
}