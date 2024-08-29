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

        if(isset($_POST['AnadirBoleto'])){
            
            $id = $_POST['id'];
            $nombre = $_POST['Nombre'];
            $tipo = $_POST['Tipo'];
            $horario = $_POST['Horario'];
            $precio = $_POST['Precio'];
            $cantidad = $_POST['Cantidad'];
            $ida = $_POST['IdaYvuelta'];
            $add = "UPDATE `boleto` SET `NombreBoleto`='$nombre',`Precio`='$precio',`TipoboletoID`='$tipo',`HorarioID`='$horario',`CantidadPersonas`='$cantidad',`IdaYvuelta`='$ida' WHERE BoletoID = $id";

            if(Query($add)){
                echo "
                <script>
                    Swal.fire({
                        title: '¡Boleto creado correctamente!',
                        icon: 'success',
                        confirmButtonText: 'Aceptar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            
                            window.location.href = 'boleto.php';
                        }
                    });
                </script>";
            }

        }
        else{
            if(isset($_POST['AñadirEmpresa'])){
        
            }
            else{
                if(isset($_POST['AñadirEmpresa'])){
        
                }
                else{
                    if(isset($_POST['AñadirLugar'])){
        
                    }
                    else{
                        if(isset($_POST['AñadirTipo'])){


        
                        }
                    }
                }
            }
        }
        
    ?>
</body>
</html>
