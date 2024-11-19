

<!DOCTYPE html>
<html lang="ES">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="imgs/icono.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css "href="assets/css/style.css">
    <title>Horario</title>
</head>
    <body id="bodyH">
        
        <?php
            include "querys.php";
        ?>
        <!-- header -->
        <header id="header">
            <section class="header-section">
                <article class="h-s-article">
                    <div class="h-s-a__div">
                        <img class="h-s-a-d__img"src="imgs/iconoEmpresa.png" alt="" />
                        
                    </div>
                    <div class="h-s-a__div">
                        <h1 class="h-s-a-d__h1">¡Crea, modifica o elimina un horario!</h1>
                        <h3 class="h-s-a-d__h3">Posadas Misiones</h3>
                    </div>
                </article>
                <article >
                    <nav class="h-s-a__nav">
                        <ul><li class="h-s-a-n-li"><a class="h-s-a-n-l__a" href="menu.php">volver</a></li> </ul>
                        
                    </nav>
                </article>
            </section>
        </header>   
        <!-- main -->
        <main id="mainH">
            
            <section class="mb_section">
                <h2 id="addh2">Añadir horario</h2>
                <article id="add" class="mb-s__article">
                    <form class="mb-s-a__form" action="add.php" method="POST">

                        <h2>Horarios</h2>

                        <label for="Empresa">Empresa</label>

                        <select name="Empresa" id="Empresa">
                            <?php
                                options($empresa);
                            ?>
                        </select>

                        <label for="Horario">Horario</label>

                        <input type="time" id="Horario" name="Horario" value="00:00" required>

                        <input type="Submit" class="submit" name="AnadirHorario">
                    </form>
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
                            
                            <h2><a href="horario.php" class="anadir"> Añadir Horario</a> Modificar Horario</h2>
                            <article class="mb-s__article up" id="up">
                                <form action="update.php" class="mb-s-a__form" method="POST">
                                    <input type="hidden" name="id" value='.$id.'>
                                    <h2>Horarios</h2>

                                    <label for="EmpresaU">Empresa</label>

                                    <select name="EmpresaU" id="EmpresaU">';
                                        
                                    options_selectionado($empresa, $datos['EmpresaID']);
                            echo '
                                    </select>

                                    <label for="HorarioU">Horario</label>

                                    <input type="time" id="HorarioU" value="'.$datos['Horario'].'" name="HorarioU" required>

                                    <input type="Submit" class="submit" name="updateHorario">
                                </form>
                            </article>  
                            ';
                        }
                        else{
                            
                        }
                ?>
                <h2>Tabla de horarios</h2>
                <article class="mb-s__article">
                    <table>
                        <tr>
                            <th>Horario</th>
                            <th>Empresa</th>
                            <th></th>
                            
                        </tr>
                        
                        <?php  
                            filas($select_horario,2, "horario", "HorarioID");
                        ?>

                    </table>
                    
                </article>
            </section>
        </main>
        <footer id="footer">
                <section class="footer__section">
                    <article class="f-s__article">
                        <div class="f-s-a__div">
                            
                            <img class="f-s-a-d__img" src="imgs/iconoEmpresa.png" alt="" />
                            
                        </div>
                        <div class="f-s-a__div">
                            <h1 class="f-s-a-d__h1">AGENCIAS 42 y 43</h1>
                            <h3 class="f-s-a-d__h3">Posadas Misiones</h3>
                        </div>
                        
                    </article>

                </section>
                <address class="footer__address"><a class="f_a__a" href="agustinlazari594@gmail.com">@agustinlazari594@gmail.com</a></address>
        </footer>
    </body>
    <script src="assets/js/mostrarcaja.js"></script>
</html>