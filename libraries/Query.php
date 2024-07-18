<?php


    function ErrorLog($mensaje){

        $archivo_log = "registro.log";
        $fecha_hora_segundo = date('Y-m-d H:i:s');
        $string = " " . $fecha_hora_segundo . ":  Error: " . $mensaje . "\n";

        error_log($string, 3, $archivo_log);
    }



    function Query($query){
        include "config.php";
        include Conexion;

        try{

            if($ejecucion = mysqli_query($conexion, $query)){

                return true;

            }
            else{
                throw new Exception(mysqli_error($conexion));
                return false;
            }

        }catch(Exeption $Error){

            $Error = $error->getMessage();
            ErrorLog($Error);

        }
        
    }

    function QueryAndGetData($query){
        include "config.php";
        include Conexion;

        try{

            if($ejecucion = mysqli_query($conexion, $query)){

                return $ejecucion;

            }
            else{
                throw new Exception(mysqli_error($conexion));
                return false;
            }

        }catch(Exeption $Error){

            $Error = $error->getMessage();
            ErrorLog($Error);

        }
        
    }


?>