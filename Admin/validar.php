<?php
    if(isset($_POST)){
        
        include "../libraries/Query.php";

        $contrasena = $_POST['contrasena'];
        $usuario = $_POST['usuario'];

        if($validar = QueryAndGetData("SELECT AdminID ,Usuario, Contraseña FROM `admin` WHERE Contraseña = '$contrasena' AND Usuario = '$usuario'")){
            //consulta completa
            if(mysqli_num_rows($validar)>0){
                //existe
                if($datos = mysqli_fetch_assoc($validar)){
                    $nameS = "ID";
                    $data = $datos['AdminID'];
                    savedataSession($data, $nameS);
                    header("Location: menu.php");
                    exit();
                }

            }else{
                //No existe
            }

        }else{
            //mal consulta
        }
    }


?>