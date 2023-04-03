<?php
    include "conexion.php";

    if(isset($_POST)){  

        $id = $_POST['id'];
        
    $sql="UPDATE `cc_sva` SET `anulado`='1' WHERE `id`='$id' ";
    $query= mysqli_query($conexion,$sql);
    if(!$query){
        die('Anulacion Fallida');
    }

    echo "Anulado";



    }


?>