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

        include "querys.php";

        if(isset($_GET['tabla'])){

            $tabla = $_GET['tabla'];
            $id = $_GET['id'];
            $nombreID= $_GET['campo'];
        
            if(Query("DELETE FROM `$tabla` WHERE `$nombreID` = $id")){
                echo "
                <script>
                    Swal.fire({
                        title: '¡Dato eliminado correctamente!',
                        icon: 'success',
                        confirmButtonText: 'Aceptar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            history.go(-1);
                        }
                    });
                </script>";
            }
            else{
                echo "
                <script>
                    Swal.fire({
                        title: '¡Oops...!',
                        text: 'No se pudo eliminar',
                        icon: 'error',
                        confirmButtonText: 'Aceptar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            
                            history.go(-1);
                        }
                    });
                </script>";
            }
                
        
        }
        
        
    ?>
</body>
</html>

