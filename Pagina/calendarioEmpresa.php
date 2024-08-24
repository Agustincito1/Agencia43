<?php
    if(isset($_GET['Empresa'])){
        $id = "Empresa";
        $query = "SELECT `HorarioID`, 
        `Horario`, 
        `horario`.`EmpresaID`, 
        `empresa`.`Nombre`
        FROM `horario`
        INNER JOIN empresa ON `horario`.`EmpresaID` = `empresa`.`EmpresaID` AND `horario`.`EmpresaID` = `$id`";
    
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calendario empresa</title>
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