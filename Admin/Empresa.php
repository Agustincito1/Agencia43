
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../libraries/sweet/node_modules/sweetalert2/dist/sweetalert2.min.css">
    <script src="../libraries/sweet/node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
    <link rel="shortcut icon" href="imgs/icono.ico" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Empresa</title>
</head>
    <body id="bodyE">

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
                        <h1 class="h-s-a-d__h1">AGENCIAS 42 y 43 ¡Crea, modifica o elimina una empresa!</h1>
                        <h3 class="h-s-a-d__h3">Posadas Misiones</h3>
                    </div>
                </article>
                <article >
                    <nav class="h-s-a__nav">
                        <li class="h-s-a-n-li"><a class="h-s-a-n-l__a" href="menu.php">volver</a></li>
                        
                    </nav>
                </article>
            </section>
        </header>
        <main id="mainE">
            <section class="mb_section">
                <article class="mb-s__article">
                    <form class="mb-s-a__form" action="add.php" method="POST">

                        <h2>Crear una empresa</h2>

                        <label for="Nombre">Nombre de la Empresa</label>
                        <input type="text" id="" name="Nombre" required>
                        <label for="Imgp">Imagen principal de la empresa</label>
                        <input type="file" id="" name="Imgp" required>
                        <label for="Img1">Primer imagen </label>
                        <input type="file" id="" name="Img1" required>
                        <label for="Img2">Segunda imagen</label>
                        <input type="file" id="" name="Img2" required>
                        <label for="Img3">tercer imagen</label>
                        <input type="file" id="" name="Img3" required>
                        <input type="submit" id="" class="submit" name="AnadirEmpresa">

                    </form>
                </article>
                
                    <!-- Modificar -->
                    <?php
                        if(isset($_GET['id'])){
                            $id =$_GET['id'];
                            $query = QueryAndGetData("SELECT `EmpresaID`, `Nombre` FROM `empresa` WHERE EmpresaID =  $id");
                            $datos = mysqli_fetch_assoc($query);

                            echo '
                            <article  class="mb-s__article">
                                <form class="mb-s-a__form" action="update.php" method="POST">
                                    <input type="hidden" name="id" value='.$id.'>
                                    <h2>Modificar empresa</h2>

                                    <label for="Nombre">Nombre de la Empresa</label>
                                    <input type="text" id="" name="Nombre" value="'.$datos['Nombre'].'" required>
                                    <label for="Imgp">Imagen principal de la empresa</label>
                                    <input type="file" id="" name="Imgp" required>
                                    <label for="Img1">Primer imagen </label>
                                    <input type="file" id="" name="Img1" required>
                                    <label for="Img2">Segunda imagen</label>
                                    <input type="file" id="" name="Img2" required>
                                    <label for="Img3">tercer imagen</label>
                                    <input type="file" id="" name="Img3" required>
                                    <input type="submit" id="" class="submit" name="AnadirEmpresa">
                                    
                                </form>
                            </article>  
                            ';
                        }
                        else{
                            echo "<article></article>";
                        }
                    
                    ?>
                    <article class="mb-s__article">
                    <table>
                        <tr >
                            <th class="nombrecampos">Nombre</th>
                            <th class="nombrecampos"></th>
                            
                        </tr>

                        <?php 
                            filas($empresa,1,"empresa","EmpresaID");
                        ?>
                        
                    </table>
                    
                </article>
                
            </section>
        </main>
        <footer>
            
        </footer>
    </body>
</html>