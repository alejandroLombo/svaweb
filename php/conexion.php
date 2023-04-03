<?php

    $servidor = "localhost";
    $usuario = "root";
    $password = "";
    $base = "base sva";

    $conexion = new mysqli($servidor,$usuario,$password,$base);

    

    if($conexion->connect_error){
        die("error de conexion: ".$conexion->connect_error);
    }

    



?>