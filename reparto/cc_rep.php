<?php
  session_start();
        include "../php/conexion.php";
        //include "ejercicio1.php";
    
        /* echo $_SESSION['usuario'];
        echo "   ";
        echo $_SESSION['zona']; */
    
        //$sql= "SELECT codigo, nombre FROM clientes ORDER BY nombre asc";
        $sql = "SELECT codigo, nombre FROM clientes ORDER BY nombre ASC";
        $resultado=$conexion->query($sql);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cuentas Corrientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

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
                <a class="nav-link" href="descuentos.php">Descuentos y Faltantes</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="gastos.php">Gastos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="caja_rep.php">Planilla Reparto</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../php/cerrar_session.php">Cerrar Session</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

<div class="conteiner">
    <div class="row g-3">
        <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">

          <h1>Ingrese Cuenta Corriente</h1>
            
          <form class="form-control" action="../php/insertar.php" method="post">
    
          <label class="form-label" for="cliente">Cliente</label>
          <select class="form-select" aria-label="Default select example" name="cliente" id="clientes">
          <!-- <option selected><--Selecione Cliente---></option> -->
          <?php while($row = $resultado->fetch_assoc()){ ?>

             <option value="<?php echo $row['codigo']; ?>"><?php  echo($row['nombre']); ?></option>
            
          <?php } ?>
          </select>
          <br/>
          <label class="form-label" for="num_remito">Nº de Remito</label>
          <input class="form-control"type="number" name="num_remito" id="" min="0">
          <br/>
          <label class="form-label"for="total_remito">Total del Remito</label>
          <input class="form-control"type="number" name="total_remito" id="" min="0">
          <br/>
          <label class="form-label" for="efectivo">Efectivo</label>
          <input class="form-control"type="number" name="efectivo" id="" value="0" min="0">
          <br/>
          <label class="form-label" for="trans">Transferencia</label>
          <input class="form-control"type="number" name="transf" id="" value="0" min="0">
          <br/>
          <input class="btn btn-success" type="submit" value="Enviar">
          
          </form>
        </div>
    </div>
</div>
    



    
    <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="../js/cc_rep.js"></script>


</body>
</html>
