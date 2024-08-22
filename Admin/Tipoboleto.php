<?php
    include "../libraries/Query.php";

    if(verificarsession()){
        $query = QueryAndGetData("SELECT `TipoBoletoID`, `Tipo` FROM `tipoboleto` WHERE 1");
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
    <title>Tipo de Boleto</title>
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

                        <h2>Tipo de boleto</h2>
                        
                        <label for="Tipo">Nombre del Tipo</label>
                        <input type="text" id="" name="Tipo" required>
                        
                        <input type="button" id="" name="">

                    </form>
                </article>
                <article>
                    <table>
                        <tr>
                            <th>Tipo</th>
                            <th></th>
                            <th></th>
                        </tr>
                        <?php 
                            while($tabla = mysqli_fetch_assoc($query)){
                                echo " <tr> 
                                    <td>".$tabla['Tipo']."</td>
                                    <td><a href='eliminarfila.php?tabla=tipoboleto&id=".$tabla['TipoBoletoID']."&campo=TipoBoletoID'>Eliminar</a></td>
                                    <td><a href='Tipoboleto.php?id=".$tabla['TipoBoletoID']."'>modificar</td>
                                </tr>";
                            }
                        ?>
                        
                    </table>
                    
                </article>
                <?php
                    if(isset($_GET['id'])){
                        $id =$_GET['id'];
                        $Act = QueryAndGetData("SELECT `TipoBoletoID`, `Tipo` FROM `tipoboleto` WHERE TipoBoletoID =  $id");
                        $datos = mysqli_fetch_assoc($Act);
                        echo ' <article>
                            <form action="" method="">

                                <h2>Actualizar tipo de boleto</h2>
                                
                                <label for="Tipo">Nombre del Tipo</label>
                                <input type="text" id="" name="Tipo" value = "'.$datos['Tipo'].'"required>
                                
                                <input type="button" id="" name="">

                            </form>
                        </article>';
                    }
                    else{
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