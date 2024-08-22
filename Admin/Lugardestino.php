<?php
    include "../libraries/Query.php";

    if(verificarsession()){

        $SelectP = "SELECT `ProvinciaID`, `Provincia` FROM `provincia` WHERE 1";
        $SelectB = "SELECT `BoletoID`, `NombreBoleto` FROM `boleto` WHERE 1";

        $query = QueryAndGetData("SELECT `DestinoID`, 
            `Nombre`, 
            `localidad`.`Localidad`, 
            `boleto`.`NombreBoleto`
            FROM `destino`
            INNER JOIN 
                `localidad` ON `localidad`.`LocalidadID` = `destino`.`LocalidadID`
            INNER JOIN 
                `boleto` ON `boleto`.`BoletoID` = `destino`.`BoletoID`;");
        
    }
    else{
        //alerta personalizada
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lugar Destino</title>
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
                    <form action="" method="">
                        <h2>Lugar destino</h2>
                    
                        <label for="Nombre">Nombre del Lugar</label>
                        <input type="text" id="" name="Nombre" required>

                        <label for="Localidad">Localidad</label>
                        <select name="Localidad" id="">
                            <?php
                                $Localidad = QueryAndGetData($SelectP);
                                while($valor = mysqli_fetch_assoc($Localidad)){
                                    echo "<option value='".$valor['ProvinciaID']."'>".$valor['Provincia']."</option>";
                                }
                            ?>
                        </select>

                        <label for="Boleto">Boleto</label>
                        <select name="Boleto" id="">
                            <?php
                                $Boleto = QueryAndGetData($SelectB);
                                while($valor = mysqli_fetch_assoc($Boleto)){
                                    echo "<option value='".$valor['BoletoID']."'>".$valor['NombreBoleto']."</option>";
                                }
                            ?>
                        </select>
                        
                        <input type="button" id="" name="">
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
                            while($tabla = mysqli_fetch_assoc($query)){
                                echo " <tr> 
                                    <td>".$tabla['Nombre']."</td>
                                    <td>".$tabla['Localidad']."</td>
                                    <td>".$tabla['NombreBoleto']."</td>
                                    <td><a href='eliminarfila.php?tabla=destino&id=".$tabla['DestinoID']."&campo=DestinoID'>Eliminar</a></td>
                                    <td>modificar</td>
                                </tr>";
                            }
                        ?>
                        
                    </table>
                    
                </article>
                <article>
                  
                </article>
            </section>
        </main>
        <footer>
            
        </footer>
    </body>
</html>