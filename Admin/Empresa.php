
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../libraries/sweet/node_modules/sweetalert2/dist/sweetalert2.min.css">
    <script src="../libraries/sweet/node_modules/sweetalert2/dist/sweetalert2.min.js"></script>
    <title>Empresa</title>
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

                        <h2>Empresa</h2>

                        <label for="Nombre">Nombre de la Empresa</label>
                        <input type="text" id="" name="Nombre" required>

                        <input type="button" id="" name="AñadirEmpresa">

                    </form>
                </article>
                <article>
                    <table>
                        <tr>
                            <th>Nombre</th>
                            <th></th>
                            <th></th>
                        </tr>

                        <?php 
                            filas($empresa,1);
                        ?>
                        
                    </table>
                    
                </article>
                
                    <!-- Modificar -->
                    <?php
                        if(isset($_GET['id'])){
                            $id =$_GET['id'];
                            $query = QueryAndGetData("SELECT `EmpresaID`, `Nombre` FROM `empresa` WHERE EmpresaID =  $id");
                            $datos = mysqli_fetch_assoc($query);

                            echo '
                            <article>
                                <form action="" method="POST">

                                    <h2>Empresa</h2>

                                    <label for="Nombre">Nombre de la Empresa</label>
                                    <input type="text" id="" name="Nombre" value="'.$value['Nombre'].'" required>

                                    <input type="button" id="" name="">
                                    
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