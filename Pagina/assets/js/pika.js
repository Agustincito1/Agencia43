var picker = new Pikaday({
    field: document.getElementById('fecha'),
    format: 'YYYY-MM-DD',  // Aquí defines el formato de la fecha que usará Pikaday
    i18n: {
        previousMonth : 'Mes anterior',
        nextMonth     : 'Mes siguiente',
        months        : ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        weekdays      : ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
        weekdaysShort : ['Dom', 'Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb']
    },
    onSelect: function(date) {
        // Establece la fecha seleccionada en el input tipo date
        // El valor se asigna directamente al input tipo date con el formato YYYY-MM-DD
        document.getElementById('fecha').value = date.toISOString().split('T')[0];
    }
});
