<?php
    include "conexion.php";

    $vendedor=$_POST['Florencia'];


   
        $sqlComision="SELECT comision FROM `usuarios` WHERE `nombre` LIKE '$vendedor'";
        $query1=$conexion->query($sqlComision);
        print_r($query1);
        foreach($query1 as $elementos){
            print_r($elementos);
        };
        










     
    

?>