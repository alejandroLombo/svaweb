<?php
    include "conexion.php";



    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    session_start();
     
    
        $_SESSION['usuario']= $usuario;


    $sql= "SELECT * FROM usuarios WHERE usuario='$usuario' and password='$password'";
    $resultado=mysqli_query($conexion,$sql);

    $fila=mysqli_fetch_array($resultado);
    $_SESSION['id_usuario']=$fila['id'];
    $_SESSION['nombre_usuario'] =$fila['nombre'];
    $_SESSION['zona']=$fila['zona'];
    $_SESSION['id_cargo']=$fila['id_cargo'];
    


    print_r($fila['id_cargo']);
    if($fila['id_cargo']==1){
        header("location:../admin/hadmin.html");
    }
    if($fila['id_cargo']==2){
        header("location:../reparto/hrep.php");
    }
    if($fila['id_cargo']==3){
        header("location:../admin/hadmin.html");
    }
    if($fila['id_cargo']==4){
        header("location:../reparto/hrep.php");
    }
    if($fila['id_cargo']==5){
        header("location:../hadmin.html");
    }else{
        echo "<script> alert('Usuario o Contraseña Incorrectos');
         location.href = '../index.html';
         </script>";
    }



    


    
    //$resultado=$conexion->query($sql);
    //$datos=$resultado->fetch_all();
    


?>