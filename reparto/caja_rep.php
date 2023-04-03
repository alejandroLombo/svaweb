<?php
  session_start();
  include "../php/conexion.php";

  $fecha = date("Y-m-d");
  $zona = $_SESSION['zona'];

  $b1000=$_POST['b1000'];
  $t_b1000=$b1000*1000;
  $b500=$_POST['b500'];
  $t_b500=$b500*500;
  $b200=$_POST['b200'];
  $t_b200=$b200*200;
  $b100=$_POST['b100'];
  $t_b100=$b100*100;
  $b50=$_POST['b50'];
  $t_b50=$b50*50;
  $b20=$_POST['b20'];
  $t_b20=$b20*20;
  $b10=$_POST['b10'];
  $t_b10=$b10*10;
  $t_efectivo=$t_b1000+$t_b500+$t_b200+$t_b100+$t_b50+$t_b20+$t_b10;


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
    //Guardamos Billetes
  if($_POST){

    $sql2="INSERT INTO `Efectivo`(`id`, `id_p_reparto`, `b1000`, `t_b1000`, `b_500`, `t_b500`, `b_200`, `t_b200`, `b_100`, `t_b100`, `b_50`, `t_b50`, `b_20`, `t_b20`, `b_10`, `t_b10`) 
    VALUES (NULL,'$id_reparto','$b1000','$t_b1000','$b500','$t_b500','$b200','$t_b200','$b100','$t_b100','$b50','$t_b50','$b20','$t_b20','$b10','$t_b10')";
    $query2= mysqli_query($conexion,$sql2);
    if($query2){
      header("location:hrep.php");

    }else{
        echo "no se ha podido guardar";

    }

    if($query2){
      //Actualizamos total efectivo
      $sql3="UPDATE p_reparto SET efectivo='$t_efectivo' WHERE id='$id_reparto' ";
    $query3= mysqli_query($conexion,$sql3);
      //Consultamos Suma total Cuentas Corrientes
      $slq4="SELECT SUM(`saldo`) FROM `cc_sva` WHERE fecha='$fecha'";
      $query4= mysqli_query($conexion,$slq4);
      $datos= $query4->fetch_assoc();
      foreach($datos as $dato){
        $t_cc = $dato;
      }
      //Actualizamos total Cuentas Corrientes
      if($query4){
        $sql3="UPDATE p_reparto SET cc_total='$t_cc' WHERE id='$id_reparto' ";
        $query3= mysqli_query($conexion,$sql3);
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
  <div class="col-sm-12 ">
    <div class="mb-3">
    <h1 class=form-label>INGRESE LA CANTIDAD DE BILLETES</h1>
      <form class="form-control" action="<?php echo  htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <label class="form-label"for="b1000">Billestes de 1000</label>
        <input class="form-control" type="number" name="b1000" id="b1000" pattern="['A-Za-z0-9_-']" autocomplete="off" min="0"  require>
        <br>
        <label class="form-label"for="b500">Billestes de 500</label>
        <input class="form-control" type="number" name="b500" id="b500" pattern="['A-Za-z0-9_-']" autocomplete="off" min="0"  require>
        <br>
        <label class="form-label"for="b200">Billestes de 200</label>
        <input class="form-control" type="number" name="b200" id="b200" pattern="['A-Za-z0-9_-']" autocomplete="off" min="0"  require>
        <br>
        <label class="form-label"for="b100">Billestes de 100</label>
        <input class="form-control" type="number" name="b100" id="b100" pattern="['A-Za-z0-9_-']" autocomplete="off" min="0"  require>
        <br>
        <label class="form-label"for="b50">Billestes de 50</label>
        <input class="form-control" type="number" name="b50" id="b50" pattern="['A-Za-z0-9_-']" autocomplete="off" min="0"  require>
        <br>
        <label class="form-label"for="b20">Billestes de 20</label>
        <input class="form-control" type="number" name="b20" id="b20" pattern="['A-Za-z0-9_-']" autocomplete="off" min="0"  require>
        <br>
        <label class="form-label"for="b10">Billestes de 10</label>
        <input class="form-control" type="number" name="b10" id="b10" pattern="['A-Za-z0-9_-']" autocomplete="off" min="0"  require>
        <br>
        <button class="btn btn-success" type="submit">Finalizar Reparto</button>
      </form>
    </div>
  </div>
</div>


      



 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>    
</body>
</html>