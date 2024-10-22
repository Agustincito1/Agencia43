<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../libraries/sweet/node_modules/sweetalert2/dist/sweetalert2.min.css">
    <script src="../libraries/sweet/node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
    <link rel="shortcut icon" href="imgs/icono.ico" type="image/x-icon">
    <title>Actualizar Datos</title>
</head>
<body>
    
    <?php

        include "querys.php";

        if(isset($_POST['uptdateBoleto'])){
            
            $id = $_POST['id'];
            $nombre = $_POST['NombreU'];
            $tipo = $_POST['TipoU'];
            $horario = $_POST['HorarioU'];
            $precio = $_POST['PrecioU'];
            $cantidad = $_POST['CantidadU'];
            $ida = $_POST['IdaYvueltaU'];
            $add = "UPDATE `boleto` SET `NombreBoleto`='$nombre',`Precio`='$precio',`TipoboletoID`='$tipo',`HorarioID`='$horario',`CantidadPersonas`='$cantidad',`IdaYvuelta`='$ida' WHERE BoletoID = $id";

            if(Query($add)){
                echo "
                <script>
                    Swal.fire({
                        title: '¡Boleto modificado correctamente!',
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
            if(isset($_POST['updateEmpresa'])){
                $id = $_POST['id'];
                $nombre = $_POST['NombreU'];

                $add = "UPDATE `empresa` SET `Nombre`='$nombre' WHERE `EmpresaID` = $id";
    
                if(Query($add)){
                    echo "
                    <script>
                        Swal.fire({
                            title: '¡Boleto modificado correctamente!',
                            icon: 'success',
                            confirmButtonText: 'Aceptar'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                
                                window.location.href = 'empresa.php';
                            }
                        });
                    </script>";
                }
            }
            else{
                if(isset($_POST['updateHorario'])){
                    $id = $_POST['id'];
                    $empresa = $_POST['EmpresaU'];
                    $horario = $_POST['HorarioU'];
                    
                    $add = "UPDATE `horario` SET `Horario`='$horario',`EmpresaID`='$empresa' WHERE HorarioID = $id";
        
                    if(Query($add)){
                        echo "
                        <script>
                            Swal.fire({
                                title: '¡Boleto modificado correctamente!',
                                icon: 'success',
                                confirmButtonText: 'Aceptar'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    
                                    window.location.href = 'horario.php';
                                }
                            });
                        </script>";
                    }
                }
                else{
                    if(isset($_POST['updateLugar'])){
                        
                        $id = $_POST['id'];
                        $nombre = $_POST['NombreU'];
                        $localidad = $_POST['LocalidadII'];
                        $bolet  = $_POST['BoletoU'];
    
                        $add = "UPDATE `destino` SET `Nombre`='$nombre',`LocalidadID`='$localidad',`BoletoID`='$bolet' WHERE DestinoID = $id";

                        if(Query($add)){
                            echo "
                            <script>
                                Swal.fire({
                                    title: '¡Boleto modificado correctamente! ',
                                    icon: 'success',
                                    confirmButtonText: 'Aceptar'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        
                                        window.location.href = 'lugar_destino.php';
                                    }
                                });
                            </script>";
                        }
        
                    }
                    else{
                        if(isset($_POST['AnadirTipo'])){
                            $id = $_POST['id'];
                            $nombre = $_POST['Tipo'];
        
                            $add = "UPDATE `tipoboleto` SET `Tipo`='$nombre' WHERE TipoBoletoID = $id";
                
                            if(Query($add)){
                                echo "
                                <script>
                                    Swal.fire({
                                        title: '¡Tipo de boleto creado correctamente!',
                                        icon: 'success',
                                        confirmButtonText: 'Aceptar'
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            
                                            window.location.href = 'tipo_boleto.php';
                                        }
                                    });
                                </script>";
                            }
        

        
                        }
                    }
                }
            }
        }
        
    ?>
</body>
</html>
