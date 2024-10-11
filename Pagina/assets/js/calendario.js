// Función para cargar el calendario
function loadCalendar(month, year) {
    fetch(`calender.php?month=${month}&year=${year}`)
        .then(response => {
            if (!response.ok) {
                throw new Error('Error al cargar el calendario');
            }
            return response.text();
        })
        .then(data => {
            const container = document.getElementById('calendar-container');
            container.innerHTML = data;
        })
        .catch(error => {
            console.error(error);
            document.getElementById('calendar-container').innerHTML = '<p>Error al cargar el calendario.</p>';
        });
}

// Funciones para manejar la navegación
function prevMonth() {
    if (currentMonth === 1) {
        currentMonth = 12;
        currentYear--;
    } else {
        currentMonth--;
    }
    loadCalendar(currentMonth, currentYear);
}

function nextMonth() {
    if (currentMonth === 12) {
        currentMonth = 1;
        currentYear++;
    } else {
        currentMonth++;
    }
    loadCalendar(currentMonth, currentYear);
}

// Variables globales para el mes y el año actuales
let currentMonth = new Date().getMonth() + 1; // Los meses en JavaScript son 0-11
let currentYear = new Date().getFullYear();

// Cargar el calendario inicial
loadCalendar(currentMonth, currentYear);