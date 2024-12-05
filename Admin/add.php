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
        // Incluir libreria
        include "querys.php";

        // conseguir los datos en metodo post y verificarlos
        if(isset($_POST['AnadirBoleto'])){
            if(isset($_POST['Tipo'])){
                if(isset($_POST['Horario'])){
                    if(isset($_POST['Cantidad'])){
                        if(isset($_POST['IdaYvuelta'])){

                            $nombre = $_POST['Nombre'];
                            $tipo = $_POST['Tipo'];
                            $horario = $_POST['Horario'];
                            $precio = $_POST['Precio'];
                            $cantidad = $_POST['Cantidad'];
                            $ida = $_POST['IdaYvuelta'];
                            // consulta query
                            $add = "INSERT INTO `boleto`(`NombreBoleto`, `Precio`, `TipoboletoID`, `HorarioID`, `CantidadPersonas`, `IdaYvuelta`) 
                            VALUES ('$nombre','$precio','$tipo','$horario', '$cantidad','$ida')";

                            // desicion si el boleto es creado correctamente
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
                            echo "
                            <script>
                                Swal.fire({
                                    title: '¡Oops...!',
                                    text: 'Seleccione la ida y vuelta',
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
                    else{
                        echo "
                        <script>
                            Swal.fire({
                                title: '¡Oops...!',
                                text: 'Seleccione la cantidad',
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
                else{
                    echo "
                    <script>
                        Swal.fire({
                            title: '¡Oops...!',
                            text: 'Seleccione el horario',
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
            else{
                echo "
                <script>
                    Swal.fire({
                        title: '¡Oops...!',
                        text: 'Seleccione el tipo de boleto',
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
        else{
            // lo mismo pero con los datos de la empresa
            if(isset($_POST['AnadirEmpresa'])){

                $directorioDestino = '../libraries/imgsPag/';

                $nombre = $_POST['Nombre'];
                $imagen1 = $_FILES['Img1'];
                $imagen2 = $_FILES['Img2'];
                $imagen3= $_FILES['Img3'];
                $imagen4= $_FILES['ImgP'];
                $imagen5= $_FILES['ImgI'];
                // Array de las imágenes a manejar
                $imagenes = ['Img1', 'Img2', 'Img3', 'ImgP','ImgI'];

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

                    $add = "INSERT INTO `empresa`(`Nombre`, `ImagenI`, `ImagenII`, `ImagenIII`, `ImagenPrincipal`,`IconoEmpresa`) VALUES ('$nombre', '$ubicacion1', '$ubicacion2', '$ubicacion3', '$ubicacion4', '$ubicacion5')";
                    
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
                    echo "
                    <script>
                        Swal.fire({
                            title: '¡Oops...!',
                            text: 'Seleccione el tipo de boleto',
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
            else{
                // lo mismo pero los horarios
                if(isset($_POST['AnadirHorario'])){

                    if(isset($_POST['Empresa'])){
                        if(isset($_POST['dia'])){
                            $empresa = $_POST['Empresa'];
                            $horario = $_POST['Horario'];
                            $dia = $_POST['dia'];
                            $add = "INSERT INTO `horario`(`Horario`, `EmpresaID`, `Dia`) VALUES ('$horario','$empresa','$dia' )";
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
                            echo "
                            <script>
                                Swal.fire({
                                    title: '¡Oops...!',
                                    text: 'Seleccione el día',
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
                    else{
                        echo "
                        <script>
                            Swal.fire({
                                title: '¡Oops...!',
                                text: 'Seleccione la empresa',
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
                else{
                    // lo mismo pero el lugar
                    if(isset($_POST['AnadirLugar'])){
                        if(isset($_POST['Localidad'])){
                            if(isset($_POST['Boleto'])){
                                if(isset($_POST['Provincia'])){
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
                                    echo "
                                    <script>
                                        Swal.fire({
                                            title: '¡Oops...!',
                                            text: 'Seleccione la provincia',
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
                            else{
                                echo "
                                <script>
                                    Swal.fire({
                                        title: '¡Oops...!',
                                        text: 'Seleccione el boleto',
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
                        else{
                            echo "
                            <script>
                                Swal.fire({
                                    title: '¡Oops...!',
                                    text: 'Seleccione la localidad',
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
                    else{
                        // lo mismo pero el tipo 
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

