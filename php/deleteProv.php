<?php
    include "conexion.php";

    $id=$_POST['id'];

    $sql="DELETE FROM `proveedores` WHERE id='$id'";
    $resultado = $conexion->query($sql);




    $conexion->close();


?>