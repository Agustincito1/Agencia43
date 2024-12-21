<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../libraries/sweet/node_modules/sweetalert2/dist/sweetalert2.min.css">
    <script src="../libraries/sweet/node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
    <link rel="shortcut icon" href="imgs/icono.ico" type="image/x-icon">
    <title>Iniciar sesion</title>
</head>
<body>
    <?php
        if(isset($_POST)){
            
            include "../libraries/functions.php";
            include "../libraries/conexion.php";
            
            $contrasena = $_POST['contrasena'];
            $usuario = $_POST['usuario'];
            $usuario = mysqli_real_escape_string($conexion, $usuario);
            $contrasena = mysqli_real_escape_string($conexion, $contrasena);
            if($validar = QueryAndGetData("SELECT AdminID ,Usuario, Contraseña FROM `admin` WHERE Contraseña = '$contrasena' AND Usuario = '$usuario'")){
                //consulta completa
                if(mysqli_num_rows($validar)>0){
                    //existe
                    if($datos = mysqli_fetch_assoc($validar)){
                        session_start();
                        $data = $datos['AdminID'];
                        $_SESSION["ID"] = $data;
                                echo "
                            <script>
                                Swal.fire({
                                    title: '¡Inicio de sesion exitoso!',
                                    icon: 'success',
                                    confirmButtonText: 'Aceptar',
                                    allowOutsideClick: false
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        
                                        window.location.href = 'menu.php';
                                    }
                                });
                            </script>";
                    }

                }else{
                    echo "
                    <script>
                        Swal.fire({
                            title: '¡Oops...!',
                            text: 'No existe este usuario admin',
                            icon: 'error',
                            confirmButtonText: 'Aceptar',
                            allowOutsideClick: false
                        }).then((result) => {
                            if (result.isConfirmed) {
                                
                                history.go(-1);
                            }
                        });
                    </script>";
                }

            }else{
                echo "
                <script>
                    Swal.fire({
                        title: '¡Oops...!',
                        text: 'No existe este usuario admin',
                        icon: 'error',
                        confirmButtonText: 'Aceptar',
                        allowOutsideClick: false
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




