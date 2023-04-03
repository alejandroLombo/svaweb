<?php
include "conexion.php";
session_start();

$sql = "SELECT * FROM compras";
$query = mysqli_query($conexion,$sql);
$datos=$query->fetch_all();


$sql1= "SELECT id,nombre FROM proveedores";
$resultado1=$conexion->query($sql1);
$proveedores=$resultado1->fetch_all();

$sql2= "SELECT id,nombre FROM usuarios";
$resultado2=$conexion->query($sql2);
$usuarios=$resultado2->fetch_all();

$sql3= "SELECT `id_zona`, `zona` FROM `zonas` WHERE 1";
$resultado3=$conexion->query($sql3);
$zonas=$resultado3->fetch_all();





?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
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
              
              <li><a class="dropdown-item" href="compras.php">Compras</a></li>
              <li><a class="dropdown-item" href="nota_credito.php">Notas de Credito</a></li>
              <li><a class="dropdown-item" href="nota_debito.php">Notas de Debito</a></li>
              <li><a class="dropdown-item" href="orden_pago.php">Orden de Pago</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="new_prov.php">Lista Provedores</a></li>
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


    <h1>Lista Provedores Sin Abonar</h1>
<div class="container mt-3">
    <div class="row">
        <div class="col-sm-12 col-md-2 col-lg-2 col-xl-2">
            <a class="btn btn-primary"href="new_compra.php">Ingresar Nueva Compra</a>
        </div>
        <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8">
        <table class="table table-bordered">
            <thead class="table-light">
                <tr>
                <th scope="col">#</th>
                <th scope="col">Fecha</th>
                <th scope="col">Fecha Compra</th>
                <th scope="col">Proveedor</th>
                <th scope="col">Total Remito</th>
                <th scope="col">Nº Remito</th>
                <th scope="col">Orden de Pago</th>
                <th scope="col">Usuario</th>
                <th scope="col">Zona</th>

                </tr>
            </thead>
            <?php foreach($datos as $dato){ ?>
            <tbody>
                <tr>
                <th scope="row"><?php echo $dato[0]?></th>
                <td><?php echo $dato[1]?></td>
                <td><?php echo $dato[2]?></td>
                <td><?php foreach($proveedores as $provedor){  
                                if($dato[3]==$provedor[0]){
                                  print_r($provedor[1]."<br>");
                                   }
                              } ?></td>
                <td><?php echo $dato[4]?></td>
                <td><?php echo $dato[5]?></td>
                <td><?php echo $dato[6]?></td>
                
                <td><?php foreach($usuarios as $usuario){ 
                                if($dato[7]==$usuario[0]){
                                  print_r($usuario[1]."<br>");
                                   }
                              } ?></td>

                <td><?php foreach($zonas as $zona){  
                                if($dato[8]==$zona[0]){
                                  print_r($zona[1]."<br>");
                                   }
                              } ?></td>
                </tr>
                
            </tbody>
            <?php } ?>
            </table>

        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>       
</body>
</html>