<?php
date_default_timezone_set('America/Argentina/Cordoba');
 require_once 'conexion.php';
 session_start();
   
 $saldo_pendiente = 0;
 $cliente=$_POST['cliente'];
 $num_rem=$_POST['num_remito'];
 $total_remito=$_POST['total_remito'];
 $efectivo = $_POST['efectivo'];
 $transf=  $_POST['transf'];
 $fecha= date("Y-m-d");
 $usuario = $_SESSION['usuario'];
 $zona = $_SESSION['zona'];

if(isset($efectivo)&&isset($transf)){ 

    $saldo_pendiente=$total_remito-$efectivo-$transf;

}else if(isset($efectivo)){
    $saldo_pendiente=$total_remito-$efectivo;

}else if(isset($transf)){

    $saldo_pendiente = $total_remito-$transf;
}else{

    $saldo_pendiente= $total_remito;

}
 
$sql = "SELECT * FROM cc_sva WHERE num_rem='$num_rem'";
$resultado = mysqli_query($conexion, $sql);
$datos= $resultado->fetch_assoc();

if(isset($datos['num_rem'])){
    //echo "remito existente";
    //echo "<script> Alert('Remito Existente');</script>";

    echo "<script> alert('Remito Existente');
    location.href = '../reparto/cc_rep.php';
    </script>";

}else{

$sql1 = "INSERT INTO `cc_sva` (`id`, `fecha`, `codcliente`, `num_rem`, `total_rem`, `zona`, `saldo`,`anulado`) 
VALUES (NULL, '$fecha', '$cliente', '$num_rem', '$total_remito', '$zona', '$saldo_pendiente','0')";
$query = mysqli_query($conexion, $sql1);
$id_cc = $conexion->insert_id;   
}

if($query){

    if($efectivo>0 || $transf>0){

        $sql2 = "INSERT INTO `cc_pagos` (`id_pago`, `id_cc`, `fecha`, `efectivo`, `transferencia`, `cobrador`) 
    VALUES (NULL, '$id_cc', '$fecha', '$efectivo', '$transf', '$usuario')";
    $query2 = mysqli_query($conexion, $sql2);
    $id_pagos = $conexion->insert_id;
       
        if($transf>0){

            
        $sql3 = "INSERT INTO `transferencia`(`id_tranf`, `id_pagos`, `id_cc`, `fecha`, `usuario`, `monto`, `zona`) 
        VALUES (NULL,'$id_pagos','$id_cc','$fecha','$usuario','$transf','$zona') ";
        $query3 = mysqli_query($conexion, $sql3);
        

        }
    
    
    }
     
   echo "<script> 
    location.href = '../reparto/hrep.php';
   </script>";
}else{
    echo "<script>  alert('Cuenta no Resgistrada');
    location.href = '../reparto/cc_rep.php';
    </script>";
}


$conectar->close();




?>