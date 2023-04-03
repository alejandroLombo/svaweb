<?php
date_default_timezone_set('America/Argentina/Cordoba');

include "conexion.php";

session_start();
$usuario = $_SESSION['id_usuario'];
$zona = $_SESSION['zona'];
$fecha= date("Y-m-d");
//$validar=$_POST['new'];
$validar = '1';



if($validar == 1 ){

    $sqlC="SELECT `id` FROM `p_reparto` WHERE `fecha`='$fecha' AND `zona`='$zona' AND `usuario`= '$usuario'";
    //$sqlC="SELECT `id` FROM `p_reparto` WHERE `fecha`='$fecha' AND `zona`='$zona' AND `usuario`= '$usuario'";
    $consulta = mysqli_query($conexion, $sqlC);
    //echo $sqlC;
    $json=array();
    while($row = mysqli_fetch_array($consulta)){
        //echo $row[0];
        $json [] =array(
            'id'=>$row[0]
            
        );
    }
    $idReparto= $json[0]['id'];
    $jsonstring = json_encode($json);
    //echo"<br>";
    //echo $idReparto;
    
    
    
    if(isset($idReparto)){
        
        echo $jsonstring;
        
    }else{
        $sql="INSERT INTO `p_reparto`(`id`, `fecha`, `efectivo`, `transferencia`, `gastos`, `descuentos`, `faltantes`, `cc_total`, `zona`,`usuario`) 
        VALUES (NULL,'$fecha','0','0','0','0','0','0','$zona','$usuario')";
        $resultado = mysqli_query($conexion, $sql);
    
        if($resultado){
    
            echo "Reparto Iniciado";
    
        }

    }



    


}else{

    echo "no hay post";
    echo $usuario."<br>";
    echo $zona."<br>";
    echo $fecha."<br>";

}

$conexion->close();
?>