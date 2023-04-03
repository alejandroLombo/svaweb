<?php
    include "conexion.php";

    $sql="SELECT * FROM proveedores";
    $resultado = $conexion->query($sql);
    

    $json = array();
    while($row = mysqli_fetch_array($resultado)){
        $json[] = array(
            'id'=>$row['id'],
            'nombre'=>$row['nombre'],
            'direccion'=>$row['direccion'],
            'telefono'=>$row['telefono'],
            'contacto'=>$row['contacto'],
            'telContacto'=>$row['tele_contacto']
        );

    }
    $jsonstring = json_encode($json);
    echo $jsonstring;    


    $conexion->close();




?>