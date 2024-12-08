
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
                        <h1 class="h-s-a-d__h1">¡Crea, modifica o elimina una empresa!</h1>
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
                    <form class="mb-s-a__form" action="add.php" method="POST" enctype="multipart/form-data">

                        <h2>Crear una empresa</h2>

                        <label for="Nombre">Nombre de la Empresa</label>
                        <input type="text" class="input" id="Nombre" name="Nombre" required>
                        <h3>Imagen principal de la empresa</h3>
                        <div class="inputImgContainer-d">
                            <input type="file" id="ImgP" name="ImgP" accept="image/*" required onchange="showImage('ImgP', 'ImgP-Preview')">
                            <img id="ImgP-Preview" alt="Image Preview" style="display:none;">
                        </div>

                        <h3>Icono de la empresa</h3>
                        <div class="inputImgContainer-d">
                            <input type="file" id="ImgI" name="ImgI" accept="image/*" required onchange="showImage('ImgI', 'ImgI-Preview')">
                            <img id="ImgI-Preview" alt="Image Preview" style="display:none;">
                        </div>




                        <h3>Imagenes de las empresas</h3>

                        <ul class="inputImgContainer">
                            <li  class="inputImgContainer-li">
                                <input class="in" type="file" id="Img1" name="Img1" accept="image/*" required onchange="showImage('Img1', 'Img1-Preview')">
                                <img id="Img1-Preview" alt="Image Preview" style="display:none;">
                            </li>
                            <li class="inputImgContainer-li">
                                <input class="in" type="file" id="Img2"  name="Img2" accept="image/*" required onchange="showImage('Img2', 'Img2-Preview')">
                                <img id="Img2-Preview" alt="Image Preview" style="display:none;">
                            </li>
                            <li class="inputImgContainer-li">
                                <input class="in" type="file" id="Img3" name="Img3" accept="image/*" required onchange="showImage('Img3', 'Img3-Preview')">
                                <img id="Img3-Preview" alt="Image Preview" style="display:none;" >
                            </li>
                        </ul>

                        <input type="submit" id="submit" name="AnadirEmpresa">

                    </form>
                </article>
                
                    <!-- Modificar -->
                    <?php
                                      if(isset($_GET['id'])){
                                        $id =$_GET['id'];
                                        $query = QueryAndGetData("SELECT * FROM `empresa` WHERE EmpresaID =  $id");
                                        $datos = mysqli_fetch_assoc($query);
                                        $imgI = $datos['ImagenI'];
                                        $imgII = $datos['ImagenII'];
                                        $imgIII = $datos['ImagenIII'];
                                        $icono = $datos['IconoEmpresa'];
                                        $principal = $datos['ImagenPrincipal'];
            
            
                                        $stringI = "'ImgPU', 'ImgPU-Preview'";
                                        $stringII = "'ImgIU', 'ImgIU-Preview'";
                                        $stringIII = "'Img1U', 'Img1U-Preview'";
                                        $stringIV = "'Img2U', 'Img2U-Preview'";
                                        $stringV = "'Img3U', 'Img3U-Preview'";
                                        echo '<a href="empresa.php" class="anadir">Añadir empresa</a><h2 class="h2"> Modificar empresa</h2>
                                        <article  class="mb-s__article" id="up" >
                                        <form class="mb-s-a__form" action="update.php" method="POST" enctype="multipart/form-data">
                                                <input type="hidden" name="id" value='.$id.'>
                                                <h2>Modificar empresa</h2>
                                                
                                                <label for="Nombre">Nombre de la Empresa</label>
                                                <input type="text" class="input" id="Nombre" name="Nombre" value="'.$datos['Nombre'].'" required>
                                                <h3>Imagenes de las empresas</h3>
                                                <div class="inputImgContainer-d">
                                                    <input class="in" type="file" id="ImgPU" name="ImgPU" accept="image/*" required onchange="showImage('.$stringI.')">
                                                    <img src="'.$principal.'" class="ver" id="ImgPU-Preview" alt="Image Preview" style="display:none;">
                                                </div>
            
                                                <h3>Icono de la empresa</h3>
                                                <div class="inputImgContainer-d">
                                                    <input class="in" type="file" id="ImgIU" name="ImgIU" accept="image/*" required onchange="showImage('.$stringII.')">
                                                    <img src="'.$icono.'" class="ver" id="ImgIU-Preview" alt="Image Preview" style="display:none;">
                                                </div>
            
            
                                                <h3>Imagenes de las empresas</h3>
            
                                                
                                                <ul class="inputImgContainer">
                                                    <li  class="inputImgContainer-li">
                                                        <input class="in" type="file" id="Img1U" name="Img1U" required onchange="showImage('.$stringIII.')">
                                                        <img src="'.$imgI.'" class="ver" id="Img1U-Preview" alt="Image Preview" style="display:none;">
                                                    </li>
                                                    <li class="inputImgContainer-li">
                                                        <input class="in" type="file" id="Img2U"  name="Img2U" required onchange="showImage('.$stringIV.')">
                                                        <img src="'.$imgII.'" class="ver"  id="Img2U-Preview" alt="Image Preview" style="display:none;">
                                                    </li>
                                                    <li class="inputImgContainer-li">
                                                        <input class="in" type="file" id="Img3U" name="Img3U" required onchange="showImage('.$stringIV.')">
                                                        <img src="'.$imgIII.'" class="ver"  id="Img3U-Preview" alt="Image Preview" style="display:none;" >
                                                    </li>
                                                </ul>
            
                                                <input type="submit" id="submit" name="updateEmpresa">
                                                
                                            </form>
                                        </article>  
                                        ';
                        }
                        else{
                        
                        }
                    
                    ?>
                <h2 id="anadirstyle">Tabla de boletos</h2>
                <article class="mb-s__article">
                    <table >
                        <tr >
                            <th class="nombrecampos">Nombre</th>
                            <th class="nombrecampos">Imagen Principal</th>
                            <th class="nombrecampos">Imagen I</th>
                            <th class="nombrecampos">Imagen II</th>
                            <th class="nombrecampos">Imagen III</th>
                            <th class="nombrecampos">Icono empresa</th>
                            <th class="nombrecampos">Paleta de colores</th>

                            <th class="nombrecampos">Configuraciones</th>
                            
                        </tr>

                        <?php 
                            filas($empresa,7,"empresa","EmpresaID");
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
    <script type="text/javascript" src="assets/js/mostrarcaja.js"></script>
    <script type="text/javascript" src="assets/js/functions.js"></script>
    <script>
        let imagenes = document.querySelectorAll('.ver');
     
        // Recorrer cada etiqueta <img>
        imagenes.forEach(function(imagen) {
        // Obtener el valor del atributo src
            let src = imagen.getAttribute('src');

            // Verificar si el atributo src tiene una URL válida
            if (src && src.trim() !== '') {
                console.log("tiene sisdadas");
                imagen.style.display = 'block'; // O 'inline', según el estilo deseado  
                
            } else {
                imagen.style.display = 'none'; // O 'inline', según el estilo deseado
            }
        });
    </script>
</html>