
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../libraries/sweet/node_modules/sweetalert2/dist/sweetalert2.min.css">
    <script src="../libraries/sweet/node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
    <link rel="shortcut icon" href="imgs/icono.ico" type="image/x-icon">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Agencias 42-43</title>
</head>
    <body id="bodyM">
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
                        <h1 class="h-s-a-d__h1">AGENCIAS 42 y 43 ¡Bienvenidos al apartado del administrador!</h1>
                        <h3 class="h-s-a-d__h3">Posadas Misiones</h3>
                    </div>
                </article>
                <article >
                    <nav class="h-s-a__nav">
                        <ul>
                            <li class="h-s-a-n-li"><a class="h-s-a-n-l__a" href="cy.php?c=1">cerrar session</a></li>
                        </ul>
                    </nav>
                </article>
            </section>
        </header>
        <main id="mainM">
            <section class="m_section">
                <article class="m-s__article">
                    <h2 class="m-s__h2">Funciones</h2>
                    <a class="m-s__A" href="Boleto.php">Gestionar boletos</a>
                    <a class="m-s__A" href="Empresa.php">Gestionar empresas</a>
                    <a class="m-s__A" href="Horario.php">Gestionar Horarios</a>
                    <a class="m-s__A" href="lugar_destino.php">Gestionar Destinos</a>
                </article>
            </section>
        </main>
        <footer>
            
        </footer>
    </body>
</html>