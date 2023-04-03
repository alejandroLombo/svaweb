<?php 
    date_default_timezone_set('America/Argentina/Cordoba');
    include "../php/conexion.php";
    session_start();
    $usuario = $_SESSION['usuario'];
    $fecha = date("Y-m-d");
    

    //$sql="SELECT èfectivo`,`transferencia` FROM `cc_pagos` WHERE `fecha`= '$fecha' and `cobrador`= '$usuario' ";
     $sql="SELECT `efectivo`, `transferencia` FROM `cc_pagos` 
     WHERE `fecha`= '$fecha' and `cobrador`= '$usuario'";
    $resultado = $conexion->query($sql);
    //$datos= $query->fetch_all();
     

    $json = array();
    while($row = mysqli_fetch_array($resultado)){
        $json [] =array(
            'efectivo'=>$row['efectivo'],
            'trasferencia'=>$row['transferencia']
            
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;

    //echo $fecha;

    
    
    
    $conexion->close();
?>