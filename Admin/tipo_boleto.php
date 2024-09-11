
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../libraries/sweet/node_modules/sweetalert2/dist/sweetalert2.min.css">
    <script src="../libraries/sweet/node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
    <link rel="shortcut icon" href="imgs/icono.ico" type="image/x-icon">
    <title>Tipo de Boleto</title>
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

                        <h2>Tipo de boleto</h2>
                        
                        <label for="Tipo">Nombre del Tipo</label>
                        <input type="text" id="" name="Tipo" required>
                        
                        <input type="submit" id="" name="AnadirTipo">

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
                            filas($select_tipoboleto,1, "tipoboleto", "TipoBoletoID");
                        ?>
                        
                    </table>
                    
                </article>

                <?php

                    if(isset($_GET['id'])){
                        $id =$_GET['id'];
                        $Act = QueryAndGetData("SELECT `TipoBoletoID`, `Tipo` FROM `tipoboleto` WHERE TipoBoletoID =  $id");
                        $datos = mysqli_fetch_assoc($Act);
                        echo ' <article>
                            <form action="update.php" method="POST">
                                <input type="hidden" name="id" value='.$id.'>
                                <h2>Actualizar tipo de boleto</h2>
                                
                                <label for="Tipo">Nombre del Tipo</label>
                                <input type="text" id="" name="Tipo" value = "'.$datos['Tipo'].'"required>
                                
                                <input type="submit" id="" name="AnadirTipo">

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