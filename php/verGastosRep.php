<?php
    date_default_timezone_set('America/Argentina/Cordoba');
    session_start();
    include "conexion.php";

    $zona = $_SESSION['zona'];
    $fecha = date("Y-m-d");





    $sql="SELECT gg.id,cat.tipo,gg.monto,gg.observacion,gg.fecha,gg.zona,gg.usuario 
        FROM gastos gg INNER JOIN catGastos cat ON gg.categoria = cat.id 
        WHERE zona='$zona' AND fecha='$fecha'";   
    //$sql="SELECT * FROM gastos WHERE zona='$zona' AND fecha='$fecha' ";
    $resultado=mysqli_query($conexion,$sql);

     $json = array();
    while($row = mysqli_fetch_array($resultado)){
        $json [] =array(
            'id'=>$row['id'],
            'tipo'=>$row['tipo'],
            'monto'=>$row['monto'],
            'observacion'=>$row['observacion'],
            'fecha'=>$row['fecha'],
            'zona'=>$row['zona'],
            'usuario'=>$row['usuario']
        );
    }
    $jsonstring = json_encode($json);
    echo $jsonstring;
 

  $conexion->close();  
?>