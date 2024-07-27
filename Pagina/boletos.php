<?php 
    if(isset($_POST['buscar'])){

        if(isset($_POST['option2'])){
            $option = $_POST['option2'];
        }
        else{
            if(isset($_POST['option1'])){
                $option = $_POST['option1'];
            }
            else{
                echo "Debes elegir una opcion";
            }
        }

        $tipo = $_POST['tipo'];

        
        if($_POST['destino'] = ""){
            $destino = $_POST['destino'];
        }
        else{
            echo "campo vacio";
        }

        if($_POST['fecha'] = ""){
            $fecha = $_POST['fecha'];
        }
        else{
            echo "campo vacio";
        }

        if($_POST['cantidad'] = ""){
            $pasajeros = $_POST['cantidad'];
        }
        else{
            echo "campo vacio";
        }

    }
    else{
        echo "error en el envio de datos";
    }

?>