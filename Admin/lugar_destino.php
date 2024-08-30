

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../libraries/sweet/node_modules/sweetalert2/dist/sweetalert2.min.css">
    <script src="../libraries/sweet/node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
    <title>Lugar Destino</title>
</head>
    <body>

        <?php
            include "querys.php";
        ?>
        
        <header>
            <h1></h1>
            <nav>
                <ul>
                    <li><a href=""></a></li>

                </ul>
            </nav>
        </header>
        <main>
            <section>
                <article>
                    <form action="add.php" method="POST">
                        <h2>Lugar destino</h2>
                    
                        <label for="Nombre">Nombre del Lugar</label>
                        <input type="text" id="" name="Nombre" required>

                        <label for="Localidad">Localidad</label>
                        <select name="Localidad" id="">
                            <?php
                                options($select_provincia);
                            ?>
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
                <article>
                    <table>
                        <tr>
                            <th>Destino</th>
                            <th>Localidad</th>
                            <th>Nombre boleto</th>
                            <th></th>
                            <th></th>
                        </tr>
                        
                        <?php 
                            filas($destino,3, "destino", "DestinoID");
                        ?>
                        
                    </table>
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

                            echo '
                            <article>
                                <form action="update.php" method="POST">
                                    <input type="hidden" name="id" value='.$id.'>
                                    <h2>Lugar destino</h2>
                    
                                    <label for="Nombre">Nombre del Lugar</label>
                                    <input type="text" id="" name="Nombre" value="'.$datos['Nombre'].'" required>


                                    <label for="Localidad">Localidad</label>
                                    <select name="Localidad" id="">';

                                    options_selectionado($select_provincia,$datos['LocalidadID']);
                                        
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
                    
                    ?>
                    
                
            </section>
        </main>
        <footer>
            
        </footer>
    </body>
</html>