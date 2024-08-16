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
                        <h2></h2>
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
                    <h2></h2>
                </article>
                <article>
                    <h2></h2>
                </article>
            </section>
        </main>
        <footer>
            
        </footer>
    </body>
</html>