<?php

    function ErrorLog2($mensaje){
        $archivo_log = "registro.log";
        $fecha_hora_segundo = date('Y-m-d H:i:s');
        $string = " " . $fecha_hora_segundo . ":  Error: " . $mensaje . "\n";
        error_log($string, 3, $archivo_log);
    }

    function Query($query){
        include "conexion.php";     

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
            ErrorLog2($Error);

        }
        
    }

    function QueryAndGetData($query){
        include "conexion.php";
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
            ErrorLog2($Error);
        }
    }


    function verificarsession(){
        session_start();
        
        if(isset($_SESSION['ID'])){
            return True;
        }
        else{
            return false;
        }
    }



?>