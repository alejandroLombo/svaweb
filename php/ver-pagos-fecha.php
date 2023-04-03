<?php
 require_once 'conexion.php';
 session_start();


    $fechad=$_POST['fechad'];
    $fechah=$_POST['fechah'];
    $cobrador=$_POST['usuario'];
    
    $sql="SELECT * FROM `cc_pagos` WHERE `fecha`BETWEEN '$fechad' and '$fechah' and`cobrador`='$cobrador' ";
    $resultado=$conexion->query($sql);
    //$datos=$resultado->fetch_all();
    $json = array();
    while($row = mysqli_fetch_array($resultado)){
        $json [] =array(
            'id_pago'=>$row['id_pago'],
            'id_cc'=>$row['id_cc'],
            'fecha'=>$row['fecha'],
            'efectivo'=>$row['efectivo'],
            'trasferencia'=>$row['transferencia'],
            'cobrador'=>$row['cobrador']
        );
    }
    $jsonstring = json_encode($json);
        echo $jsonstring;

    $conexion->close();

    




 ?>