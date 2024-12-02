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

                $directorioDestino = '../libraries/imgsPag/';

                $id = $_POST['id'];
                $nombre = $_POST['Nombre'];
                $imagen1 = $_FILES['Img1U'];
                $imagen2 = $_FILES['Img2U'];
                $imagen3= $_FILES['Img3U'];
                $imagen4= $_FILES['ImgPU'];
                $imagen5= $_FILES['ImgIU'];
                // Array de las imágenes a manejar
                $imagenes = ['Img1U', 'Img2U', 'Img3U', 'ImgPU','ImgIU'];

                foreach ($imagenes as $imagen) {

                    if (isset($_FILES[$imagen])) {
                        $archivo = $_FILES[$imagen];

                        // Verifica si hubo un error al cargar el archivo
                        if ($archivo['error'] === UPLOAD_ERR_OK) {
                            // Obtiene la ubicación temporal del archivo
                            $archivoTmp = $archivo['tmp_name'];

                            // Genera un nombre único para evitar sobrescribir archivos
                            $nombreArchivo = basename($archivo['name']);
                            $rutaDestino = $directorioDestino . $nombreArchivo;

                            

                            // Mueve el archivo a la carpeta de destino
                            if (move_uploaded_file($archivoTmp, $rutaDestino)) {
                                $a = 1;

                            } else {
                                echo "<script>
                                Swal.fire({
                                    title: '¡Oops...!',
                                    text: 'No se pudo añadir la imagen',
                                    icon: 'error',
                                    confirmButtonText: 'Aceptar'
                                }).then((result) => {
                                        if (result.isConfirmed) {
                                            
                                            history.go(-1);
                                        }
                                    });
                                </script>";
                            }

                        } else {
                            echo "<script>
                            Swal.fire({
                                title: '¡Oops...!',
                                text: 'No se pudo añadir la imagen',
                                icon: 'error',
                                confirmButtonText: 'Aceptar'
                            }).then((result) => {
                                    if (result.isConfirmed) {
                                        
                                        history.go(-1);
                                    }
                                });
                            </script>";;
                        }

                    } else {
                        echo "<script>
                        Swal.fire({
                            title: '¡Oops...!',
                            text: 'No se pudo añadir la imagen',
                            icon: 'error',
                            confirmButtonText: 'Aceptar'
                        }).then((result) => {
                                if (result.isConfirmed) {
                                    
                                    history.go(-1);
                                }
                            });
                        </script>";;
                    }
                }

                if($a>0){
                    $archivoTmp = $imagen1['tmp_name'];
                    $nombreArchivo = basename($imagen1['name']); 
                    $rutaDestino = $directorioDestino . $nombreArchivo;
                    $ubicacion1 = $rutaDestino;

                    $archivoTmp = $imagen2['tmp_name'];
                    $nombreArchivo = basename($imagen2['name']); 
                    $rutaDestino = $directorioDestino . $nombreArchivo;
                    $ubicacion2 = $rutaDestino;

                    $archivoTmp = $imagen3['tmp_name'];
                    $nombreArchivo = basename($imagen3['name']); 
                    $rutaDestino = $directorioDestino . $nombreArchivo;
                    $ubicacion3 = $rutaDestino;

                    $archivoTmp = $imagen4['tmp_name'];
                    $nombreArchivo = basename($imagen4['name']); 
                    $rutaDestino = $directorioDestino . $nombreArchivo;
                    $ubicacion4 = $rutaDestino;

                    $archivoTmp = $imagen5['tmp_name'];
                    $nombreArchivo = basename($imagen5['name']); 
                    $rutaDestino = $directorioDestino . $nombreArchivo;
                    $ubicacion5 = $rutaDestino;

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
