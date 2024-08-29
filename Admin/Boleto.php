<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../libraries/sweet/node_modules/sweetalert2/dist/sweetalert2.min.css">
    <script src="../libraries/sweet/node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
    <title>Boleto</title>
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
                    
                    <!-- Insert -->
                    <form action="add.php" method="POST">
                        <h2>Crea un boleto</h2>

                        <label for="Nombre">Nombre</label>
                        <input type="text" id="" name="Nombre" required>

                        <label for="Tipo">Tipo de Boleto</label>
                        <select name="Tipo" id="">
                            <?php
                                options($select_tipoboleto);
                            ?>
                        </select>

                        <label for="Horario">Horario</lbel>
                        <select name="Horario" id="">
                            <?php
                                options($select_horario);
                            ?>
                        </select>

                        <label for="Precio">Precio</label>
                        <input type="text" id="" name="Precio" required>

                        <label for="Cantidad">Cantidad Pasajeros</label>
                        <select name="Cantidad" id="">
                            <option value='1'>1</option>
                            <option value='2'>2</option>
                            <option value='3'>3</option>
                            <option value='4'>4</option>
                            <option value='5'>5</option>
                            <option value='6'>6</option>
                        </select>

                        
                        <label for="IdaYvuelta">Ida y vuelta</label>
                        <select name="IdaYvuelta" id="">
                            <option value='Ida'>Solo ida</option>
                            <option value='IdaYvuelta'>Ida y vuelta</option>
                        </select>
                        <input type="submit" id="" name="AnadirBoleto">
                    </form>
                </article>

                <article>
                    <!-- tabla -->
                    <table>
                        <tr>
                            <th>Nombre</th>
                            <th>Inicio Destino</th>
                            <th>Precio</th>
                            <th>Tipo de boleto</th>
                            <th>Horario</th>
                            <th>Cantidad personas</th>
                            <th>Ida y vuelta</th>
                            <th></th>
                            <th></th>
                        </tr>
                        
                        <?php 
                            filas($boleto,7,"boleto", "BoletoID");
                        ?>
                        
                    </table>
                    
                </article>


                <?php
                    if(isset($_GET['id'])){
                        $id =$_GET['id'];
                        $query = QueryAndGetData("SELECT `BoletoID`, `NombreBoleto`, `InicioDestino`, `Precio`, `TipoboletoID`, `HorarioID`, `CantidadPersonas`, `localID`, `IdaYvuelta` FROM `boleto` WHERE BoletoID =  $id");
                        $datos = mysqli_fetch_assoc($query);
                        $id =$_GET['id'];
                        echo '<article>
                                    
                                    <form action="update.php" method="POST">
                                    <input type="hidden" name="id" value='.$id.'>
                                    <h2>Actualizar un boleto</h2>
                                    <label for="Nombre">Nombre</label>
                                    <input type="text" id="" name="Nombre" value = "'.$datos['NombreBoleto'].'" required>';

                                    echo '<label for="Tipo">Tipo de Boleto</label>
                                    <select name="Tipo" id="">';
                                        options_selectionado($select_tipoboleto,$datos['TipoboletoID']);
                                    echo '</select>';

                                echo '<label for="Horario">Horario</label>
                                    <select name="Horario" id="">';
                                        options_selectionado($select_horario,$datos['HorarioID']);
                                    echo '</select>';
                        
                            echo '
                                <label for="Precio">Precio</label>
                                <input type="text" id="" name="Precio" value="'.$datos['Precio'].'" required>
                                <label for="Cantidad">Cantidad Pasajeros</label>
                                <select name="Cantidad" id="">';

                                for($a = 1; $a<=6 ; $a++){
                                        
                                    if($a == $datos['CantidadPersonas']){
                                        echo "<option value='$a' selected>$a</option>";
                                    }
                                    else{
                                        echo "<option value='$a'>$a</option>";

                                    }
                                }


                                    
                                echo '
                                </select>';
                                echo '<label for="IdaYvuelta">Ida y vuelta</label>
                                    <select name="IdaYvuelta" id="">';

                                if($datos['IdaYvuelta'] === 1){
                                    echo "<option value='IdaYvuelta' selected>Ida y vuelta</option>";
                                    echo "<option value='Ida' >Solo ida</option>";
                                }
                                else{
                                    echo "<option value='Ida' selected>Solo ida</option>";
                                    echo "<option value='IdaYvuelta' >Ida y vuelta</option>";
                                }

                            echo '</select>'; 

                            echo '<input type="submit" id="" name="AnadirBoleto">
                            </form>
                        </article>';
                    }

                ?>
                
            </section>
        </main>
        <footer>
            
        </footer>
    </body>
</html>