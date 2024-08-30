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

            $nombre = $_POST['Nombre'];
            $tipo = $_POST['Tipo'];
            $horario = $_POST['Horario'];
            $precio = $_POST['Precio'];
            $cantidad = $_POST['Cantidad'];
            $ida = $_POST['IdaYvuelta'];

            $add = "INSERT INTO `boleto`(`NombreBoleto`, `Precio`, `TipoboletoID`, `HorarioID`, `CantidadPersonas`, `IdaYvuelta`) 
            VALUES ('$nombre','$precio','$tipo','$horario', '$cantidad','$ida')";

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
            if(isset($_POST['AnadirEmpresa'])){
                $nombre = $_POST['Nombre'];
    
                $add = "INSERT INTO `empresa`(`Nombre`) VALUES ('$nombre')";
    
                if(Query($add)){
                    echo "
                    <script>
                        Swal.fire({
                            title: 'Empresa creada correctamente!',
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
                    $empresa = $_POST['Empresa'];
                    $horario = $_POST['Horario'];
                    
                    $add = "INSERT INTO `horario`(`Horario`, `EmpresaID`) VALUES ('$horario','$empresa')";
        
                    if(Query($add)){
                        echo "
                        <script>
                            Swal.fire({
                                title: 'Horario creado correctamente!',
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
                        $nombre = $_POST['Nombre'];
                        $localidad = $_POST['Localidad'];
                        $bolet  = $_POST['Boleto'];
    
                        $add = "INSERT INTO `destino`( `Nombre`, `LocalidadID`, `BoletoID`) VALUES ('$nombre','$localidad','$bolet')";
            
                        if(Query($add)){
                            echo "
                            <script>
                                Swal.fire({
                                    title: '¡Lugar creado correctamente!',
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

                            $nombre = $_POST['Tipo'];
        
                            $add = "INSERT INTO `tipoboleto`(`Tipo`) VALUES ('$nombre')";
                
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

