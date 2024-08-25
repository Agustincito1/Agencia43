<?php
    include "../libraries/Query.php";

    if(verificarsession()){
        if(isset($_GET['tabla'])){

            $tabla = $_GET['tabla'];
            $id = $_GET['id'];
            $nombreID= $_GET['campo'];
    
            if(Query("DELETE FROM `$tabla` WHERE `$nombreID` = $id")){
                echo "Eliminado correctamente";
            }
            else{
                echo "<script> alert('No se elimino'); </script>";
            }
            
    
        }
    }
    else{
        //alerta personalizada
    }
    
?>