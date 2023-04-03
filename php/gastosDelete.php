<?php
    include "conexion.php";

    if(isset($_POST)){  

        $id = $_POST['id'];
        
    $sql="DELETE FROM `gastos` WHERE `id`='$id' ";
    $query= mysqli_query($conexion,$sql);
    if(!$query){
        die('Anulacion Fallida');
    }

    echo "Anulado";



    }

    $conexion->close();
?>