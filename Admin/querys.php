<?php

    require ("../libraries/functions.php");

    
    if(verificarsession()){
        //Querys utilizables en todo el apartado admin
        
        $select_local = "SELECT `LocalID`, `Nombre` FROM `local` WHERE 1";
        $select_tipoboleto = "SELECT `TipoBoletoID`, `Tipo` FROM `tipoboleto` WHERE 1";
        $select_horario = "SELECT 
                    `HorarioID`, 
                    `Horario`, 
                    
                    `dia` 
                    FROM `horario`
                    where 1";
    
        $boleto = "SELECT 	
                `BoletoID`, 
                `InicioDestino`, 
                `Precio`, 
                `tipoboleto`.`Tipo`, 
                `horario`.`Horario`, 
                `CantidadPersonas`,
                `IdaYvuelta`,
                `localidad`.`Localidad`,
                `empresa`.`Nombre`
                FROM  `boleto` 
                INNER JOIN 
                    horario ON `horario`.`HorarioID` = `boleto`.`HorarioID`
                INNER JOIN 
                    `tipoboleto` ON `tipoboleto`.`TipoBoletoID` = `boleto`.`TipoBoletoID`
                INNER JOIN 
                    `empresa` ON `empresa`.`EmpresaID` = `boleto`.`EmpresaID`
                INNER JOIN 
                    `localidad` ON `localidad`.`LocalidadID` = `boleto`.`LocalidadID`

                ";
                    

        $empresa = "SELECT `EmpresaID`, `Nombre`, `ImagenPrincipal`, `ImagenI`, `ImagenII`, `ImagenIII`, `IconoEmpresa`, `PaletaID` FROM `empresa` WHERE 1";

        $select_provincia = "SELECT `ProvinciaID`, `Provincia` FROM `provincia` WHERE 1";
        $select_localidad = "SELECT `LocalidadID`, `Localidad` FROM `localidad` WHERE 1";

        $select_boleto = "SELECT `BoletoID`, `NombreBoleto` FROM `boleto` WHERE 1";
        $select_empresa = "SELECT `EmpresaID`, `Nombre` FROM `empresa` WHERE 1";
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