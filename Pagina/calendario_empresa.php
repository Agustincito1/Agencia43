<?php
    if(isset($_GET['Empresa'])){
        include "../libraries/functions.php";
        $id = $_GET['Empresa'];

        $query = "SELECT `HorarioID`, 
        `Horario`, 
        `horario`.`EmpresaID`, 
        `empresa`.`Nombre`
        FROM `horario`
        INNER JOIN empresa ON `horario`.`EmpresaID` = `empresa`.`EmpresaID` AND `horario`.`EmpresaID` = `$id`";

        $datos = QueryAndGetData($query);
    }
    else{
        
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="imgs/icono.ico" type="image/x-icon">
    <title>Calendario <?php echo $datos['Nombre']; ?></title>
</head>
    <body>
        <header>
            <h1></h1>
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
                    <h2></h2>
                    <table>
                        <thead>
                            <tr>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </article>
            </section>
        </main>
        <footer>
            
        </footer>
    </body>
</html>