<?php
    include "conexion.php";
    session_start();

    //$sql= "SELECT * FROM cc_sva WHERE saldo != '0'";
    $sql2="SELECT cc.id,cc.fecha,cli.nombre,cc.num_rem,cc.total_rem,zn.zona,cc.saldo 
    FROM cc_sva cc INNER JOIN clientes cli ON cc.codcliente = cli.codigo 
    INNER JOIN zonas zn ON cc.zona = zn.id_zona WHERE cc.saldo != '0' and cc.anulado != '1'";
    $resultado=$conexion->query($sql2);

    //print_r($resultado);
    

    $json = array();
    while($row = mysqli_fetch_array($resultado)){
        $json[] = array(
            'id'=>$row['id'],
            'fecha'=>$row['fecha'],
            'codcliente'=>$row['nombre'],
            'num_rem'=>$row['num_rem'],
            'total_rem'=>$row['total_rem'],
            'zona'=>$row['zona'],
            'saldo'=>$row['saldo'],
            'anulado'=>$row['anulado']
        );

    }
    $jsonstring = json_encode($json);
    echo $jsonstring;    


    $conexion->close();
?>