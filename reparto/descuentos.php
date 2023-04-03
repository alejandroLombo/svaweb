<?php
  session_start();

  $id_cargo = $_SESSION['id_cargo']; 

  
  include "php/conexion.php";

  $fecha = date("Y-m-d");
  $zona = $_SESSION['zona'];


    //Buscamos si hay Algun Reparto Por la fecha y la Zona
    $sql="SELECT * FROM p_reparto WHERE fecha='$fecha' and zona='$zona'";
    $query= mysqli_query($conexion,$sql);
    $datos= $query->fetch_assoc();
    
    //si hay recuperamos el id
    if($datos['zona']==$zona){
  
        $id_reparto = $datos['id'];
  
    }else{
      //Creamos Reparto para poder Asociar Planilla de Billetes
      $sql1="INSERT INTO `p_reparto`(`id`, `fecha`, `efectivo`, `transferencia`, `gastos`, `descuentos`, `faltantes`, `cc_total`, `zona`) VALUES 
      (NULL,'$fecha',NULL,NULL,NULL,NULL,NULL,NULL,'$zona')";
    $query1= mysqli_query($conexion,$sql1);
    $id_reparto = $conexion->insert_id;
  
    }



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Descuentos</title>
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
              </li>              <?php if($id_cargo == 2) { ?>
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
                <a class="nav-link" href="php/cerrar_session.php">Cerrar Session</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <br>
      <br>

<!---Body------>

<div class="container">
  <div class="row">
    <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
      <h1>Ingrese Descuento-Faltante</h1>
      <form class="form-control" action="" method="post">
        <select class="form-control" name="ford" id="">Selecciones Accion
        <option value="1">Descuento</option>
        <option value="2">Faltante</option>
        </select>
        <label for="cliente">Ingrese Cliente</label>
        <input class="form-control" type="text" name="cliente" id="">
        <label for="producto">Ingrese Producto</label>
        <input class="form-control" type="text" name="producto" id="">
        <label for="t_unidad">Total por unidad</label>
        <input class="form-control" type="number" name="t_unidad" id="" min="0">
        <label for="cantidad">Cantidad</label>
        <input class="form-control" type="number" name="cantidad" id="" min="0">
        <input class="btn btn-success mt-2" type="submit" value="Realizar">


      </form>
    </div>  
  </div>
</div>
      



 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>    
</body>
</html>