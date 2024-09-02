<?php
    include "../libraries/functions.php";
    if(isset($_GET['Empresa'])){
        $id = $_GET['Empresa'];
        $fotos_empresa = "SELECT `ImagenI`, `ImagenII`, `ImagenIII` WHERE `EmpresaID` = `$id`";
        $fotos_empresa = QueryAndGetData($fotos_empresa);
        $query = "SELECT `EmpresaID`, `Nombre` FROM `empresa` WHERE `EmpresaID` = `$id`";
    }
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $datos['Nombre']; ?></title>
</head>
    <body>
        <header>
            <nav>
                <ul>
                    <li><a href=""></a></li>
                    <li><a href=""></a></li>
                </ul>
            </nav>
        </header>
        <main>
            <section>
                <article>
                </article>
                <article>
                </article>
            </section>
        </main>
        <footer>
            
        </footer>
    </body>
</html>