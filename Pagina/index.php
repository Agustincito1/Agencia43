<?php

    include "../libraries/config.php";
    include QuerysFunciones;

    $queryEmpresas = "";
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
                        <label for="tipo">Solo ida</label>
                        <input type="radio" name="option1" id="">
                        <label for="tipo">Ida y vuelta</label>
                        
                        <label for="tipo">Tipo de boleto</label>
                        <input type="text" id="" name="tipo" required>

                        <label for="inicio">Lugar de partida</label>
                        <p name="inicio"></p>

                        <label for="destino">Lugar de destino</label>
                        <input type="text" id="" name="destino" required>

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
</html>