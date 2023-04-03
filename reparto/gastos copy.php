<?php

include "conexion.php";
session_start();

$id_cargo = $_SESSION['id_cargo'];
$zona = $_SESSION['zona'];


$motivo = $_POST['motivo'];
$monto = $_POST['monto'];
$quien = $_POST['personal'];
$fecha = date("Y-m-d");




if (isset($monto)) {

  
  $sql = "INSERT INTO `gastos` (`id`, `motivo`, `monto`, `quien`,`fecha`,`zona`) 
          VALUES (NULL, '$motivo', '$monto', '$quien','$fecha','$zona')";

  $query = mysqli_query($conexion, $sql);

}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulario de Gastos</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="hrep.php">Distribuidora SVA</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
          <?php if ($id_cargo == 2) { ?>
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

  <div class="container">
    <h1>Ingrese Gastos del Reparto</h1>
    <div class="row">
      <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
        <form class="form-control" action="" method="post">
          <label class="form-label" for="motivo">Motivo</label>
          <input class="form-control" type="text" name="motivo" id="">
          <br>
          <label class="form-label" for="monto">Monto</label>
          <input class="form-control" type="number" name="monto" id="" min="0">
          <br>
          <label class="form-label" for="personal">Quien lo realizo?</label>
          <input class="form-control" type="text" name="personal" id="" placeholder="Quien gasto?">
          <br>

          <input class="btn btn-success" type="submit" value="Enviar">

        </form>

      </div>
    </div>


  </div>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>

</body>

</html>