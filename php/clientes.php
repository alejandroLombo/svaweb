<?php
        include "conexion.php";
        //include "ejercicio1.php";
    
        
    
        //$sql= "SELECT codigo, nombre FROM clientes ORDER BY nombre asc";
        $sql = "SELECT codigo, nombre FROM clientes ORDER BY nombre ASC";
        $resultado=$conexion->query($sql);

        
            $json = array();
            while($row = mysqli_fetch_array($resultado)){
                $json[] = array(
                    'id'=>$row['codigo'],
                    'nombre'=>$row['nombre'],
                    
                );

            }
            $jsonstring = json_encode($json);
            echo $jsonstring;    


            $conexion->close();


?>
