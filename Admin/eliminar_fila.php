<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../libraries/sweet/node_modules/sweetalert2/dist/sweetalert2.min.css">
    <script src="../libraries/sweet/node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
    <title>Eliminar Datos</title>
</head>
<body>
    
    <?php
        include "../libraries/functions.php";

        if(verificarsession()){
            if(isset($_GET['tabla'])){

                $tabla = $_GET['tabla'];
                $id = $_GET['id'];
                $nombreID= $_GET['campo'];
        
                if(Query("DELETE FROM `$tabla` WHERE `$nombreID` = $id")){
                    echo "Eliminado correctamente";
                }
                else{
                    echo "
                    <script>
                        Swal.fire({
                            title: '¡Oops...!',
                            text: 'No iniciaste sesion',
                            icon: 'error',
                            confirmButtonText: 'Aceptar'
                        });
                    </script>";
                }
                
        
            }
        }
        
    ?>
</body>
</html>

