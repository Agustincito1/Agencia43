<?php

    require ("../libraries/functions.php");

    
    if(verificarsession()){
        //Querys utilizables en todo el apartado admin
        
        $select_local = "SELECT `LocalID`, `Nombre` FROM `local` WHERE 1";
        $select_tipoboleto = "SELECT `TipoBoletoID`, `Tipo` FROM `tipoboleto` WHERE 1";
        $select_horario = "SELECT 
                    `HorarioID`, 
                    `Horario`, 
                    `empresa`.`Nombre` 
                    FROM `horario`
                    INNER JOIN `empresa` ON `empresa`.`EmpresaID` = `horario`.`EmpresaID`";    
    
        $boleto = "SELECT 	
                `BoletoID`, 
                `NombreBoleto`, 
                `InicioDestino`, 
                `Precio`, 
                `tipoboleto`.`Tipo`, 
                `empresa`.`Nombre`, 
                `CantidadPersonas`,
                `IdaYvuelta` 
                FROM   `boleto` 
                INNER JOIN 
                    `empresa` ON `empresa`.`EmpresaID` = `boleto`.`EmpresaID`
                INNER JOIN 
                    `tipoboleto` ON `tipoboleto`.`TipoBoletoID` = `boleto`.`TipoBoletoID`";

        $empresa = "SELECT `EmpresaID`, `Nombre` FROM `empresa` WHERE 1";

        $select_provincia = "SELECT `ProvinciaID`, `Provincia` FROM `provincia` WHERE 1";

        $select_boleto = "SELECT `BoletoID`, `NombreBoleto` FROM `boleto` WHERE 1";

        $destino ="SELECT `DestinoID`, 
            `Nombre`, 
            `localidad`.`Localidad`, 
            `boleto`.`NombreBoleto`
            FROM `destino`
            INNER JOIN 
                `localidad` ON `localidad`.`LocalidadID` = `destino`.`LocalidadID`
            INNER JOIN 
                `boleto` ON `boleto`.`BoletoID` = `destino`.`BoletoID`;";
    }
?>