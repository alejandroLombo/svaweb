
<?php
    include ("conexion.php");
    session_start();
    $id_usuario = $_SESSION['id_usuario'];
 
    $provedor = $_POST['provedores'];
    $f_compra = $_POST['f_compra'];
    $n_rem = $_POST['n-remito'];
    $t_rem = $_POST['monto'];
    $zona = $_POST['zona'];
    $fecha = date("Y-m-d");
    


    $sql = "SELECT id, nombre FROM proveedores ORDER BY nombre ASC";
    $resultado=$conexion->query($sql);
    
    $sql1 = "SELECT `id_zona`, `zona` FROM `zonas` WHERE 1";
    $resultado1=$conexion->query($sql1);
    
    $sql2 = "SELECT * FROM `compras`";
    $resultado2=$conexion->query($sql2);
    $datos = $resultado2->fetch_assoc();

    if($_POST){

    $sql3 = "SELECT * FROM `compras` WHERE `num_fac` = '$n_rem' and `id_prov`='$provedor'";
    $resultado3=$conexion->query($sql3);
    $remito = $resultado3->fetch_assoc();
    print_r($remito['num_fac']);
    

 if(isset($remito['num_fac']) ){

      echo "<script> alert('Remito Existente');
      location.href = 'compras.php';
      </script>";
  
}else{

  $sql3="INSERT INTO `compras`(`id`, `fecha`, `fecha_compra`, `id_prov`, `monto`, `num_fac`, `orden_pago`, `usuario`, `zona`) 
  VALUES (NULL,'$fecha','$f_compra','$provedor','$t_rem','$n_rem',NULL,'$id_usuario','$zona')"; 
  $query3= mysqli_query($conexion,$sql3);
  if($query3){
    header("location:compras.php");
  }

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
          <a class="navbar-brand" href="hadmin.php">Distribuidora SVA</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Repartos
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="#">Descuentos y Faltantes</a></li>
              <li><a class="dropdown-item" href="#">Gastos de Repartos</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Billetes</a></li>
              </ul>
              </li>
              <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Cuentas Corrientes
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
              </ul>
              </li>
              <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Provedores
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="new_prov.php">Lista Provedores</a></li>
              <li><a class="dropdown-item" href="compras.php">Compras</a></li>
              <li><a class="dropdown-item" href="nota_credito.php">Notas de Credito</a></li>
              <li><a class="dropdown-item" href="nota_debito.php">Notas de Debito</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="orden_pago.php">Orden de Pago</a></li>
              </ul>
              </li>
              <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Usuarios
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="#">Nuevo Usuario</a></li>
              <li><a class="dropdown-item" href="#">Editar Usuario</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Personal</a></li>
              </ul>
              </li>
            
              <li class="nav-item">
                <a class="nav-link" href="php/cerrar_session.php">Cerrar Session</a>
              </li>
              
             
            </ul>
          </div>
        </div>
      </nav>


<div class="container">
    <div class="row ">
        <div class="col-sm-12 col-md-4 col-xl-4 col-lg-4">
            <h1>Ingrese Nueva Factura</h1>
            <form class="form-control"action="<?php echo  htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
              <label for="provedores mt-2">Provedor</label>
              <select class="form-select" aria-label="Default select example" name="provedores">
              <option selected><--Selecione Provedor---></option>
              <?php while($row = $resultado->fetch_assoc()){ ?>

                  <option value="<?php echo $row['id']; ?>"><?php  echo($row['nombre']); ?></option>
            
                <?php } ?>
                </select>
                <label for="f_compra">Fecha de Compra</label>
              <input class="form-control mt-2"type="date" name="f_compra" id="">
              <label for="n-remito">Nº de Remito</label>
              <input class="form-control mt-2"type="number" name="n-remito" id="">
              <label for="monto">Total del Remito</label>
              <input class="form-control mt-2" type="number" name="monto" id="">
              <select class="form-select mt-2" aria-label="Default select example" name="zona">
              <option selected>--Selecione Zona--</option>
              <?php while($row1 = $resultado1->fetch_assoc()){ ?>

                  <option value="<?php echo $row1['id_zona']; ?>"><?php  echo($row1['zona']); ?></option>
            
                <?php } ?>
                </select>
              <input class="btn btn-primary mt-4" type="submit" name="" id="" value="Ingresar Compra">
                <a class="btn btn-warning" href="compras.php">Regresar a Compras</a>


            </form>
         </div>
      </div>
</div>

      
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>    
</body>
</html>