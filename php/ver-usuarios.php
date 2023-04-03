<?php
 require_once 'conexion.php';
 session_start();

    $sql="SELECT * FROM `usuarios`";
    $resultado=$conexion->query($sql);
    //$datos=$resultado->fetch_all();
    $json = array();
    while($row = mysqli_fetch_array($resultado)){
        $json [] =array(
            'id'=>$row['id'],
            'nombre'=>$row['nombre'],
            'usuario'=>$row['usuario'],
            'password'=>$row['password'],
            'id_cargo'=>$row['id_cargo'],
            'zona'=>$row['zona']
            
        );
    }
    $jsonstring = json_encode($json);
        echo $jsonstring;

    $conexion->close();

   




 ?>