
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
                            <li class="h-s-a-n-li"><a class="h-s-a-n-l__a" href="index.php#calendario">Calendario</a></li>
                            <li class="h-s-a-n-li"><a class="h-s-a-n-l__a" href="index.php#Nosotros">Nosotros</a></li>
                            <li class="h-s-a-n-li"><a class="h-s-a-n-l__a" href="index.php#Empresa">Empresa</a></li>
                            <li class="h-s-a-n-li"><a class="h-s-a-n-l__a" href="index.php#viaje">Viajar</a></li>
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

                    if(isset($_POST['tipo'])){
                        $destino = $_POST['destino'];
                        if(empty($destino)){
    
                            $var = 11;
                        }
                        else{
                            $option = $_POST['option'];
                            $tipo = $_POST['tipo'];
                            
                            $parts = explode(",", $destino); // Separamos la cadena por la coma
                            $Provincia = trim($parts[0]);  // Primera parte antes de la coma
                            $Localidad = trim($parts[1]);

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
                                        localidad.Localidad as Nombre,
                                        boleto.Precio as Precio,
                                        tipoboleto.tipo as Tipo,
                                        boleto.cantidadPersonas as Cantidad,
                                        boleto.idaYvuelta as Ida,
                                        localidad.Localidad as Destino,
                                        horario.Horario as Horario, 
                                        empresa.Nombre as NombreEmpresa,
                                        empresa.IconoEmpresa,
                                        provincia.Provincia
                                    FROM 
                                        boleto
                                    INNER JOIN 
                                        tipoboleto ON boleto.TipoBoletoID = tipoboleto.TipoBoletoID  
                                    INNER JOIN 
                                        horario ON boleto.HorarioID = horario.HorarioID AND horario.Dia = '$day'
                                    INNER JOIN 
                                        empresa ON empresa.EmpresaID = boleto.EmpresaID
                                    INNER JOIN 
                                        localidad ON boleto.LocalidadID = localidad.LocalidadID
                                    INNER JOIN 
                                        provincia ON localidad.ProvinciaID = provincia.ProvinciaID
                                    WHERE 
                                        localidad.Localidad = '$Localidad'
                                        AND provincia.Provincia = '$Provincia'
                                        AND boleto.TipoBoletoID = $tipo
                                        AND boleto.CantidadPersonas = $pasajeros
                                        AND boleto.IdaYvuelta = '$option';
                                    ";
                                   
                                    if($data = QueryAndGetData($query)){
                                        if(mysqli_num_rows($data)>0){
                                            
                                        }
                                        else{
                                            $var = 0;
                                        }
                                        
                                    }
                                    else{
                                        $var = 0;
                                        
                                    }
                                }
                                else{
                                    $var = 9;
                                }
                            }
                            else{
                                $var = 10;
                            }
                        }
                    }
                    else{
                        $var = 15;
                    }
                  
                }
                else{
                    $var = 12;
                }

            }

            

            if($var === 1){
                if(mysqli_num_rows($data)>1){
                    $lista = 2;
                }
                else{
                    if(mysqli_num_rows($data) === 1){
                        $lista = 1;
                    }
                }
            
            }
            else{
                if($var === 0){
                    $lista = 0;
                }
                else{
                    $lista = 0;
                }

            }
          
        ?>





        <section class="mB__section">


            <?php
                
                if($lista>1){
                    
                    echo '<article  class="mB-s__a">
                    <div class="mB-s-a__div">
                        <h1 class="m-s-a-f__h1">AGENCIAS 42 y 43</h1>
                        <h3 class="m-s-a-f__h3">Posadas Misiones</h3>
                    </div>
                    <div class="mB-s-a__div">';
                    while($data = mysqli_fetch_assoc($data)){
                        echo '<div class="boletocontainer">';
                        echo '<img class="boletocontainer__imgempresa" src="'.$data['IconoEmpresa'].'">';
                        echo '<p class="boletocontainer__inicio">Desde Terminal de Posadas Misiones hacia '.$data['Destino'].'</p>';
                        echo '<p class="boletocontainer__precio">$ARS'.$data['Precio'].'</p>';
                        echo '<p class="boletocontainer__tipob">'.$data['Tipo'].'</p>';
                        echo '<p class="boletocontainer__cantidadp">Cantidad de pasajeros '.$data['Cantidad'].'</p>';
                        echo '<p class="boletocontainer__idayvuelta">'.$data['Ida'].'</p>';
                        echo '<p class="boletocontainer__empresa">Empresa '.$data['NombreEmpresa'].'</p>';
                        echo "</div>";
                    }
                    echo "</div>";
                    echo "</article>";
                }
                else{
                        
                    if($lista === 1){

                        $data = mysqli_fetch_assoc($data);

                        $iconoE = $data['IconoEmpresa']; 

                        $idaovuelta = $data['Ida'];
                        if( $idaovuelta === "IdaYvuelta"){
                            $tipo = "Ida y Vuelta";
                        }
                        else{
                            $tipo = "Ida";
                        }

                        echo '<article  class="mB-s__a">
                        <div class="mB-s-a__div">
                        <h1 class="m-s-a-f__h1">AGENCIAS 42 y 43</h1>
                        <h3 class="m-s-a-f__h3">Posadas Misiones</h3>
                        </div>
                        <div class="mB-s-a__div">';
                        echo '<div class="boletocontainer">';

                        echo '<img class="boletocontainer__imgempresa" src="'.$iconoE.'">';
                        echo '<p class="boletocontainer__inicio">Desde Terminal hacia <span class="amarillo">'.$data['Destino'].'</span></p>';
                        echo '<p class="boletocontainer__precio"><span class="amarillo">Precio:</span> $ARS'.$data['Precio'].'</p>';
                        echo '<p class="boletocontainer__tipob"><span class="amarillo">Tipo de viaje:</span> '.$data['Tipo'].'</p>';
                        echo '<p class="boletocontainer__cantidadp"><span class="amarillo">Cantidad de pasajeros:</span> '.$data['Cantidad'].'</p>';
                        echo '<p class="boletocontainer__idayvuelta">'.$tipo.'</p>';
                        echo '<p class="boletocontainer__empresa">Empresa '.$data['NombreEmpresa'].'</p>';
                        echo "</div>";
                        echo "</div>";
                        echo "</article>";
                    }
                    

                }
                
            ?>
        </section>
    </main>

    <!-- footer -->
    <footer id="footer">
            <div class="footer">
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
            </div>
        </footer>
</body>
<script src="../libraries/sweet/node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
<?php


    
    if($var === 0){
        echo "<script>
            Swal.fire({
                    title: '¡No se encontro el boleto!',
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
    else{
        
        if($var === 10){
            echo "
                <script>
                    Swal.fire({
                        title: '¡Debes elegir una fecha!',
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
        else{
            if($var === 11){
                echo "
                    <script>
                        Swal.fire({
                            title: '¡Debes elegir un destino!',
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
            else{
                if($var === 12){
                    echo "
                        <script>
                            Swal.fire({
                                title: '¡Debes elegir una opcion de viaje!',
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
                else{
                    if($var === 9){
                        echo "
                            <script>
                                Swal.fire({
                                    title: '¡Debes elegir una cantidad de personas!',
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
                    else{
                        if($var === 15){
                            echo "
                                <script>
                                    Swal.fire({
                                        title: '¡Debes elegir un tipo de boleto!',
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
                }
            }
        }
    }

?>

</html>

