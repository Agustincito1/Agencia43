<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $dia = $_POST['eldia'];
        $mes =$_POST['elmes'];
        $diatxt = $_POST['deldiastr'];
        $anio = $_POST['elanio'];

        


    } else {
        echo "Método no permitido.";
    }
?>