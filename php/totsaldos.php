<?php
 include "conexion.php";

 $sql="SELECT SUM(saldo) 
 FROM cc_sva  WHERE saldo != '0' and anulado = '0'";
 $resultado=$conexion->query($sql);
 //$datos=$resultado->fetch_all();
 $json = array();
 while($row = mysqli_fetch_array($resultado)){
     $json [] =array(
         'saldo_tot'=>$row[0]
         
        );
    }

    $saldotot =$json[0]['saldo_tot'];
    //echo "el saldo total es: ".$saldotot;   
    
    $sql1="SELECT SUM(saldo) 
    FROM cc_sva  WHERE saldo != '0' and zona = '1' and anulado = '0' ";
    $resultado1=$conexion->query($sql1);
    $json1 = array();
    while($row = mysqli_fetch_array($resultado1)){
        $json1 [] =array(
            'saldo_r2'=>$row[0]
            
        );
    }
    $saldoR2 =$json1[0]['saldo_r2'];
    //echo "el saldo total de R2 es: ".$saldoR2;

    $sql2="SELECT SUM(saldo) 
    FROM cc_sva  WHERE saldo != '0' and zona = '2' and anulado = '0' ";
    $resultado2=$conexion->query($sql2);
    $json2 = array();
    while($row = mysqli_fetch_array($resultado2)){
        $json2 [] =array(
            'saldo_onc'=>$row[0]
            
        );
    }

    $saldOnc =$json2[0]['saldo_onc'];
    //echo "el saldo total de Onc es: ".$saldOnc;
    
    $superjson = array();
    $superjson [] = array($saldotot,$saldoR2,$saldOnc);
    
    $jsonstring = json_encode($superjson);
    echo $jsonstring;

    $conexion->close();


?>