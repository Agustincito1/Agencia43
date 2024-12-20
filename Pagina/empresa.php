<?php
    include "../libraries/functions.php";
    if(isset($_GET['Empresa'])){
        $id = $_GET['Empresa'];

        $query = "SELECT * FROM `empresa` WHERE `EmpresaID` = `$id`";
    }
    
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="canonical" href="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="imgs/icono.ico" type="image/x-icon">
    <title><?php echo $datos['Nombre']; ?></title>
    <link rel="stylesheet" href="assets/css/style.css">
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
                        <ul>
                            <li class="h-s-a-n-li"><a class="h-s-a-n-l__a" href="calendario.php">Calendario</a></li>
                            <li class="h-s-a-n-li"><a class="h-s-a-n-l__a" href="">Nosotros</a></li>
                            <li class="h-s-a-n-li"><a class="h-s-a-n-l__a" href="index.php#Empresa">Empresa</a></li>
                            <li class="h-s-a-n-li"><a class="h-s-a-n-l__a" href="index.php">Viajar</a></li>
                        </ul>
                    </nav>
                </article>
            </section>
        </header>



        <main>
            <section>
                <article>
                </article>
                <article>
                </article>
            </section>
        </main>
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
</html>