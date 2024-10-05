<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../libraries/sweet/node_modules/sweetalert2/dist/sweetalert2.min.css">
    <script src="../libraries/sweet/node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Boleto</title>
</head>
    <body id="bodyB">
        
        <?php
            include "querys.php";
        ?>

        <header id="header">
            <section class="header-section">
                <article class="h-s-article">
                    <div class="h-s-a__div">
                        <img class="h-s-a-d__img"src="imgs/iconoEmpresa.png" alt="" />
                        
                    </div>
                    <div class="h-s-a__div">
                        <h1 class="h-s-a-d__h1">AGENCIAS 42 y 43 ¡Crea, modifica o elimina un boleto!</h1>
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
        <main id="mainB">
            <section class="mb_section">
                <h2 id="addh2">Añadir boleto</h2>
                <article id="add" class="mb-s__article">
                    
                    <!-- Insert -->
                    <form  class="mb-s-a__form"action="add.php" method="POST">
                        <h2 class="mb-s-a-f__h2">Crea un boleto</h2>

                        <label for="Nombre" >Nombre</label>

                        <input type="text" id="" placeholder="Nombre del boleto" name="Nombre" required>

                        <label for="Tipo">Tipo de Boleto</label>

                        <select name="Tipo" id="">
                            <?php
                                options($select_tipoboleto);
                            ?>
                        </select>

                        <label for="Horario">Horario</label>

                        <select name="Horario" id="">
                            <?php
                                options($select_horario);
                            ?>
                        </select>

                        <label for="Precio" >Precio</label>

                        <input type="text" id="" name="Precio" placeholder="00" required>

                        <label for="Cantidad">Cantidad Pasajeros</label>

                        <select name="Cantidad" id="">
                            <option value='1'>1</option>
                            <option value='2'>2</option>
                            <option value='3'>3</option>
                            <option value='4'>4</option>
                            <option value='5'>5</option>
                            <option value='6'>6</option>
                        </select>

                        
                        <label for="IdaYvuelta">Ida y vuelta</label>

                        <select name="IdaYvuelta" id="">
                            <option value='Ida'>Solo ida</option>
                            <option value='IdaYvuelta'>Ida y vuelta</option>
                        </select>

                        <input type="submit" id="" class="submit"  name="AnadirBoleto">
                    </form>
                </article>

                

                <?php

                    if(isset($_GET['id'])){
                        $id =$_GET['id'];
                        $query = QueryAndGetData("SELECT `BoletoID`, `NombreBoleto`, `InicioDestino`, `Precio`, `TipoboletoID`, `HorarioID`, `CantidadPersonas`, `localID`, `IdaYvuelta` FROM `boleto` WHERE BoletoID =  $id");
                        $datos = mysqli_fetch_assoc($query);
                        $id =$_GET['id'];
                        
                        echo '  <a href="boleto.php" class="anadir">Añadir boleto</a><h2 >Modificar boleto</h2>
                        <article class="mb-s__article up" id="up">
                                    <form action="update.php" class="mb-s-a__form" method="POST">
                                    <input type="hidden" name="id" value='.$id.'>
                                    <h2>Actualizar un boleto</h2>
                                    <label for="Nombre">Nombre</label>
                                    <input type="text" id="" name="Nombre" value = "'.$datos['NombreBoleto'].'" required>';

                                    echo '<label for="Tipo">Tipo de Boleto</label>
                                    <select name="Tipo" id="">';
                                        options_selectionado($select_tipoboleto,$datos['TipoboletoID']);
                                    echo '</select>';

                                echo '<label for="Horario">Horario</label>
                                    <select name="Horario" id="">';
                                        options_selectionado($select_horario,$datos['HorarioID']);
                                    echo '</select>';
                        
                            echo '
                                <label for="Precio">Precio</label>
                                <input type="text" id="" name="Precio" value="'.$datos['Precio'].'" required>
                                <label for="Cantidad">Cantidad Pasajeros</label>
                                <select name="Cantidad" id="">';

                                for($a = 1; $a<=6 ; $a++){
                                        
                                    if($a == $datos['CantidadPersonas']){
                                        echo "<option value='$a' selected>$a</option>";
                                    }
                                    else{
                                        echo "<option value='$a'>$a</option>";

                                    }
                                }


                                    
                                echo '
                                </select>';
                                echo '<label for="IdaYvuelta">Ida y vuelta</label>
                                    <select name="IdaYvuelta" id="">';

                                if($datos['IdaYvuelta'] === "IdaYvuelta"){
                                    echo "<option value='IdaYvuelta' selected>Ida y vuelta</option>";
                                    echo "<option value='Ida' >Solo ida</option>";
                                }
                                else{
                                    echo "<option value='Ida' selected>Solo ida</option>";
                                    echo "<option value='IdaYvuelta' >Ida y vuelta</option>";
                                }

                            echo '</select>'; 

                            echo '<input type="submit" class="submit" id="" name="AnadirBoleto">
                            </form>
                        </article>';
                    }
                    else{
                        
                    }

                ?>
                <h2 >Tabla de boletos</h2>
                <article class="mb-s__article">
                    <!-- tabla -->
                    <table>
                        <tr>
                            <th>Nombre</th>
                            <th>In. destino</th>
                            <th>Precio</th>
                            <th>Tipo de boleto</th>
                            <th>Horario</th>
                            <th>Cant. personas</th>
                            <th>Ida y vuelta</th>
                            <th>Accion</th>
                            
                        </tr>
                        
                        <?php 
                            filas($boleto,7,"boleto", "BoletoID");
                        ?>
                        
                    </table>
                    
                </article>
            </section>
        </main>
        <footer>
            
        </footer>
        
    </body>
    <script src="assets/js/mostrarcaja.js"></script>
</html>