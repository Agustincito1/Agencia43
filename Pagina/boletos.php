
<!DOCTYPE html>
<html lang="ES">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../libraries/sweet/node_modules/sweetalert2/dist/sweetalert2.min.css">
    <link rel="shortcut icon" href="imgs/icono.ico" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="canonical" href="">
    <title>Boletos</title>
</head>
<body id="bodyBo">
    <!-- header -->
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
                        <ul>
                            <li class="h-s-a-n-li"><a class="h-s-a-n-l__a" href="calendario.php">Calendario</a></li>
                            <li class="h-s-a-n-li"><a class="h-s-a-n-l__a" href="index.php#Nosotros">Nosotros</a></li>
                            <li class="h-s-a-n-li"><a class="h-s-a-n-l__a" href="index.php#Empresa">Empresa</a></li>
                            <li class="h-s-a-n-li"><a class="h-s-a-n-l__a" href="index.php">Viajar</a></li>
                        </ul>
                    </nav>
                </article>
            </section>
    </header>
    <!-- main -->
    <main id="mainBo">
        <?php 
            include "../libraries/functions.php";
            $var = 1;
            if(isset($_POST['buscar'])){

                if(isset($_POST['option'])){
                    $option = $_POST['option'];
                    $tipo = $_POST['tipo'];
                    $destino = $_POST['destino'];

                    if(empty($destino)){
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
                        $var = 0;
            
                    }
                    else{
                        if(isset($_POST['fecha'])){
                            $fecha = $_POST['fecha'];
                            if(isset($_POST['cantidad'])){
                                $pasajeros = $_POST['cantidad'];
                                function obtenerNombreDiaEnEspanol($fecha) {
                                    // Convertir la fecha a un timestamp
                                    $timestamp = strtotime($fecha);
                    
                                    // Obtener el nombre del día en inglés
                                    $nombre_dia_ingles = date('l', $timestamp);
                    
                                    // Array de días en inglés a español
                                    $dias_espaniol = array(
                                        'Sunday' => 'Domingo',
                                        'Monday' => 'Lunes',
                                        'Tuesday' => 'Martes',
                                        'Wednesday' => 'Miercoles',
                                        'Thursday' => 'Jueves',
                                        'Friday' => 'Viernes',
                                        'Saturday' => 'Sabado'
                                    );
                    
                                    // Retornar el nombre del día en español
                                    return $dias_espaniol[$nombre_dia_ingles];
                                }
            
                                $day = obtenerNombreDiaEnEspanol($fecha);
                                $query = "SELECT 
                                    boleto.NombreBoleto as Nombre,
                                    boleto.Precio as Precio,
                                    tipoboleto.tipo as Tipo,
                                    boleto.cantidadPersonas as Cantidad,
                                    boleto.idaYvuelta as Ida,
                                    destino.Nombre as Destino, 
                                    destino.BoletoID , 
                                    horario.Horario as Horario, 
                                    empresa.Nombre as NombreEmpresa
                                FROM 
                                    destino
                                INNER JOIN 
                                    boleto ON destino.BoletoID = boleto.BoletoID  
                                INNER JOIN 
                                    tipoboleto ON boleto.TipoBoletoID = tipoboleto.TipoBoletoID  
                                INNER JOIN 
                                    horario ON boleto.HorarioID = horario.HorarioID and horario.Dia = '$day'
                                INNER JOIN 
                                    empresa ON empresa.EmpresaID = horario.EmpresaID
                                WHERE 
                                    destino.Nombre = '$destino'
                                    AND boleto.TipoboletoID = $tipo
                                    AND boleto.CantidadPersonas = $pasajeros
                                    AND boleto.IdaYvuelta = '$option';";
                                if($data = QueryAndGetData($query)){
                                    
                                    // if(mysqli_num_rows($data)>1){
                                    //     while($data = mysqli_fetch_assoc($data)){
                                    //         echo $data['Horario'];
                                    //     }
                                    // }
                                    // else{
                                    //     $data = mysqli_fetch_assoc($data);
                                    //     echo $data['Horario'];
                                    // }
                                    
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
                                        $var = 0;
                                    
                                }
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
                                $var = 0;
                            }
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
                            $var = 0;
                        }
                    }
                }
                else{

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
                        $var = 0;

                }
                
                
            }

        ?>

        <section class="mB__section">
            <?php
                if($var === 1){
                    if(mysqli_num_rows($data)>1){
                        echo '<article  class="mB-s__a">
                        <h3>¡¡Acá tenes los boletos!!</h3>
                        <div class="mB-s-a__div">
                            <h1 class="m-s-a-f__h1">AGENCIAS 42 y 43</h1>
                            <h3 class="m-s-a-f__h3">Posadas Misiones</h3>
                        </div>
                        <div class="mB-s-a__div">';
                        while($data = mysqli_fetch_assoc($data)){
                            echo '<div class="boletocontainer">';
                            echo '<p class="boletocontainer__nombre">'.$data['Nombre'].'</p>';
                            echo '<p class="boletocontainer__inicio"> Terminal de Posadas Misiones</p>';
                            echo '<p class="boletocontainer__precio">'.$data['Precio'].'</p>';
                            echo '<p class="boletocontainer__tipob">'.$data['Tipo'].'</p>';
                            echo '<p class="boletocontainer__cantidadp">'.$data['Cantidad'].'</p>';
                            echo '<p class="boletocontainer__idayvuelta">'.$data['Ida'].'</p>';
                            echo '<p class="boletocontainer__destino">'.$data['Destino'].'</p>';
                            echo '<p class="boletocontainer__empresa">'.$data['NombreEmpresa'].'</p>';
                            echo "</div>";
                        }
                        echo "</div>";
                        echo "</article>";
                    }
                    else{
    
                        if(mysqli_num_rows($data)){
                            $data = mysqli_fetch_assoc($data);
                            echo '<article  class="mB-s__a">
                            <h3>¡¡Acá tenes tu boleto!!</h3>
                            <div class="mB-s-a__div">
                            <h1 class="m-s-a-f__h1">AGENCIAS 42 y 43</h1>
                            <h3 class="m-s-a-f__h3">Posadas Misiones</h3>
                            </div>
                            <div class="mB-s-a__div">';
                            echo '<div class="boletocontainer">';
                            echo '<p class="boletocontainer__nombre">'.$data['Nombre'].'</p>';
                            echo '<p class="boletocontainer__inicio"> Terminal de Posadas Misiones</p>';
                            echo '<p class="boletocontainer__precio">'.$data['Precio'].'</p>';
                            echo '<p class="boletocontainer__tipob">'.$data['Tipo'].'</p>';
                            echo '<p class="boletocontainer__cantidadp">'.$data['Cantidad'].'</p>';
                            echo '<p class="boletocontainer__idayvuelta">'.$data['Ida'].'</p>';
                            echo '<p class="boletocontainer__destino">'.$data['Destino'].'</p>';
                            echo '<p class="boletocontainer__empresa">'.$data['NombreEmpresa'].'</p>';
                            echo "</div>";
                            echo "</div>";
                            echo "</article>";
                        }
                        else{
                            echo '<article  class="mB-s__a">
                            <h3>¡¡No tienes un boleto!!</h3>
                            <div class="mB-s-a__div">
                            <h1 class="m-s-a-f__h1">AGENCIAS 42 y 43</h1>
                            <h3 class="m-s-a-f__h3">Posadas Misiones</h3>
                            </div>
                            <div class="mB-s-a__div">
    
                            <p>No hay boletos disponibles</p>
    
                            </div>';
                                
                        }
    
                    }
    
                }
            ?>
        </section>
    </main>
    <!-- footer -->
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
                        <ul>
                            <li><a class="f-s-n-l__a" href="">Principal</a></li>
                            <li><a class="f-s-n-l__a" href="">Calendario</a></li>
                            <li><a class="f-s-n-l__a" href="">Nosotros</a></li>
                            <li><a class="f-s-n-l__a" href="">Contactanos</a></li>
                        </ul>
                    </nav>
                </section>
                <address class="footer__address"><a class="f_a__a" href="agustinlazari594@gmail.com">@agustinlazari594@gmail.com</a></address>
        </footer>
</body>
<script src="../libraries/sweet/node_modules/sweetalert2/dist/sweetalert2.min.js"></script>

</html>

