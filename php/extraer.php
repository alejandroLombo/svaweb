<?php
    include "conexion.php";
    //include "ejercicio1.php";

    session_start();
     

    $zona = $_SESSION['zona'];
    

/*
    $sql1= "SELECT codigo,nombre FROM clientes";
    $resultado1=$conexion->query($sql1);
    $clientes=$resultado1->fetch_all(); 

    $sql= "SELECT * FROM cc_sva WHERE saldo != '0' and zona = '$zona'";
    $resultado=$conexion->query($sql);
    $datos=$resultado->fetch_all();
*/
    $sql2="SELECT cc.id,cc.fecha,cli.nombre,cc.num_rem,cc.total_rem,cc.zona,cc.saldo 
    FROM cc_sva cc INNER JOIN clientes cli ON cc.codcliente = cli.codigo WHERE cc.saldo != '0'and cc.zona='$zona'";
        $resultado=$conexion->query($sql2);
        $datos=$resultado->fetch_all();

    


    $conexion->close();
?>