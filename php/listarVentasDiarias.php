<?php
    date_default_timezone_set('America/Argentina/Cordoba');
    include "conexion.php";
    $fecha = date("Y-m-d");

    $sql="SELECT * FROM `ventas` WHERE `fecha`='$fecha'";
    $resultado = $conexion->query($sql);

    
    $json = array();
    while($row = mysqli_fetch_array($resultado)){
        $json[] = array(
            'id'=>$row['id'],
            'idReparto'=>$row['idReparto'],
            'l1'=>$row['Lista 1'],
            'l2'=>$row['Lista 2'],
            'l3'=>$row['Lista 3'],
            'l4'=>$row['Lista 4'],
            'l5'=>$row['Lista 5'],
            'l6'=>$row['Lista 6'],
            'l7'=>$row['Lista 7'],
            'l8'=>$row['Lista 8'],
            'total'=>$row['total'],
            'usuario'=>$row['usuario'],
            'fecha'=>$row['fecha']
        );

    }
    $jsonstring = json_encode($json);
    echo $jsonstring;    


    $conexion->close();





?>