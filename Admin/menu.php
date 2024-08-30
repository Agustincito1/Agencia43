
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../libraries/sweet/node_modules/sweetalert2/dist/sweetalert2.min.css">
    <script src="../libraries/sweet/node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
    <title>Agencias 42-43</title>
</head>
    <body>
        <?php
            include "querys.php";
        ?>


        <header>
            <h1>Bienvenidos al apartado del administrador</h1>
            <nav>
                <ul>
                    <li><a href="">cerrar session</a></li> 
                    <li><a href="">ir a la pagina principal</a></li> 
                </ul>
            </nav>
        </header>
        <main>
            <section>
                <article>
                    <h2></h2>
                    <a href="Boleto.php">Gestionar boletos</a>
                    <a href="Empresa.php">Gestionar empresas</a>
                    <a href="Horario.php">Gestionar Horarios</a>
                </article>
            </section>
        </main>
        <footer>
            
        </footer>
    </body>
</html>