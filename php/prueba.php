<?php

include "conexion.php";
$id="88";
$sql="SELECT * FROM `cc_pagos` WHERE id_cc='$id'";
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





?>