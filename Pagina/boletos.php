<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../libraries/sweet/node_modules/sweetalert2/dist/sweetalert2.min.css">
    <script src="../libraries/sweet/node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
    <link rel="shortcut icon" href="imgs/icono.ico" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Boletos</title>
</head>
<body>
    <header id="header">
                <section class="header-section">
                    <article class="h-s-article">
                        <div class="h-s-a__div">
                            <img class="h-s-a-d__img"src="imgs/iconoEmpresa.png" alt="" />
                            
                        </div>
                        <div class="h-s-a__div">
                            <h1 class="h-s-a-d__h1">AGENCIAS 42 y 43</h1>
                            <h3 class="h-s-a-d__h3">Posadas Misiones</h3>
                        </div>
                    </article>
                    <article >
                        <nav class="h-s-a__nav">
                            <li class="h-s-a-n-li"><a class="h-s-a-n-l__a" href="calendario.php">Calendario</a></li>
                            <li class="h-s-a-n-li"><a class="h-s-a-n-l__a" href="">Nosotros</a></li>
                            <li class="h-s-a-n-li"><a class="h-s-a-n-l__a" href="index.php#Empresa">Empresa</a></li>
                            <li class="h-s-a-n-li"><a class="h-s-a-n-l__a" href="index.php">Viajar</a></li>
                        </nav>
                    </article>
                </section>
            </header>





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


    <footer id="footer">
                <section class="footer__section">
                    <article class="f-s__article">
                        <div class="f-s-a__div">
                            
                            <img class="f-s-a-d__img" src="imgs/iconoEmpresa.png" alt="" />
                            
                        </div>
                        <div class="f-s-a__div">
                            <h1 class="f-s-a-d__h1">AGENCIAS 42 y 43</h1>
                            <h3 class="f-s-a-d__h3">Posadas Misiones</h3>
                        </div>
                    </article>
                    <nav class="f-s__nav">
                        <li><a class="f-s-n-l__a" href="">Principal</a></li>
                        <li><a class="f-s-n-l__a" href="">Calendario</a></li>
                        <li><a class="f-s-n-l__a" href="">Nosotros</a></li>
                        <li><a class="f-s-n-l__a" href="">Contactanos</a></li>
                    </nav>
                </section>
                <address class="footer__address"><a class="f_a__a" href="agustinlazari594@gmail.com">@agustinlazari594@gmail.com</a></address>
        </footer>
</body>
</html>

