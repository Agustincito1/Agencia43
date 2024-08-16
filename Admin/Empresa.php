<?php
    include "../libraries/Query.php";

    if(verificarsession()){
        $query = QueryAndGetData("SELECT `EmpresaID`, `Nombre` FROM `empresa` WHERE 1");
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
    <title>Empresa</title>
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

                        <h2>Empresa</h2>

                        <label for="Nombre">Nombre de la Empresa</label>
                        <input type="text" id="" name="Nombre" required>

                        <input type="button" id="" name="">

                    </form>
                </article>
                <article>
                    <table>
                        <tr>
                            <th>Nombre</th>
                        </tr>

                        <?php 
                            $tabla = QueryAndGetData($query);
                            while($tabla = mysqli_fetch_assoc($tabla)){
                                echo " <tr> <td>".$tabla['Nombre']."</td>
                                </tr>";
                            }
                        ?>
                        
                    </table>
                    
                </article>
            </section>
        </main>
        <footer>
            
        </footer>
    </body>
</html>