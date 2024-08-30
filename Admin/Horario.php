

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

                        <input type="time" id="" name="Horario" value="00:00" required>

                        <input type="Submit" id="" name="AnadirHorario">
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
                            filas($select_horario,2, "horario", "HorarioID");
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
                                `empresa`.`Nombre`,
                                `empresa`.`EmpresaID`
                                FROM `horario`
                                INNER JOIN `empresa` ON `empresa`.`EmpresaID` = `horario`.`EmpresaID` 
                                WHERE `HorarioID` = $id");
                            $datos = mysqli_fetch_assoc($query);

                            echo '
                            <article>
                                <form action="update.php" method="POST">
                                    <input type="hidden" name="id" value='.$id.'>
                                    <h2>Horarios</h2>

                                    <label for="Empresa">Empresa</label>

                                    <select name="Empresa" id="">';
                                        
                                    options_selectionado($empresa, $datos['EmpresaID']);
                            echo '
                                    </select>

                                    <label for="Horario">Horario</label>

                                    <input type="time" id="" value="'.$datos['Horario'].'" name="Horario" required>

                                    <input type="Submit" id="" name="AnadirHorario">
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