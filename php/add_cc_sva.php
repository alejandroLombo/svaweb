<?php
date_default_timezone_set('America/Argentina/Cordoba');
 require_once 'conexion.php';
 session_start();
   
 $saldo_pendiente = 0;
 $cliente=$_POST['cliente'];
 $num_rem=$_POST['n_remito'];
 $total_remito=$_POST['t_remito'];
 $efectivo = $_POST['efectivo'];
 $transf=  $_POST['transf'];
 $fecha= date("Y-m-d");
 $usuario = $_SESSION['usuario'];
 $zona = $_SESSION['zona'];

// echo $cliente." ".$num_rem." ".$total_remito." ".$efectivo." ".$transf;

if(isset($efectivo)&&isset($transf)){ 

    $saldo_pendiente=$total_remito-$efectivo-$transf;

}else if(isset($efectivo)){
    $saldo_pendiente=$total_remito-$efectivo;

}else if(isset($transf)){

    $saldo_pendiente = $total_remito-$transf;
}else{

    $saldo_pendiente= $total_remito;

}
 
$sql = "SELECT * FROM cc_sva WHERE num_rem='$num_rem' and anulado='0'";
$resultado = mysqli_query($conexion, $sql);
$datos= $resultado->fetch_assoc();

if(isset($datos)){
    //echo "remito existente";
    //echo "<script> Alert('Remito Existente');</script>";
echo "remito Existente";

}else{

$sql1 = "INSERT INTO `cc_sva` (`id`, `fecha`, `codcliente`, `num_rem`, `total_rem`, `zona`, `saldo`,`anulado`) 
VALUES (NULL, '$fecha', '$cliente', '$num_rem', '$total_remito', '$zona', '$saldo_pendiente','0')";
//echo $sql1;
$query = mysqli_query($conexion, $sql1);
$id_cc = $conexion->insert_id;   

if(!$query){
    die('No Agregado Fallida');
}

echo "Agregado";


if($query){

    if(isset($efectivo) || isset($transf)){

        $sql2 = "INSERT INTO `cc_pagos` (`id_pago`, `id_cc`, `fecha`, `efectivo`, `transferencia`, `cobrador`) 
    VALUES (NULL, '$id_cc', '$fecha', '$efectivo', '$transf', '$usuario')";
    $query2 = mysqli_query($conexion, $sql2);
    $id_pagos = $conexion->insert_id;
    if(!$query2){
        die('Pago No Registrado');
    }
    
    echo "Pago Registrado";
    
    }  

    

     
  
}else{
    
    echo "no insertado";
}


$conectar->close();

}


?>