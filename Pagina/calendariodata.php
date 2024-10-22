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
            `Horario`, 
            empresa.Nombre,
            `Dia` 
            
        FROM `horario` 
        INNER JOIN empresa on empresa.EmpresaID = horario.EmpresaID
        WHERE horario.Dia = '$diatxt';";

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