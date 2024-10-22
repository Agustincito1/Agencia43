var picker = new Pikaday({
    field: document.getElementById('fecha'),
    format: 'YYYY-MM-DD',
    onSelect: function(date) {
        // Copia la fecha seleccionada al input tipo date oculto
        document.getElementById('hidden-date-input').value = date.toISOString().split('T')[0];
    }
});
