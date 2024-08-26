
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
            include "../libraries/Query.php";

            if(verificarsession()){
                $query = QueryAndGetData("SELECT `EmpresaID`, `Nombre` FROM `empresa` WHERE 1");
            }
            else{
                echo "
                        <script>
                            Swal.fire({
                                title: '¡Oops...!',
                                text: 'No iniciaste sesion',
                                icon: 'error',
                                confirmButtonText: 'Aceptar'
                            });
                        </script>";
            }

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
                    <form action="" method="">

                        <h2>Empresa</h2>

                        <label for="Nombre">Nombre de la Empresa</label>
                        <input type="text" id="" name="Nombre" required>

                        <input type="button" id="" name="">

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
                            while($tabla = mysqli_fetch_assoc($query)){
                                echo " <tr> <td>".$tabla['Nombre']."</td>
                                    <td><a href='eliminarfila.php?tabla=empresa&id=".$tabla['EmpresaID']."&campo=EmpresaID'>Eliminar</a></td>
                                    <td>modificar</td>
                                </tr>";
                            }
                        ?>
                        
                    </table>
                    
                </article>
                <article>
                    <!-- Modificar -->
                    <form action="" method="POST">

                        <h2>Empresa</h2>

                        <label for="Nombre">Nombre de la Empresa</label>
                        <input type="text" id="" name="Nombre" required>

                        <input type="button" id="" name="">
                        
                    </form>
                </article>  
            </section>
        </main>
        <footer>
            
        </footer>
    </body>
</html>