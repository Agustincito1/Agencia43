<?php

    function ErrorLog2($mensaje){
        $archivo_log = "registro.log";
        $fecha_hora_segundo = date('Y-m-d H:i:s');
        $string = " " . $fecha_hora_segundo . ":  Error: " . $mensaje . "\n";
        error_log($string, 3, $archivo_log);
    }

    //funcion para verificar una query

    function Query($query){
        include "conexion.php";     

        try{

            if($ejecucion = mysqli_query($conexion, $query)){

                return true;

            }
            else{
                throw new Exception(mysqli_error($conexion));
                return false;
            }

        }catch(Exeption $Error){

            $Error = $error->getMessage();
            ErrorLog2($Error);

        }
        
    }

    //funcion para conseguir los datos de una query

    function QueryAndGetData($query){
        include "conexion.php";
        try{

            if($ejecucion = mysqli_query($conexion, $query)){

                return $ejecucion;

            }
            else{
                throw new Exception(mysqli_error($conexion));
                return false;
            }

        }catch(Exeption $Error){
            $Error = $error->getMessage();
            ErrorLog2($Error);
        }
    }

    //funcion para verificar la session 

    function verificarsession(){
        session_start();
        
        if(isset($_SESSION['ID'])){
            return True;
        }
        else{
            echo "
                <script>
                    
                    window.location.href = '../Admin/login.php';
                    
                </script>";
                
            return false;
        }
    }

    //funcion para crear opciones desde la bd

    function options($query){

        if($data = QueryAndGetData($query)){

            while($row = mysqli_fetch_assoc($data)){
                $values = array_values($row);
                echo "<option value=".$values[0]."> ".$values[1]."</option>";
            }

        }
        else{
            echo "<option> no hay todavia</option>";
        }

    }

    //funcion para crear filas desde la bd

    function filas($query, $cantidad_columnas, $nametable, $campo){

        if($data = QueryAndGetData($query)){
            while($row = mysqli_fetch_assoc($data)){
                echo "<tr>";
                $values = array_values($row);
                for($n = 1; $n <= $cantidad_columnas; $n++){
                    echo "<td>".$values[$n]."</td>";
                }
                echo "<td>
                    <a href='delete.php?tabla=$nametable&id=".$values[0]."&campo=".$campo."'>Eliminar</a>
                ";
                echo "
                    <a href='?id=".$values[0]."'>Modificar</a>
                </td>";
                echo "</tr>";
            }
        }
        else{
            echo "<div>vacio</div>";
        }

    }

    
    function options_selectionado($query, $seleccionado){

        if($data = QueryAndGetData($query)){

            while($row = mysqli_fetch_assoc($data)){
                $values = array_values($row);
                if($values[0] === $seleccionado){
                    echo "<option value='".$values[0]."' selected>".$values[1]."</option>";
                }
                else{
                    echo "<option value='".$values[0]."'>".$values[1]."</option>";
                }
            }

        }
        else{
            echo "<option> no hay todavia</option>";
        }

    }


    function imagen_empresas($query){
        $datos = QueryAndGetData($query);
        if(mysqli_num_rows($datos)>1){
            while($dato = mysqli_fetch_assoc($datos)){

                echo "<div class='empresaimg'> ".$dato['Nombre']."
                    <img src='' alt=''>
                </div>";
    
            }
        }
        else{
            $datos = mysqli_fetch_assoc($datos);
            echo "<div class='empresaimg'> ".$datos['Nombre']."
            <img src='' alt=''>
            </div>";
        }

    }


?>