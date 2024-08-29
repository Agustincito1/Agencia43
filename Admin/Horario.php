

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../libraries/sweet/node_modules/sweetalert2/dist/sweetalert2.min.css">
    <script src="../libraries/sweet/node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
    <title>Horario</title>
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

                        <h2>Horarios</h2>

                        <label for="Empresa">Empresa</label>

                        <select name="Empresa" id="">
                            <?php
                                options($empresa);
                            ?>
                        </select>

                        <label for="Horario">Horario</label>

                        <input type="date" id="" name="Horario" required>

                        <input type="button" id="" name="AñadirHorario">
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
                            filas($select_horario,2);
                        ?>

                    </table>
                    
                </article>
                
                <!-- Modificar -->
                <?php
                        if(isset($_GET['id'])){
                            $id =$_GET['id'];
                            $query = QueryAndGetData("SELECT 
                                `HorarioID`, 
                                `Horario`, 
                                `empresa`.`Nombre` 
                                FROM `horario`
                                INNER JOIN `empresa` ON `empresa`.`EmpresaID` = `horario`.`EmpresaID` 
                                WHERE `HorarioID` = $id;");
                            $datos = mysqli_fetch_assoc($query);

                            echo '
                            <article>
                                <form action="" method="POST">

                                    <h2>Empresa</h2>

                                    <label for="Nombre">Nombre de la Empresa</label>
                                    <input type="text" id="" name="Nombre" value="'.$value['Nombre'].'" required>

                                    <input type="button" id="" name="">
                                    
                                </form>
                            </article>  
                            ';
                        }
                    
                ?>
                
            </section>
        </main>
        <footer>
            
        </footer>
    </body>
</html>