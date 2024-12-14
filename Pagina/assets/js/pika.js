// Obtener la fecha actual en formato YYYY-MM-DD para que se muestre en el input por defecto
const today = new Date();
const formattedDate = today.toISOString().split('T')[0];  // Formato YYYY-MM-DD
document.getElementById('fecha').value = formattedDate; // Asigna la fecha predeterminada al input

// Inicializa Pikaday
var picker = new Pikaday({
    field: document.getElementById('fecha'),
    format: 'YYYY-MM-DD',  // Formato de fecha que usará Pikaday
    i18n: {
        previousMonth : 'Mes anterior',
        nextMonth     : 'Mes siguiente',
        months        : ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
        weekdays      : ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
        weekdaysShort : ['Dom', 'Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb']
    },
    onSelect: function(date) {
        // Establece la fecha seleccionada en el input tipo date
        const formattedDate = date.toLocaleDateString('en-CA'); // Usa el formato ISO 8601 (YYYY-MM-DD)
        document.getElementById('fecha').value = formattedDate;  // Asigna la fecha al input
    }
});
