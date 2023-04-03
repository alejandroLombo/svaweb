<?php
    include "conexion.php";

    $fecha= $_POST['fecha'];
    $newFecha1=str_replace("/","-",$fecha);
    $newFecha = date("Y-m-d",strtotime($newFecha1));
    $vendedor=$_POST['vendedor'];
    $lista1 = $_POST['lista1'];
    $lista2 = $_POST['lista2'];
    $lista3 = $_POST['lista3'];
    $lista4 = $_POST['lista4'];
    $lista5 = $_POST['lista5'];
    $lista6 = $_POST['lista6'];
    $lista7 = $_POST['lista7'];
    $lista8 = $_POST['lista8'];
    $total = $_POST['Total'];

    $sqlConsulta="SELECT id FROM `ventas` WHERE `fecha` LIKE '$newFecha'";
    $query=$conexion->query($sqlConsulta);

    if($query == false){

        $sql="INSERT INTO `ventas`(`id`, `fecha`, `vendedor`, `lista1`, `lista2`, `lista3`, `lista4`, `lista5`, `lista6`, `lista7`, `lista8`, `total`) 
        VALUES (NULL,'$newFecha','$vendedor','$lista1','$lista2','$lista3','$lista4','$lista5','$lista6','$lista7','$lista8','$total')";
        $resultado = $conexion->query($sql);
        
    }else{
        echo "Estas ventas ya estan cargadas";
    }
    

?> 