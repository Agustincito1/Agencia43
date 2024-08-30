<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../libraries/sweet/node_modules/sweetalert2/dist/sweetalert2.min.css">
    <script src="../libraries/sweet/node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
    <title>Actualizar Dato</title>
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
            if(isset($_POST['AnadirEmpresa'])){
                $id = $_POST['id'];
                $nombre = $_POST['Nombre'];

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
                if(isset($_POST['AnadirHorario'])){
                    $id = $_POST['id'];
                    $empresa = $_POST['Empresa'];
                    $horario = $_POST['Horario'];
                    
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
                    if(isset($_POST['AnadirLugar'])){
                        $id = $_POST['id'];
                        $nombre = $_POST['Nombre'];
                        $localidad = $_POST['Localidad'];
                        $bolet  = $_POST['Boleto'];
    
                        $add = "UPDATE `destino` SET `Nombre`='$nombre',`LocalidadID`='$localidad',`BoletoID`='$bolet' WHERE DestinoID = $bolet";
            
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
