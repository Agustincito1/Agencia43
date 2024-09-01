<?php
    header('Content-Type: application/json');
    include "../libraries/functions.php";

    $query = QueryAndGetData("SELECT `DestinoID`, `Nombre`, `LocalidadID`, `BoletoID` FROM `destino` WHERE 1");
    $date = [];
    if($data = mysqli_fetch_assoc($query)){
        $date = [
            ['text' => $data['Nombre'], 'value' => $data['DestinoID']],
        ];
    }
    
    
    // Convertir el array en formato JSON
    echo json_encode($date);
?>