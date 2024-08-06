<?php

    include "../libraries/Query.php";
    if(verificarsession()){

        
    }
    else{
        // header("Location: login.php");
        // exit();
    }


    if($query = QueryAndGetData("SELECT `BoletoID`, `NombreBoleto`, `InicioDestino`, `LugarDestinoID`, `HoraroInicio`, `HorarioFinal`, `Precio`, `TipoboletoID`, `EmpresaID`, `CantidadPersonas` FROM `boleto` WHERE 1")){
        
    }
    else{
        //mal la consulta
    }
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla imagenes</title>
</head>
    <body>
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