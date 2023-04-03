<?php
    include "conexion.php";



    $sql="SELECT `nombre`,`zona` FROM `usuarios` WHERE id_cargo = '2'";
    $resultado = $conexion->query($sql);

    $json = array();
    while($row = mysqli_fetch_array($resultado)){
        $json [] =array(
            'nombre'=>$row['nombre'],
            'zona'=>$row['zona']
            
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;

    $conexion->close();

?>