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
            $tipo = $_POST['TipoU'];
            $horario = $_POST['HorarioU'];
            $precio = $_POST['PrecioU'];
            $cantidad = $_POST['CantidadU'];
            $ida = $_POST['IdaYvueltaU'];
            $empresa = $_POST['EmpresaU'];
            $add = "UPDATE `boleto` SET `EmpresaID`='$empresa',`Precio`='$precio',`TipoboletoID`='$tipo',`HorarioID`='$horario',`CantidadPersonas`='$cantidad',`IdaYvuelta`='$ida' WHERE BoletoID = $id";

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

                // Array de nombres de columnas de la base de datos correspondientes a las imágenes
                $columnasImagenes = [
                    'Img1U' => 'ImagenI',       // 'Img1U' es el campo del formulario y 'ImagenI' es la columna en la base de datos
                    'Img2U' => 'ImagenII',
                    'Img3U' => 'ImagenIII',
                    'ImgPU' => 'ImagenPrincipal',
                    'ImgIU' => 'IconoEmpresa'
                ];

                // Bandera para verificar si al menos una imagen fue cargada
                $a = 0;

                // Inicializar un array para almacenar las ubicaciones de las imágenes
                $ubicaciones = [];

                // Procesamos cada imagen según el array $columnasImagenes
                foreach ($columnasImagenes as $input => $columna) {
                    if (isset($_FILES[$input]) && $_FILES[$input]['error'] === UPLOAD_ERR_OK) {

                        // Obtiene la información del archivo cargado
                        $archivo = $_FILES[$input];
                        $archivoTmp = $archivo['tmp_name'];
                        $nombreArchivo = basename($archivo['name']);
                        $rutaDestino = $directorioDestino . $nombreArchivo;

                        // Mueve el archivo a la carpeta de destino
                        if (move_uploaded_file($archivoTmp, $rutaDestino)) {
                            // Asigna la ubicación del archivo cargado para su posterior actualización en la base de datos
                            $ubicaciones[$columna] = $rutaDestino; // Guarda la ruta para la imagen cargada
                            $a++; // Incrementa la bandera que indica que al menos una imagen fue cargada
                        } else {
                            // Si no se pudo mover el archivo, muestra un mensaje de error
                            echo "<script>
                            Swal.fire({
                                title: '¡Oops...!',
                                text: 'No se pudo añadir la imagen: $input',
                                icon: 'error',
                                confirmButtonText: 'Aceptar'
                            }).then((result) => {
                                    if (result.isConfirmed) {
                                        history.go(-1);
                                    }
                                });
                            </script>";
                            exit; // Detener el script si hubo un error en la carga
                        }

                    } else {
                        // Si el archivo no fue subido, simplemente omite este paso y pasa al siguiente archivo
                        $ubicaciones[$columna] = null; // No hay imagen para este campo
                    }
                }

                // Independientemente de si se cargaron imágenes o no, siempre actualizamos el nombre
                $updateQuery = "UPDATE `empresa` SET `Nombre` = '$nombre'";

                // Añadir las ubicaciones de las imágenes si fueron cargadas
                foreach ($ubicaciones as $columna => $ubicacion) {
                    // Solo actualizamos el campo si se ha cargado una imagen
                    if ($ubicacion) {
                        $updateQuery .= ", `$columna` = '$ubicacion'";
                    }
                }

                // Agregar condición para la empresa con el ID específico
                $updateQuery .= " WHERE `EmpresaID` = $id";

                if(Query($updateQuery)){
                    echo "
                        <script>
                            Swal.fire({
                                title: 'Empresa modificada correctamente!',
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
                    $horario = $_POST['HorarioU'];
                    $dia = $_POST['dia'];
                    $add = "UPDATE `horario` SET `Horario`='$horario',`Dia` ='$dia'  WHERE HorarioID = $id";
        
                    if(Query($add)){
                        echo "
                        <script>
                            Swal.fire({
                                title: 'Horario modificado correctamente!',
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
                                    title: '¡Lugar modificado correctamente! ',
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
