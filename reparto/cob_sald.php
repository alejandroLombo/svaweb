<?php
  session_start();
    include "../php/conexion.php";

    //print_r($_SESSION['usuario']);

    if($_POST['confirmar']){

    $id_cc = $_POST['id_cc'];
    $usuario = $_SESSION['usuario'];
    $ftcobrado=$_POST['ftcobrado'];
    $transf=$_POST['transf'];
    $fecha= date("Y-m-d");
    
    if(isset($ftcobrado) || isset($transf)){

      $sql2 = "INSERT INTO `cc_pagos` (`id_pago`, `id_cc`, `fecha`, `efectivo`, `transferencia`, `cobrador`) 
      VALUES (NULL, '$id_cc', '$fecha', '$ftcobrado', '$transf', '$usuario')";
      $query = mysqli_query($conexion, $sql2);
       }
  
    }
    if($query){


      $sqlsaldo = "SELECT saldo FROM cc_sva WHERE id='$id_cc'";
      $query2 = mysqli_query($conexion, $sqlsaldo);
      $res = $query2->fetch_assoc();
      $saldo_pendiente = $res['saldo'];
    
      if(isset($ftcobrado)&&isset($transf)){ 

        $saldo_pendiente=$saldo_pendiente-$ftcobrado-$transf;
    
       }else if(isset($ftcobrado)){

        $saldo_pendiente=$saldo_pendiente-$ftcobrado;
        
        }else if(isset($transf)){
    
        $saldo_pendiente = $saldo_pendiente-$transf;
        
        }else{
    
        print_r($res['saldo']);
    
      }

      $update="UPDATE cc_sva SET saldo='$saldo_pendiente' WHERE id = '$id_cc'";
      $actualiza = mysqli_query($conexion,$update);

      if($actualiza){
        echo "<script> alert('el saldo pendiente es: $saldo_pendiente'); location.href = 'hrep.php'; </script>";
        }else{
          echo "<script>  alert('Pago no Resgistrado'); location.href = 'hrep.php'; </script>";
        }   



    }



    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Distribuidora SVA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="hrep.php">Distribuidora SVA</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="hrep.php">Inicio</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="cc_rep.php">Cuentas Corrientes</a>
              </li>
              <?php if($id_cargo == 2) { ?>
              <li class="nav-item">
                <a class="nav-link" href="descuentos.php">Descuentos y Faltantes</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="gastos.php">Gastos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="caja_rep.php">Planilla Reparto</a>
              </li>

              <?php } ?>
              <li class="nav-item">
                <a class="nav-link btn btn-secondary" href="php/cerrar_session.php">Cerrar Session</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>


<br>
<div class="container">
  <h1>Cobrar Saldo Pendiente</h1>
  
</div>



<div class="container">
    <form class="form-control"action="<?php echo  htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
       <input type="hidden" name="id_cc" value="<?php echo $_GET['id'];?> ">
      <label class="form-control " for="ftcobrado">Ingrese monto COBRADO</label>
      <input class="form-control" type="number" name="ftcobrado" id="" min="0" value="0">
      <br>
      <label class="form-control" for="transf">Ingrese monto TRANSFERIDO</label>
      <input class="form-control" type="number" name="transf" id="" min="0" value="0">
      <br>
      <input class="btn btn-success"type="submit" value="Confirmar" name="confirmar">
      <a class="btn btn-warning" href="hrep.php">Regresar</a>
    </form>

</div>

 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>    
</body>
</html>

