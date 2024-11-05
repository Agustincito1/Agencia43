<?php 
    header('Content-Type: text/html; charset=utf-8');
    header('X-Content-Type-Options: nosniff');
    include "querys.php";
?>

<!DOCTYPE html>
<html lang="ES">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="imgs/icono.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <script src="../libraries/sheetjs/xlsx/xlsx.js"></script>
    <title>Calendario</title>
    
</head>
<body id="bodyC">
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
    <main id="mainC">
        <div id="calendar-container">
            <!-- El contenido del calendario se cargará aquí -->
        </div>

        <div id="ln">

        </div>
        
        <div id="dataonclick">

        </div>
        
            
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
    <script type="text/javascript" src="assets/js/calendario.js"></script>
    <script type="text/javascript" src="assets/js/mostrar.js"></script>
    <script type="text/javascript" src="../libraries/node_modules/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/links.js"></script>
   
    <script>
        document.documentElement.style.scrollBehavior = 'smooth';
    </script>
</html>