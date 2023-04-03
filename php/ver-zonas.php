<?php
    include "conexion.php";

    $sql= "SELECT * FROM zonas ";
    $query=mysqli_query($conexion,$sql);

    $json = array();
    while($row = mysqli_fetch_array($query)){
        $json[] = array(
            'id'=>$row['id_zona'],
            'zona'=>$row['zona'],
            
        );

    }
    $jsonstring = json_encode($json);
    echo $jsonstring;    


    $conexion->close();


?>
