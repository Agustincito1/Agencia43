document.addEventListener('DOMContentLoaded', () => {
    const input = document.getElementById('destino');
    const optionsContainer = document.getElementById('opciones');

    // Función para cargar las opciones desde el servidor
    function loadOptions() {
        fetch('datos_destinos.php')
            .then(response => response.json())
            .then(data => {
                createOptions(data);
                input.addEventListener('input', () => filterOptions(data));
                input.addEventListener('focus', () => optionsContainer.style.display = 'block');
                document.addEventListener('click', (event) => {
                    if (!optionsContainer.contains(event.target) && event.target !== input) {
                        optionsContainer.style.display = 'none';
                    }
                });
            })
            .catch(error => console.error('Error al cargar opciones:', error));
    }

    // Crear las opciones en el contenedor
    function createOptions(options) {
        optionsContainer.innerHTML = '';
        options.forEach(option => {
            const div = document.createElement('div');
            div.textContent = option.text;
            div.dataset.value = option.value;
            div.addEventListener('click', () => {
                input.value = option.text;
                input.dataset.value = option.value;
                optionsContainer.style.display = 'none';
            });
            optionsContainer.appendChild(div);
        });
    }

    // Filtrar las opciones según el texto del input
    function filterOptions(options) {
        const filter = input.value.toLowerCase();
        const optionDivs = optionsContainer.querySelectorAll('div');
        optionDivs.forEach(div => {
            const text = div.textContent.toLowerCase();
            if (text.includes(filter)) {
                div.style.display = 'block';
            } else {
                div.style.display = 'none';
            }
        });
    }

    // Cargar las opciones al iniciar
    loadOptions();
});