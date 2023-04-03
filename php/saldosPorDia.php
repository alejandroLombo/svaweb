<?php
include "conexion.php";


$fecha=$_POST['fecha'];
$zona=$_POST['zona'];

$sql="SELECT cc.id,cc.fecha,cli.nombre,cc.num_rem,cc.total_rem,cc.saldo 
FROM cc_sva cc INNER JOIN clientes cli ON cc.codcliente = cli.codigo 
WHERE cc.zona = '$zona' and cc.fecha='$fecha'";
$queryConsulta=$conexion->query($sql);

$json = array();
while($row = mysqli_fetch_array($queryConsulta)){
    $json [] =array(
        'id'=>$row['id'],
        'cliente'=>$row['nombre'],
        'remito'=>$row['num_rem'],
        'saldo'=>$row['saldo']
    );
}
$jsonstring = json_encode($json);
    echo $jsonstring;

$conexion->close();













?>