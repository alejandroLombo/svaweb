<?php
  include "../php/extraer.php"; 
  session_start();

  $id_cargo = $_SESSION['id_cargo'];


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
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

              <li class="nav-item">
                <a class="nav-link" href="saldos_cobrados.html">Saldos Cobrados</a>
              </li>
              <?php if($id_cargo == 2) { ?>
              <li class="nav-item">
                <a class="nav-link" href="descuentos.php">Descuentos y Faltantes</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="gastos.php">Gastos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.html">Planilla Reparto</a>
              </li>

              <?php } ?>

              <li class="nav-item">
                <a class="nav-link" href="cambiar_pass.php">Cambiar Clave</a>
              </li>
              <li class="nav-item">
                <a class="nav-link btn btn-secondary" href="../php/cerrar_session.php">Cerrar Session</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>



      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
            
          </div>
          <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8">
            <h1>Lista de Clientes Con Saldo Pendientes</h1>
            <h1>Usuario: <?php echo $_SESSION['usuario'];?></h1>
          </div>
          <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
            
          </div>
        </div>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8">
            <table class="table table-bordered">
                <thead class="table-light">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Cliente</th>
                    <th scope="col">Saldo</th>
                    <th scope="col">Acciones</th>
                  </tr>
                </thead>
                <?php foreach($datos as $dato){
                  echo $dato[7]; ?>
                <tbody>
                  <?php if($dato[7]!= '1'){ ?>
                  <tr>
                    <th scope="row"> <?php echo $dato[0]; ?></th>
                    <td><?php echo $dato[1]; ?></td>
                    <td><?php echo $dato[2]; ?></td>
                    
                    <td><?php echo $dato[6]; ?></td>
                    <td><a class="btn btn-primary" href="cob_sald.php?id=<?php echo $dato[0]; ?>">Cobrar Saldo</a></td>
                  </tr>
                  <?php } ?>                       
                </tbody>
                <?php } ?>
              </table>
          </div>
          
        </div>
      </div>


 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>    
</body>
</html>