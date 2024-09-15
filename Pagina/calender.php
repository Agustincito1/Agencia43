


<?php
    include "querys.php";
    $lunesdata = QueryAndGetData($lunes);
    $lunesdata = mysqli_fetch_assoc($lunesdata);
    // Obtener el mes y el año desde los parámetros GET, o usar el mes y año actuales si no están presentes
    $month = isset($_GET['month']) ? intval($_GET['month']) : date('n');
    $year = isset($_GET['year']) ? intval($_GET['year']) : date('Y');

    $monthNames = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio",
                    "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];

    // Crear objetos DateTime para el primer y último día del mes
    $firstDayOfMonth = new DateTime("$year-$month-01");
    $lastDayOfMonth = new DateTime($firstDayOfMonth->format('Y-m-t'));

    // Obtener el primer día de la semana y el último día del mes
    $firstWeekday = $firstDayOfMonth->format('N'); // 1 (lunes) - 7 (domingo)
    $lastDate = $lastDayOfMonth->format('j');

    // Generar los nombres de los días de la semana
    $weekdays = [ 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sa','Do'];

    // Imprimir el encabezado con el mes y el año
    echo "<div id='calendar-header'>";
    echo "<button onclick='prevMonth()'>&#10094;</button>";
    echo "<span id='month-year'>{$monthNames[$month - 1]} $year</span>";
    echo "<button onclick='nextMonth()'>&#10095;</button>";
    echo "</div>";

    // Imprimir los días de la semana
    echo "<div id='weekdays'>";
    foreach ($weekdays as $day) {
        
        echo "<div>$day</div>";
    }
    echo "</div>";

    // Obtener todos los días de una semana específica
    $lunes = [];
    for ($i = 1; $i <= $lastDate; $i++) {
        $currentDay = new DateTime("$year-$month-$i");
        if ($currentDay->format('N') == 1) { // 1 es lunes
            $lunes[] = $i; // Agregar el día al array de lunes
        }
    }

    echo "<div id='days'>";
    for ($i = 1; $i < $firstWeekday; $i++) {
        echo "<div></div>";
    }
    for ($day = 1; $day <= $lastDate; $day++) {
        if (in_array($day, $lunes)) {
            // El día está en el array de lunes, así que lo resaltamos
            echo "<div>$day ".$lunesdata['Horario']."</div>";
        } else {
            // El día no está en el array de lunes, así que lo mostramos normalmente
            echo "<div class='day'>$day</div>";
        }
    }
    echo "</div>";
?>
