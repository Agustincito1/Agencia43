<?php

    $servername = "localhost";
    $username = "root"; 
    $password = "";
    $dbname = "agencia4344"; 

    $conexion = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conexion) {
        die("Conexión fallida: " . mysqli_connect_error());
    }
    else{
        echo "Conexión exitosa";
    }
    
    mysqli_close($conexion);
?>