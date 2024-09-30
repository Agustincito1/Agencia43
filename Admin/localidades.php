<?php
    header('Content-Type: application/json');
    include "querys.php";

    $Provincia = $_GET['categoria'];

    $options = [];
    $query = "SELECT LocalidadID, Localidad FROM localidad WHERE ProvinciaID = $Provincia";

    if($data = QueryAndGetData($query)){
        while($row = mysqli_fetch_assoc($data)){

            $options[] = ['value' => $row['LocalidadID'], 'text' => $row['Localidad']];

        }


    }


    echo json_encode($options);

?>