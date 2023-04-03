<?php
    include "conexion.php";

    if($_POST){

    $nombre=$_POST['nombre'];
    $direccion=$_POST['direccion'];
    $telefono=$_POST['telefono'];
    $contacto=$_POST['contacto'];
    $telContacto=$_POST['telContacto'];


    $sql="INSERT INTO `proveedores` (`id`, `nombre`, `direccion`, `telefono`, `contacto`, `tele_contacto`) 
    VALUES (NULL, '$nombre', '$direccion', '$telefono', '$contacto', '$telContacto')";
    $resultado = $conexion->query($sql);

    }


?>