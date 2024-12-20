<?php
    header('Content-Type: application/json');
    include "../libraries/functions.php";  // Asegúrate de que este archivo incluya la conexión a la base de datos
    include "../libraries/conexion.php";
    // Verifica que el parámetro 'search' esté presente
    if (isset($_GET['search'])) {
        
        // Obtiene el término de búsqueda y sanitiza la entrada
        $search = $_GET['search'];
        $search = mysqli_real_escape_string($conexion, $search);  // Sanitiza la entrada para evitar inyecciones SQL
        
        // Construye la consulta SQL
        $query = "SELECT
            `localidad`.`LocalidadID`,
            `provincia`.`Provincia`, 
            `localidad`.`Localidad`
        FROM `localidad`
        INNER JOIN `provincia` ON `provincia`.`ProvinciaID` = `localidad`.`ProvinciaID`
        WHERE `localidad`.`Localidad` LIKE '%$search%';";

        // Llama a la función QueryAndGetData con la consulta preparada
        $result = QueryAndGetData($query);

        // Inicializa el array para almacenar los resultados
        $data = [];

        // Si hay resultados
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {

                $text = $row['Provincia'].","." ".$row['Localidad'];
                $data[] = [
                    'text' => $text, 
                    'value' => $row['LocalidadID']
                ];
            }
            
            // Si no se encontraron resultados, devolvemos un mensaje indicando que no hay resultados
            if (empty($data)) {
                $data = [['text' => 'No se encontraron resultados', 'value' => '']];
            }

            // Devuelve los resultados en formato JSON
            echo json_encode($data);
        } else {
            // Si hubo un error en la consulta o no hay resultados
            echo json_encode(['error' => 'Hubo un problema con la búsqueda.']);
        }
    }
?>
