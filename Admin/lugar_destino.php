

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../libraries/sweet/node_modules/sweetalert2/dist/sweetalert2.min.css">
    <script src="../libraries/sweet/node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
    <link rel="shortcut icon" href="imgs/icono.ico" type="image/x-icon">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Lugar Destino</title>

    
</head>
    <body  id="bodyE">

        <?php
            include "querys.php";
        ?>
        
        
        <header id="header">
            <section class="header-section">
                <article class="h-s-article">
                    <div class="h-s-a__div">
                        <img class="h-s-a-d__img"src="imgs/iconoEmpresa.png" alt="" />
                        
                    </div>
                    <div class="h-s-a__div">
                        <h1 class="h-s-a-d__h1">AGENCIAS 42 y 43 ¡Crea, modifica o elimina un boleto!</h1>
                        <h3 class="h-s-a-d__h3">Posadas Misiones</h3>
                    </div>
                </article>
                <article >
                    <nav class="h-s-a__nav">
                        <ul>
                            <li class="h-s-a-n-li"><a class="h-s-a-n-l__a" href="menu.php">volver</a></li>
                            <li class="h-s-a-n-li"><a class="h-s-a-n-l__a" href="calendario.php">cerrar session</a></li>
                        </ul>
                    </nav>
                </article>
            </section>
        </header>
        <main id="mainE">
            <section class="mb_section">
                <h2 id="addh2">Añadir destinos</h2>
                <article class="mb-s__article" id="add">
                    
                    <form action="add.php"  class="mb-s-a__form" method="POST">
                        <h2>Lugar destino</h2>
                    
                        <label for="Nombre">Nombre del Lugar</label>
                        <input type="text" id="" name="Nombre" placeholder="Nombre del lugar" required>

                        <label for="Provincia">Provincia</label>
                        <select name="Provincia" id="Provincia">

                            <?php
                                options($select_provincia);
                            ?>

                        </select>
                        <label for="Localidad">Localidad</label>
                        <select name="Localidad" id="Localidad">
                            <option value="">Seleccione una Provincia primero</option>
                        </select>

                        <label for="Boleto">Boleto</label>
                        <select name="Boleto" id="">
                            <?php
                                options($boleto);
                            ?>  
                        </select>
                        
                        <input type="submit" id="" name="AnadirLugar">
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

                            echo ' <a href="lugar_destino.php">Añadir Destino</a>
                                <h2>Modificar destinos</h2>
                            <article id="up" >
                                
                                <form action="update.php" method="POST">
                                    <input type="hidden" name="id" value='.$id.'>
                                    <h2>Lugar destino</h2>
                    
                                    <label for="Nombre">Nombre del Lugar</label>
                                    <input type="text" id="" name="Nombre" value="'.$datos['Nombre'].'" required>


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

                                    <label for="Boleto">Boleto</label>
                                    <select name="Boleto" id="">';
                                    options_selectionado($boleto,$datos['BoletoID']);
                                echo'
                                    </select>
                                    
                                    <input type="submit" id="" name="AnadirLugar">
                                                
                                </form>
                            </article>  
                            ';
                        }
                        else{
                            
                        }
                    
                    ?>
                <h2>Tabla destinos</h2>
                <article class="mb-s__article">
                    <table>
                        <tr>
                            <th>Destino</th>
                            <th>Localidad</th>
                            <th>Nombre boleto</th>
                            <th></th>
                            
                        </tr>
                        
                        <?php 
                            filas($destino,3, "destino", "DestinoID");
                        ?>
                        
                    </table>
                </article>
            </section>
        </main>
        <footer>
            
        </footer>
        <script src="assets/js/mostrarcaja.js"></script>
        <script src="assets/js/selectfiltro.js"></script>
    </body>
</html>