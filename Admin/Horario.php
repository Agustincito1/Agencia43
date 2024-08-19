<?php
    include "../libraries/Query.php";

    if(verificarsession()){
        $SelectE = "SELECT `EmpresaID`, `Nombre` FROM `empresa` WHERE 1";

        $query = QueryAndGetData("SELECT `HorarioID`, 
            `Horario`, 
            `empresa`.`Nombre` 
            FROM `horario` 
            INNER JOIN
                `empresa` ON `empresa`.`EmpresaID` = `horario`.`EmpresaID`;");
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
    <title>Horario</title>
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

                        <h2>Horarios</h2>

                        <label for="Empresa">Empresa</label>

                        <select name="Empresa" id="">
                            <?php
                                $Empresa = QueryAndGetData($SelectE);
                                while($valor = mysqli_fetch_assoc($Empresa)){
                                    echo "<option value='".$valor['EmpresaID']."'>".$valor['Nombre']."</option>";
                                }
                            ?>
                        </select>

                        <label for="Horario">Horario</label>

                        <input type="date" id="" name="Horario" required>

                        <input type="button" id="" name="">
                    </form>
                </article>
                <article>
                    <table>
                        <tr>
                            <th>Horario</th>
                            <th>Empresa</th>
                            <th></th>
                            <th></th>
                        </tr>

                        <?php 
                            while($tabla = mysqli_fetch_assoc($query)){
                                echo " <tr> <td>".$tabla['Horario']."</td>
                                    <td>".$tabla['Nombre']."</td>
                                    <td><a href='eliminarfila.php?tabla=horario&id=".$tabla['HorarioID']."&campo=HorarioID'>Eliminar</a></td>
                                    <td>modificar</td>
                                </tr>";
                            }
                        ?>
                        
                    </table>
                    
                </article>
                <article>
                    <form action="" method="">

                        <h2>Horarios</h2>

                        <label for="Empresa">Empresa</label>

                        <select name="Empresa" id="">
                            <?php
                                $Empresa = QueryAndGetData($SelectE);
                                while($valor = mysqli_fetch_assoc($Empresa)){
                                    echo "<option value='".$valor['EmpresaID']."'>".$valor['Nombre']."</option>";
                                }
                            ?>
                        </select>

                        <label for="Horario">Horario</label>

                        <input type="date" id="" name="Horario" required>

                        <input type="button" id="" name="">
                    </form>
                </article>
            </section>
        </main>
        <footer>
            
        </footer>
    </body>
</html>