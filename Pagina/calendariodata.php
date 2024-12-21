<?php
    header('Content-Type: text/html; charset=utf-8');
    header('X-Content-Type-Options: nosniff');
    include "../libraries/functions.php";

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $dia = $_POST['eldia'];
        $mes =$_POST['elmes'];
        $diatxt = $_POST['deldiastr'];
        $anio = $_POST['elanio'];

        
        $query = "SELECT 
            horario.Horario, 
            horario.Dia,
            empresa.Nombre
        FROM 
            horario
        JOIN 
            boleto ON boleto.`HorarioID` = horario.`HorarioID`
        JOIN 
            empresa ON boleto.`EmpresaID` = empresa.`EmpresaID`
        WHERE 
            horario.Dia = '$diatxt';";

        $horarios = array();

        if($datas = QueryAndGetData($query)){
            while($data = mysqli_fetch_assoc($datas)){
                $horarios[] =[
                    'Horario' => $data['Horario'],
                    'Empresa' => $data['Nombre']
                ];
                
            }
            echo json_encode($horarios);
        }
        else{
            echo "Método no permitido.";
        }

        


    } else {
        echo "Método no permitido.";
    }
?>