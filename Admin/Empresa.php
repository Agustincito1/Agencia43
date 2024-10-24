
<!DOCTYPE html>
<html lang="ES">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="imgs/icono.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <title>Empresa</title>
</head>
    <body id="bodyE">

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
                        <h1 class="h-s-a-d__h1">AGENCIAS 42 y 43 ¡Crea, modifica o elimina una empresa!</h1>
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
        <main id="mainE">
            <section class="mb_section">
                <h2 id="addh2">Crea una empresa</h2>
                <article id="add" class="mb-s__article">
                    <form class="mb-s-a__form" action="add.php" method="POST">

                        <h2>Crear una empresa</h2>

                        <label for="Nombre">Nombre de la Empresa</label>
                        <input type="text" id="Nombre" name="Nombre" required>
                        <label for="Imgp">Imagen principal de la empresa</label>
                        <div class="imgcont">
                            <input  class="file" type="file" id="Imgp" name="Imgp" required onchange="showImage('Imgp', 'Imgp-Preview')">
                            <img id="Imgp-Preview" alt="Image Preview" style="display:none;">
                        </div>
                        <label for="Img1">Primer imagen </label>
                        <div class="imgcont">
                            <input  class="file" type="file" id="Img1" name="Img1" required onchange="showImage('Img1', 'Img1-Preview')">
                            <img id="Img1-Preview" alt="Image Preview" style="display:none;">
                        </div>
                        <label for="Img2">Segunda imagen</label>
                        <div class="imgcont">
                            <input class="file" type="file" id="Img2"  name="Img2" required onchange="showImage('Img2', 'Img2-Preview')">
                            <img id="Img2-Preview" alt="Image Preview" style="display:none;">
                        </div >
                        
                        <label for="Img3">tercer imagen</label>
                        <div class="imgcont">
                            <input class="file" type="file" id="Img3" name="Img3" required onchange="showImage('Img3', 'Img3-Preview')">
                            <img id="Img3-Preview" alt="Image Preview" style="display:none;" >
                        </div>
                        <input type="submit" id="" class="submit" name="AnadirEmpresa">

                    </form>
                </article>
                
                    <!-- Modificar -->
                    <?php
                        if(isset($_GET['id'])){
                            $id =$_GET['id'];
                            $query = QueryAndGetData("SELECT `EmpresaID`, `Nombre` FROM `empresa` WHERE EmpresaID =  $id");
                            $datos = mysqli_fetch_assoc($query);

                            echo '<h2> <a href="empresa.php" class="anadir">Añadir Empresa</a>Modificar empresa</h2>
                            <article  class="mb-s__article" id="up">
                                <form class="mb-s-a__form" action="update.php" method="POST">
                                    <input type="hidden" name="id" value='.$id.'>
                                    <h2>Modificar empresa</h2>

                                    <label for="NombreU">Nombre de la Empresa</label>
                                    <input type="text" id="NombreU" name="NombreU" value="'.$datos['Nombre'].'" required>
                                    <label for="ImgpU">Imagen principal de la empresa</label>
                                    <input type="file" id="ImgpU" name="ImgpU" >
                                    <label for="Img1U">Primer imagen </label>
                                    <input type="file" id="Img1U" name="Img1U" >
                                    <label for="Img2U">Segunda imagen</label>
                                    <input type="file" id="Img2U" name="Img2U" >
                                    <label for="Img3U">tercer imagen</label>
                                    <input type="file" id="Img3U" name="Img3U" >
                                    <input type="submit" id="" class="submit" name="updateEmpresa">
                                    
                                </form>
                            </article>  
                            ';
                        }
                        else{
                        
                        }
                    
                    ?>
                    <h2>Tabla de empresas</h2>
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
    <script type="text/javascript" src="assets/js/mostrarcaja.js"></script>
    <script type="text/javascript" src="assets/js/functions.js"></script>
</html>