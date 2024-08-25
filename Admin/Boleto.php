

<?php
    include "../libraries/Query.php";
    if(verificarsession()){
        
        $selectL = QueryAndGetData("SELECT `LocalID`, `Nombre` FROM `local` WHERE 1");
        $selectT = QueryAndGetData("SELECT `TipoBoletoID`, `Tipo` FROM `tipoboleto` WHERE 1");
        $selectH = QueryAndGetData("SELECT 
            `HorarioID`, 
            `Horario`, 
            `empresa`.`Nombre` 
            FROM `horario`
            INNER JOIN `empresa` ON `empresa`.`EmpresaID` = `horario`.`EmpresaID`");    
        
        $query = QueryAndGetData("SELECT 	
            `BoletoID`, 
            `NombreBoleto`, 
            `InicioDestino`, 
            `Precio`, 
            `tipoboleto`.`Tipo`, 
            `empresa`.`Nombre`, 
            `CantidadPersonas`,
            `IdaYvuelta` 
            FROM   `boleto` 
            INNER JOIN 
                `empresa` ON `empresa`.`EmpresaID` = `boleto`.`EmpresaID`
            INNER JOIN 
                `tipoboleto` ON `tipoboleto`.`TipoBoletoID` = `boleto`.`TipoBoletoID`");
    }
    else{
        //alerta personalizada
        echo "<script> alert('No iniciaste sesion'); </script>";
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boleto</title>
</head>
    <body>
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
                                while($valor = mysqli_fetch_assoc($selectT)){
                                    echo "<option value='".$valor['TipoBoletoID']."'>".$valor['Tipo']."</option>";
                                }
                            ?>
                        </select>

                        <label for="Horario">Horario</lbel>
                        <select name="Horario" id="">
                            <?php
                                
                                while($valor = mysqli_fetch_assoc($selectH)){
                                    echo "<option value='".$valor['HorarioID']."'>".$valor['Horario']."</option>";
                                }
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
                            if(mysqli_num_rows($query) > 0 ){
                                while($tabla = mysqli_fetch_assoc($query)){
                                    echo " <tr> <td>".$tabla['NombreBoleto']."</td>";
                                    echo "<td>".$tabla['InicioDestino']."</td>";
                                    echo "<td>".$tabla['Precio']."</td>";
                                    echo "<td>".$tabla['Tipo']."</td>";
                                    echo "<td>".$tabla['Nombre']."</td>";
                                    echo "<td>".$tabla['CantidadPersonas']."</td>";
                                    if($tabla['IdaYvuelta'] === 1){
                                        echo "<td>Sí</td>";
                                    }
                                    else{
                                        echo "<td>No</td>";
                                    }
                                    
                                        echo "<td><a href='eliminarfila.php?tabla=boleto&id=".$tabla['BoletoID']."'>Eliminar</a></td>
                                        <td><a href='Boleto.php?id=".$tabla['BoletoID']."'>modificar</td>
                                    </tr>";
                                }
                            }
                            else{
                                echo " <tr> <td> No hay boleto</td>
                                </tr>";
                            }
                        ?>
                        
                    </table>
                    
                </article>
                <?php
                    if(isset($_GET['id'])){
                        $id =$_GET['id'];
                        $Act = QueryAndGetData("SELECT `BoletoID`, `NombreBoleto`, `InicioDestino`, `Precio`, `TipoboletoID`, `EmpresaID`, `CantidadPersonas`, `localID`, `IdaYvuelta` FROM `boleto` WHERE BoletoID =  $id");
                        $datos = mysqli_fetch_assoc($Act);
                        $selectT = QueryAndGetData("SELECT `TipoBoletoID`, `Tipo` FROM `tipoboleto` WHERE 1");
                        $selectH = QueryAndGetData("SELECT 
                            `HorarioID`, 
                            `Horario`, 
                            `empresa`.`Nombre` 
                            FROM `horario`
                            INNER JOIN `empresa` ON `empresa`.`EmpresaID` = `horario`.`EmpresaID`");  
                            
                        echo '<article>

                            <form action="" method="POST">

                            <h2>Actualizar un boleto</h2>

                            <label for="Nombre">Nombre</label>
                            <input type="text" id="" name="Nombre" value = "'.$datos['NombreBoleto'].'" required>';



                        echo '<label for="Tipo">Tipo de Boleto</label>
                            <select name="Tipo" id="">';


                            while($valor = mysqli_fetch_assoc($selectT)){
                                if($valor['TipoBoletoID'] === $datos['TipoboletoID']){
                                    echo "<option value='".$valor['TipoBoletoID']."&campo=TipoBoletoID' selected>".$valor['Tipo']."</option>";
                                }
                                else{
                                    echo "<option value='".$valor['TipoBoletoID']."&campo=TipoBoletoID'>".$valor['Tipo']."</option>";
                                }
                            }
                            
                        echo '</select>';

                        echo '  
                            <label for="Horario">Horario</label>
                            <select name="Horario" id="">';
                            
                            while($valor = mysqli_fetch_assoc($selectH)){
                                if($valor['HorarioID'] === $datos['HorarioID']){
                                    echo "<option value='".$valor['HorarioID']."' selected>".$valor['Tipo']."</option>";
                                }
                                else{
                                    echo "<option value='".$valor['HorarioID']."'>"."</option>";
                                }
                                
                            }
                        echo '</select>';
                        
                        echo '
                            <label for="Precio">Precio</label>
                            <input type="text" id="" name="Precio" value="'.$datos['Precio'].'" required>
                            <label for="Cantidad">Cantidad Pasajeros</label>
                            <input type="number" id="" name="Cantidad" value="'.$datos['CantidadPersonas'].'" required>';
                        
                        echo '<label for="IdaYvuelta">Ida y vuelta</label>
                                <select name="IdaYvuelta" id="">';

                            if($datos['IdaYvuelta'] === 1){
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
                    else{
                        echo "<script> alert('No seleccionaste el campo para modificar'); </script>";
                        echo ' <article>
                        </article>';
                    }
                ?>
                
            </section>
        </main>
        <footer>
            
        </footer>
    </body>
</html>