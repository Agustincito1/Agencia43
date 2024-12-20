<!DOCTYPE html>
<html lang="ES">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="imgs/icono.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Boleto</title>
</head>
    <body id="bodyB">
        
        <?php
            //incluir librerias 
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
                        <h1 class="h-s-a-d__h1">¡Crea, modifica o elimina un boleto!</h1>
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
        <main id="mainB">
            <section class="mb_section">
                <h2 id="addh2">Añadir boleto</h2>
                <article id="add" class="mb-s__article">
                    
                    <!-- Insert -->
                    <form  class="mb-s-a__form"action="add.php" method="POST">
                        <h2 class="mb-s-a-f__h2">Crea un boleto</h2>

                        <label for="Tipo">Tipo de Boleto</label>

                        <select name="Tipo" id="Tipo">
                            <?php
                                //Llamamos la  funcion de creacion de opciones  
                                options($select_tipoboleto);
                            ?>
                        </select>

                        <label for="Horario">Horario</label>

                        <select name="Horario" id="Horario">
                            <?php
                                //Llamamos la  funcion de creacion de opciones  
                                options($select_horario);
                            ?>
                        </select>

                        <label for="Precio" >Precio en pesos</label>

                        <input type="text" id="Precio" name="Precio" placeholder="00" required>

                        <label for="Cantidad" >Cantidad Pasajeros</label>

                        <select name="Cantidad" id="Cantidad">
                            <option selected disabled>Seleccione aquí</option>
                            <option value='1'>1</option>
                            <option value='2'>2</option>
                            <option value='3'>3</option>
                            <option value='4'>4</option>
                            <option value='5'>5</option>
                            <option value='6'>6</option>
                        </select>

                        
                        <label for="IdaYvuelta">Ida y vuelta</label>

                        <select name="IdaYvuelta" id="IdaYvuelta">
                        <option selected disabled>Seleccione aquí</option>
                            <option value='Ida'>Solo ida</option>
                            <option value='IdaYvuelta'>Ida y vuelta</option>
                        </select>

                        
                        <label for="Provincia">Provincia</label>

                        <select name="Provincia" id="Provincia">
                            <?php
                                //Llamamos la  funcion de creacion de opciones  
                                options($select_provincia);
                            ?>
                        </select>
                        
                        <label for="Localidad">Localidad</label>

                        <select name="Localidad" id="Localidad">
                            <option value="">Seleccione una Provincia primero</option>
                        </select>

                        <label for="Empresa">Empresa</label>

                        <select name="Empresa" id="Empresa">
                            <?php
                                //Llamamos la  funcion de creacion de opciones  
                                options($select_empresa);
                            ?>
                        </select>

                        <input type="submit" id="submit"  name="AnadirBoleto">
                    </form>
                </article>

                

                <?php

                    if(isset($_GET['id'])){
                        $id =$_GET['id'];
                        $query = QueryAndGetData("SELECT `BoletoID`, `InicioDestino`, `Precio`, `TipoboletoID`, `HorarioID`, `CantidadPersonas`, `localID`, `IdaYvuelta`, `LocalidadID`, `EmpresaID` FROM `boleto` WHERE BoletoID =  $id");
                        $datos = mysqli_fetch_assoc($query);
                        $id = $_GET['id'];
                        
                        echo ' <a href="boleto.php" class="anadir">Añadir boleto</a> <h2 class="h2"> Modificar boleto</h2>
                        <article class="mb-s__article up" id="up">
                                    <form action="update.php" class="mb-s-a__form" method="POST">
                                    <input type="hidden" name="id" value='.$id.'>
                                    <h2>Actualizar un boleto</h2>
                                    <label for="NombreU">Nombre</label>';

                                    echo '<label for="TipoU">Tipo de Boleto</label>
                                        <select name="TipoU" id="TipoU">';
                                        options_selectionado($select_tipoboleto,$datos['TipoboletoID']);
                                    echo '</select>';

                                echo '<label for="HorarioU">Horario</label>
                                    <select name="HorarioU" id="HorarioU">';
                                        options_selectionado($select_horario,$datos['HorarioID']);
                                    echo '</select>';
                        
                            echo '
                                <label for="PrecioU">Precio</label>
                                <input type="text" name="PrecioU" id="PrecioU" value="'.$datos['Precio'].'" required>
                                <label for="CantidadU" >Cantidad Pasajeros</label>
                                <select name="CantidadU" id="CantidadU">';

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
                                echo '<label for="IdaYvueltaU">Ida y vuelta</label>
                                    <select name="IdaYvueltaU" id="IdaYvueltaU">';

                                if($datos['IdaYvuelta'] === "IdaYvuelta"){
                                    echo "<option value='IdaYvuelta' selected>Ida y vuelta</option>";
                                    echo "<option value='Ida' >Solo ida</option>";
                                }
                                else{
                                    echo "<option value='Ida' selected>Solo ida</option>";
                                    echo "<option value='IdaYvuelta' >Ida y vuelta</option>";
                                }

                            echo '</select>'; 



                            echo '<label for="EmpresaU">Empresa</label>
                            <select name="EmpresaU" id="EmpresaU">';
                            options_selectionado($select_empresa,$datos['EmpresaID']);
                            echo '</select>';


                            echo '<input type="submit" id="submit" name="uptdateBoleto">
                            </form>
                        </article>';
                    }
                    else{
                        
                    }

                ?>
                <h2 id="anadirstyle">Tabla de boletos</h2>
                <article class="mb-s__article">
                    <!-- tabla -->
                    <table class="table">
                        <tr>
                            
                            <th>In. destino</th>
                            <th>Precio</th>
                            <th>Tipo de boleto</th>
                            <th>Horario</th>
                            <th>Cant. personas</th>
                            <th>Ida y vuelta</th>
                            <th>Destino</th>
                            <th>Empresa</th>
                            <th>Configuraciones</th>
                            
                        </tr>
                        
                        <?php 
                            filas($boleto,8,"boleto", "BoletoID");
                        ?>
                        
                    </table>
                    
                </article>
            </section>
        </main>
        <footer id="footer">
            <div class="footer">
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
            </div>
        </footer>
    </body>
    <script src="assets/js/selectfiltro.js"></script>
    <script type="text/javascript" src="assets/js/mostrarcaja.js"></script>
</html>