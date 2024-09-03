<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../libraries/sweet/node_modules/sweetalert2/dist/sweetalert2.min.css">
    <script src="../libraries/sweet/node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Boletos</title>
</head>
<body>

    <?php 
        include "../libraries/functions.php";

        if(isset($_POST['buscar'])){

            if(isset($_POST['option2'])){
                $option = $_POST['option2'];
            }
            else{
                if(isset($_POST['option1'])){
                    $option = $_POST['option1'];
                }
                echo "
                <script>
                    Swal.fire({
                        title: '¡Debes elegir una opción!',
                        icon: 'error',
                        confirmButtonText: 'Aceptar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            
                            history.go(-1);
                        }
                    });
                </script>";
            }

            $tipo = $_POST['tipo'];

            
            if(isset($_POST['destino'])){
                $destino = $_POST['destino'];
            }
            else{
                echo "
                <script>
                    Swal.fire({
                        title: '¡Debes elegir un destino!',
                        icon: 'error',
                        confirmButtonText: 'Aceptar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            
                            history.go(-1);
                        }
                    });
                </script>";
            }

            if(isset($_POST['fecha'])){
                $fecha = $_POST['fecha'];
            }
            else{
                echo "
                <script>
                    Swal.fire({
                        title: '¡Debes elegir una fecha!',
                        icon: 'error',
                        confirmButtonText: 'Aceptar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            
                            history.go(-1);
                        }
                    });
                </script>";
            }

            if(isset($_POST['cantidad'])){
                $pasajeros = $_POST['cantidad'];
            }
            else{
                echo "
                <script>
                    Swal.fire({
                        title: '¡Debes elegir una cantidad de personas!',
                        icon: 'error',
                        confirmButtonText: 'Aceptar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            
                            history.go(-1);
                        }
                    });
                </script>";
            }

            $query = "SELECT	`destino`.`Nombre`, 
            `destino`.`LocalidadID`, 
            `destino`.`BoletoID` 
            FROM `destino`, `horario`, `boleto` 
            WHERE  `destino`.`Nombre` = '$destino' AND `horario`.`Horario` = $fecha AND `boleto`.`TipoboletoID` = $tipo AND `boleto`.`CantidadPersonas` = $pasajeros AND`boleto`.`IdaYvuelta` = '$option';";
            if($data = QueryAndGetData($query)){

                    if(mysqli_num_rows($data)>1){
                        while($data = mysqli_fetch_assoc($data)){
                            echo $data['Nombre'];
                        }
                    }
                    else{
                        $data = mysqli_fetch_assoc($data);
                        echo $data['Nombre'];
                    }
                }
                else{
                    echo "
                        <script>
                            Swal.fire({
                                title: '¡No se encontro el boleto!',
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
                        title: '¡No se encontro el boleto!',
                        icon: 'error',
                        confirmButtonText: 'Aceptar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            
                            hostory.go(-1);
                        }
                    });
                </script>";
        }

    ?>
</body>
</html>

