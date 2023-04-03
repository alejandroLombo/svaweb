<?php
    include ("conexion.php");
    session_start();
     $id = $_SESSION['id_usuario'];
  


     if($_POST){

      $nombre = $_POST['nombre'];
      $direc = $_POST['direccion'];
      $telef = $_POST['telefono'];
      $contacto = $_POST['contacto'];
      $tel_cont = $_POST['tel-contacto'];

      $sql = "INSERT INTO `proveedores`(`id`, `nombre`, `dirección`, `telefono`, `contacto`, `tele_contacto`) 
      VALUES (NULL,'$nombre','$direc','$telef','$contacto','$tel_cont')";
      $query= mysqli_query($conexion,$sql);
}
