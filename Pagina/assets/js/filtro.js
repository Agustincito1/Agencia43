document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('destino');    // El input de búsqueda
    const optionsContainer = document.getElementById('opciones');  // Contenedor donde se mostrarán las opciones

    // Función para cargar las opciones desde el servidor
    function loadOptions(query) {
        // Realizar la solicitud AJAX al servidor con el término de búsqueda
        fetch(`datos_destinos.php?search=${encodeURIComponent(query)}`)
            .then(response => response.json())  // La respuesta será un JSON
            .then(data => {
                // Si hay resultados
                if (Array.isArray(data) && data.length > 0) {
                    createOptions(data);
                } else {
                    
                }
            })
            .catch(error => {
                console.error('Error al cargar opciones:', error);
            });
    }

    // Crear las opciones en el contenedor de opciones
    function createOptions(options) {
        // Limpiar el contenedor de opciones
        optionsContainer.innerHTML = '';

        options.forEach(option => {
            const div = document.createElement('div');
            div.textContent = option.text;
            div.dataset.value = option.value;

            // Al hacer clic en una opción
            div.addEventListener('click', () => {
                input.value = option.text;  // Actualiza el input con el texto de la opción seleccionada
                input.dataset.value = option.value;  // Puedes guardar el valor del ID si lo necesitas
                optionsContainer.style.display = 'none';  // Ocultar el contenedor de opciones
            });

            optionsContainer.appendChild(div);
        });

        // Mostrar las opciones
        optionsContainer.style.display = 'block';
    }

    // Función para filtrar las opciones mientras el usuario escribe
    input.addEventListener('input', () => {
        const query = input.value.trim();
        if (query.length > 0) {
            loadOptions(query);  // Solo hacer la solicitud si el input no está vacío
        } else {
            optionsContainer.style.display = 'none';  // Ocultar las opciones si el input está vacío
        }
    });

    // Cerrar el contenedor de opciones si el usuario hace clic fuera
    document.addEventListener('click', (event) => {
        if (!optionsContainer.contains(event.target) && event.target !== input) {
            optionsContainer.style.display = 'none';  // Ocultar el contenedor
        }
    });
});
