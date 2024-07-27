<?php

    include "libraries/Query.php"; 

    $servername = "localhost";
    $username = "root"; 
    $password = "";
    $dbname = "agencia4344";
    
    try{

        $conexion = mysqli_connect($servername, $username, $password, $dbname);

        if (!$conexion) {
            throw new Exception("Conexión fallida: " . mysqli_connect_error());
        }
        
        mysqli_close($conexion);
        
    }catch (Exception $error) {

        echo "Error: " . $error->getMessage();
        $Error = $error->getMessage();
        ErrorLog($Error);

    }
?>