<?php 
include "../libraries/functions.php";
    include "querys.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="shortcut icon" href="imgs/icono.ico" type="image/x-icon">
    <title>Agencias 42-43</title>
</head>
    <body id="bodyB">
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
                        <li class="h-s-a-n-li"><a class="h-s-a-n-l__a" href="">Calendario</a></li>
                        <li class="h-s-a-n-li"><a class="h-s-a-n-l__a" href="">Nosotros</a></li>
                        <li class="h-s-a-n-li"><a class="h-s-a-n-l__a" href="">Empresa</a></li>
                        <li class="h-s-a-n-li"><a class="h-s-a-n-l__a" href="">Viajar</a></li>
                    </nav>
                </article>
            </section>
        </header>

        <main id="mainB">
            <section class="main__section">
                <article class="m-s__article-formcontent">
                    <form class="m-s-a_form" action="boletos.php" method="POST">
                        <div>
                            <h1 class="m-s-a-f__h1">AGENCIAS 42 y 43</h1>
                            <h3 class="m-s-a-f__h3">Posadas Misiones</h3>
                        </div>
                        
                        <p class="m-s-a-f__p">Busca el lugar donde quieras ir</p>
                        <div class="m-s-a-f__div">
                            <label for="option2" class="m-s-a-f-d__item">
                                <input class="m-s-a-f-d__inputOption" type="radio" name="option2" value="Ida" id=""><p>Solo ida</p>
                            </label>
                            
                            <label for="option1" class="m-s-a-f-d__item">
                                <input " type="radio" name="option1"  value="IdaYvuelta" id=""><p>Ida y vuelta</p>
                            </label>
                            
                            <label  for="tipo" class="m-s-a-f-d__item"><p>Tipo de boleto</p>
                                <select name="tipo" id="">
                                    <?php
                                        options($select_tipoboleto);
                                    ?>
                                </select>
                            </label>

                            <label for="inicio" class="m-s-a-f-d__item"><p>Lugar de partida</p>
                                <div class="m-s-a-f-d-it__Div">
                                    Deste la Terminal de Posadas Misiones
                                </div>
                            </label>

                            <label for="destino" class="m-s-a-f-d__item"><p>Lugar de destino</p>
                                <input type="text" name="destino" id="filtro">
                                <div id="opciones">
                                    <!-- Las opciones se llenarán con JavaScript -->
                                </div>
                            </label>
                            
                            <label for="fecha" class="m-s-a-f-d__item"><p>fecha de viaje</p>
                                <input  type="date" id="" name="fecha" required>
                            </label>
                            
                            <label for="cantidad" class="m-s-a-f-d__item"><p>Cant. Pasajeros</p>
                                <select name="cantidad">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                </select>
                            </label>
                            <input type="submit" id="" name="buscar" class="m-s-a-f-d__item">
                        </div>
                    </form>
                </article>

                <article class="m-s__article-comollegar">
                    <h2>¿Como llegar?</h2>
                    <p><span>Ubicacion:</span> Avenida Quaranta y Avenida Santa Catalina, Ciudad de Posadas.</p>
                    <div>
                        <img src="" alt="">
                        <img src="" alt="">
                        <img src="" alt="">
                    </div>
                    <p><span>Telefono:</span> 3754 5433435</p>
                </article>
                <article class="m-s__article-empresas">
                    <h2>Empresas que vendemos</h2>
                    <div>
                        <!-- php -->
                        <?php
                            imagen_empresas($empresa);
                        ?>
                        
                    </div>
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
                    <li><a class="f-s-n-l__a" href="">Principal</a></li>
                    <li><a class="f-s-n-l__a" href="">Calendario</a></li>
                    <li><a class="f-s-n-l__a" href="">Nosotros</a></li>
                    <li><a class="f-s-n-l__a" href="">Contactanos</a></li>
                </nav>
            </section>
            <address class="footer__address"><a class="f_a__a" href="agustinlazari594@gmail.com">@agustinlazari594@gmail.com</a></address>
        </footer>
    </body>
    <script src="assets/js/filtro.js"></script>
</html>