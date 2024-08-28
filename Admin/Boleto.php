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
                    <form action="" method="POST">
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
                        <input type="number" id="" name="Cantidad" required>

                        
                        <label for="IdaYvuelta">Ida y vuelta</label>
                        <select name="IdaYvuelta" id="">
                            <option value='0'>Solo ida</option>
                            <option value='1'>Ida y vuelta</option>
                        </select>
                        <input type="button" id="" name="">
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
                            <th>Empresa</th>
                            <th>Cantidad personas</th>
                            <th>Ida y vuelta</th>
                            <th></th>
                            <th></th>
                        </tr>
                        
                        <?php 
                            filas($boleto,7);
                        ?>
                        
                    </table>
                    
                </article>


                <?php
                    if(isset($_GET['id'])){
                        $id =$_GET['id'];
                        $query = QueryAndGetData("SELECT `BoletoID`, `NombreBoleto`, `InicioDestino`, `Precio`, `TipoboletoID`, `EmpresaID`, `CantidadPersonas`, `localID`, `IdaYvuelta` FROM `boleto` WHERE BoletoID =  $id");
                        $datos = mysqli_fetch_assoc($query);
    
                        echo '<article>
                                    <form action="" method="POST">
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
                                <input type="number" id="" name="Cantidad" value="'.$datos['CantidadPersonas'].'" required>';
                            
                            echo '<label for="IdaYvuelta">Ida y vuelta</label>
                                    <select name="IdaYvuelta" id="">';

                                if($datos['IdaYvuelta'] === "ida"){
                                    echo "<option value='1' selected>Ida y vuelta</option>";
                                    echo "<option value='0' >Solo ida</option>";
                                }
                                else{
                                    echo "<option value='0' selected>Solo ida</option>";
                                    echo "<option value='1' >Ida y vuelta</option>";
                                }

                            echo '</select>'; 

                            echo '<input type="button" id="" name="">
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