<?php

    include "../libraries/Query.php";


    $queryTipo = "SELECT `TipoBoletoID`, `Tipo` FROM `tipoboleto` WHERE 1";
    $queryEmpresas = "SELECT `EmpresaID`, `Nombre` FROM `empresa` WHERE 1";
    $queryBoletosLista = "";

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agencias 42-43</title>
</head>
    <body>
        <header>
            <div>
                <img src="" alt="">
                <h1>Conectando destinos, un viaje a la vez</h1>
            </div>
            <div>
                <img src="" alt="">
                <img src="" alt="">
                <img src="" alt="">
            </div>
            <nav>
                <ul>
                    <li><a href="">Empresas</a></li>
                    <li><a href="">Calendario</a></li>
                    <li><a href="">¿Como llegar?</a></li>
                    <li><a href="">Viajes</a></li>
                    <!-- <li><a href=""></a></li> -->
                </ul>
            </nav>
        </header>
        <main>
            <section>
                <article>
                    <form action="" method="">
                        <h2>AGENCIAS 42-43</h2>
                        <h3>Posadas Misiones</h3>

                        <p>Busca el lugar donde quieras ir</p>

                        <input type="radio" name="option2" id="">
                        <label for="option2">Solo ida</label>
                        <input type="radio" name="option1" id="">
                        <label for="option1">Ida y vuelta</label>
                        
                        <label for="tipo">Tipo de boleto</label>
                        <select name="tipo" id="">
                            <?php
                                    $Tipo = QueryAndGetData($queryTipo);
                                    while($valor = mysqli_fetch_assoc($Tipo)){
                                        echo "<option value='".$valor['TipoBoletoID']."'>".$valor['Tipo']."</option>";
                                    }
                            ?>
                        </select>
                        <label for="inicio">Lugar de partida</label>
                        <p name="inicio"></p>

                        <label for="destino">Lugar de destino</label>
                        <input type="text" name="destino" id="filtro">
                        <div id="opciones">
                            <!-- Las opciones se llenarán con JavaScript -->
                        </div>


                        <label for="fecha">Fecha de viaje</label>
                        <input type="text" id="" name="fecha" required>

                        <label for="cantidad">Cant. Pasajeros</label>
                        <select name="cantidad">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                        </select>

                        <input type="button" id="" name="buscar">
                    </form>
                </article>
                <article>
                    <h2>¿Como llegar?</h2>
                    <p><span>Ubicacion:</span> Avenida Quaranta y Avenida Santa Catalina, Ciudad de Posadas.</p>
                    <div>
                        <img src="" alt="">
                        <img src="" alt="">
                        <img src="" alt="">
                    </div>
                    <p><span>Telefono:</span> 3754 5433435</p>
                </article>
                <article>
                    <h2>Empresas que vendemos</h2>
                    <div>
                        <!-- php -->
                    </div>
                </article>
            </section>
        </main>
        <footer>
            
        </footer>
    </body>
    <script src="assets/js/filtro.js"></script>
</html>