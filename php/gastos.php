<?php
date_default_timezone_set('America/Argentina/Cordoba');
include "conexion.php";
session_start();

$id_usuario = $_SESSION['id_usuario'];
$zona = $_SESSION['zona'];


$categoria = $_POST['catgastos'];
$observacion = $_POST['observacion'];
$monto = $_POST['efectivo'];
$fecha = date("Y-m-d");




if (isset($monto)) {

  
  $sql = "INSERT INTO `gastos`(`id`, `categoria`, `monto`, `observacion`, `fecha`, `zona`, `usuario`) 
  VALUES (NULL,'$categoria','$monto','$observacion','$fecha','$zona','$id_usuario')";
  echo $sql;
  $query = mysqli_query($conexion, $sql);

  echo "registro exitoso";

}

?>
