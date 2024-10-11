


<?php
    include "querys.php";
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

    $martes = [];
    for ($i = 1; $i <= $lastDate; $i++) {
        $currentDay = new DateTime("$year-$month-$i");
        if ($currentDay->format('N') == 2) { // 1 es lunes
            $martes[] = $i; // Agregar el día al array de lunes
        }
    }

    $miercoles = [];
    for ($i = 1; $i <= $lastDate; $i++) {
        $currentDay = new DateTime("$year-$month-$i");
        if ($currentDay->format('N') == 3) { // 1 es lunes
            $miercoles[] = $i; // Agregar el día al array de lunes
        }
    }

    $jueves = [];
    for ($i = 1; $i <= $lastDate; $i++) {
        $currentDay = new DateTime("$year-$month-$i");
        if ($currentDay->format('N') == 4) { // 1 es lunes
            $jueves[] = $i; // Agregar el día al array de lunes
        }
    }

    $viernes = [];
    for ($i = 1; $i <= $lastDate; $i++) {
        $currentDay = new DateTime("$year-$month-$i");
        if ($currentDay->format('N') == 5) { // 1 es lunes
            $viernes[] = $i; // Agregar el día al array de lunes
        }
    }

    $sabado = [];
    for ($i = 1; $i <= $lastDate; $i++) {
        $currentDay = new DateTime("$year-$month-$i");
        if ($currentDay->format('N') == 6) { // 1 es lunes
            $sabado[] = $i; // Agregar el día al array de lunes
        }
    }


    $domingo = [];
    for ($i = 1; $i <= $lastDate; $i++) {
        $currentDay = new DateTime("$year-$month-$i");
        if ($currentDay->format('N') == 7) { // 1 es lunes
            $domingo[] = $i; // Agregar el día al array de lunes
        }
    }



    echo "<div id='days'>";
    for ($i = 1; $i < $firstWeekday; $i++) {
        echo "<div></div>";
    }
    for ($day = 1; $day <= $lastDate; $day++) {
        if (in_array($day, $lunes)) {
            $dia = 'lunes';
            echo "<div class='day'><span class='di' data-info='$day-$dia-$month-$year'>$day</span></div>";
        } else {
            if(in_array($day, $martes)){
                $dia = 'martes';
                echo "<div class='day'><span class='di' data-info='$day-$dia-$month-$year'>$day</span></div>";
            }
            else{
                if(in_array($day, $miercoles)){
                    $dia = 'miercoles';
                    echo "<div class='day'><span class='di' data-info='$day-$dia-$month-$year'>$day</span></div>";
                }
                else{
                    if(in_array($day, $jueves)){
                        $dia = 'jueves';
                        echo "<div class='day'><span class='di' data-info='$day-$dia-$month-$year'>$day</span></div>";
                    }
                    else{
                        if(in_array($day, $viernes)){
                            $dia = 'viernes';
                            echo "<div class='day'><span class='di' data-info='$day-$dia-$month-$year'>$day</span></div>";
                        }
                        else{
                            if(in_array($day, $sabado)){
                                $dia = 'sabado';
                                echo "<div class='day'><span class='di' data-info='$day-$dia-$month-$year'>$day</span></div>";
                            }
                            else{
                                if(in_array($day, $domingo)){
                                    $dia = 'domingo';
                                    echo "<div class='day'><span class='di' data-info='$day-$dia-$month-$year'>$day</span></div>";
                                }
                                else{
                                    echo "<div class='day'>$day</div>";
                                }
                            }
                        }
                    }
                }
            }
            
        }
    }
    echo "</div>";
?>
