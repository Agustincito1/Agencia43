<?php
    function ErrorLog($mensaje){
        $archivo_log = "registro.log";
        $fecha_hora_segundo = date('Y-m-d H:i:s');
        $string = " " . $fecha_hora_segundo . ":  Error: " . $mensaje . "\n";
        error_log($string, 3, $archivo_log);
    }


    $servername = "localhost";
    $username = "root"; 
    $password = "";
    $dbname = "agencia4344";
    
    try{

        $conexion = mysqli_connect($servername, $username, $password, $dbname);

        if (!$conexion) {
            throw new Exception("Conexión fallida: " . mysqli_connect_error());
        }
        
        
        
    }catch (Exception $error) {
        
        $Error = $error->getMessage();
        ErrorLog($Error);
    }

?>