<?
    include "../libraries/Query.php";

    if(verificarsession()){
        $selectL = "SELECT `LocalID`, `Nombre` FROM `local` WHERE 1";
        $selectT = "SELECT `TipoBoletoID`, `Tipo` FROM `tipoboleto` WHERE 1";
        $selectH = "SELECT 
            `HorarioID`, 
            `Horario`, 
            `empresa`.`Nombre` 
            FROM `horario`
            INNER JOIN `empresa` ON `empresa`.`EmpresaID` = `horario`.`EmpresaID`;";    

        $query = QueryAndGetData("SELECT 	
            `BoletoID`, 
            `NombreBoleto`, 
            `InicioDestino`, 
            `Precio`, 
            `tipoboleto`.`Tipo`, 
            `empresa`.`Nombre`, 
            `CantidadPersonas` 
            FROM    `boleto` 
            INNER JOIN 
                `empresa` ON `empresa`.`EmpresaID` = `boleto`.`EmpresaID`
            INNER JOIN 
                `tipoboleto` ON `tipoboleto`.`TipoBoletoID` = `boleto`.`TipoBoletoID`;");
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
                    <form action="" method="">
                        <h2>Crea un boleto</h2>

                        <label for="Nombre">Nombre</label>
                        <input type="text" id="" name="Nombre" required>

                        <label for="Tipo">Tipo de Boleto</label>
                        <select name="Tipo" id="">
                            <?php
                                $Tipo = QueryAndGetData($selectT);
                                while($valor = mysqli_fetch_assoc($Tipo)){
                                    echo "<option value='".$valor['TipoBoletoID	']."'>".$valor['Tipo']."</option>";
                                }
                            ?>
                        </select>

                        <label for="Horario">Horario</label>
                        <select name="Horario" id="">
                            <?php
                                $horario = QueryAndGetData($selectH);
                                while($valor = mysqli_fetch_assoc($horario)){
                                    echo "<option value='".$valor['HorarioID']."'>".$valor['Tipo'].", ".$valor['']."</option>";
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
            </section>
        </main>
        <footer>
            
        </footer>
    </body>
</html>