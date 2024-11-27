

<!DOCTYPE html>
<html lang="ES">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="imgs/icono.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <title>Lugar Destino</title>
</head>
    <body id="bodyD">
        <?php
            include "querys.php";
        ?>
        <!-- header -->
        <header id="header">
            <section class="header-section">
                <article class="h-s-article">
                    <div class="h-s-a__div">
                        <img class="h-s-a-d__img"src="imgs/iconoEmpresa.png" alt="" />
                        
                    </div>
                    <div class="h-s-a__div">
                        <h1 class="h-s-a-d__h1">¡Crea, modifica o elimina un destino!</h1>
                        <h3 class="h-s-a-d__h3">Posadas Misiones</h3>
                    </div>
                </article>
                <article >
                    <nav class="h-s-a__nav">
                        <ul>
                            <li class="h-s-a-n-li"><a class="h-s-a-n-l__a" href="menu.php">volver</a></li>
                        </ul>
                    </nav>
                </article>
            </section>
        </header>
        <!-- main -->
        <main id="mainD">
            <section class="mb_section">
                <h2 id="addh2">Añadir destinos</h2>
                <article class="mb-s__article" id="add">
                    
                    <form action="add.php"  class="mb-s-a__form" method="POST">
                        <h2>Lugar destino</h2>
                    
                        <label for="Nombre">Nombre del Lugar</label>
                        <input type="text" id="Nombre" name="Nombre" placeholder="Nombre del lugar" required>

                        <label for="Provincia">Provincia</label>
                        <select name="Provincia" id="Provincia" required>
                            <?php
                                options($select_provincia);
                            ?>
                        </select>
                        
                        <label for="Localidad">Localidad</label>
                        <select name="Localidad" id="Localidad" required>
                            <option value="">Seleccione una Provincia primero</option>
                        </select>

                        <label for="Boleto">Boleto</label>
                        <select name="Boleto" id="Boleto">
                            <?php
                                options($boleto);
                            ?>  
                        </select>
                        
                        <input type="submit" id="submit" name="AnadirLugar">
                    </form>
                </article>
                

                <!-- Modificar -->
                <?php
                        if(isset($_GET['id'])){
                            $id = $_GET['id'];
                            $query = QueryAndGetData("SELECT `DestinoID`, 
                                `Nombre`, 
                                `localidad`.`Localidad`, 
                                `boleto`.`NombreBoleto`,
                                `localidad`.`LocalidadID`,
                                `boleto`.`BoletoID`
                                FROM `destino`
                                INNER JOIN 
                                    `localidad` ON `localidad`.`LocalidadID` = `destino`.`LocalidadID`
                                INNER JOIN 
                                    `boleto` ON `boleto`.`BoletoID` = `destino`.`BoletoID` 
                                WHERE `DestinoID` = $id");

                            $datos = mysqli_fetch_assoc($query);
                            $id = $_GET['id'];
                            echo ' 
                                <a href="lugar_destino.php" class="anadir">Añadir destinos</a><h2 class="h2">  Modificar destinos</h2>
                            <article id="up" class="mb-s__article up">
                                
                                <form action="update.php" class="mb-s-a__form" method="POST">
                                    <input type="hidden" name="id" value='.$id.'>
                                    <h2>Lugar destino</h2>
                    
                                    <label for="NombreU">Nombre del Lugar</label>
                                    <input type="text" id="NombreU" name="NombreU" value="'.$datos['Nombre'].'" required>


                                    <label for="ProvinciaII">Provincia</label>
                                    <select name="ProvinciaII" id="ProvinciaII">';

                                        options_selectionado($select_provincia,$datos['LocalidadID']);
                                            
                                        echo '
                                    </select>



                                    <label for="LocalidadII">Localidad</label>
                                    <select name="LocalidadII" id="LocalidadII">';
                                        options_selectionado($select_localidad,$datos['LocalidadID']);
                                            
                                        echo '
                                    </select>

                                    <label for="BoletoU">Boleto</label>
                                    <select name="BoletoU" id="BoletoU">';
                                    options_selectionado($boleto,$datos['BoletoID']);
                                echo'
                                    </select>
                                    
                                    <input type="submit"  name="updateLugar">
                                                
                                </form>
                            </article>  
                            ';
                        }
                        else{
                            
                        }
                    
                    ?>
                <h2 id="anadirstyle">Tabla de boletos</h2>
                <article class="mb-s__article">
                    <table>
                        <tr>
                            <th>Destino</th>
                            <th>Localidad</th>
                            <th>Nombre boleto</th>
                            <th>Configuraciones</th>
                            
                        </tr>
                        
                        <?php 
                            filas($destino,3, "destino", "DestinoID");
                        ?>
                        
                    </table>
                </article>
            </section>
        </main>
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

                </section>
                <address class="footer__address"><a class="f_a__a" href="agustinlazari594@gmail.com">@agustinlazari594@gmail.com</a></address>
            </div>
        </footer>
        <script src="assets/js/mostrarcaja.js"></script>
        <script src="assets/js/selectfiltro.js"></script>

    </body>
</html>