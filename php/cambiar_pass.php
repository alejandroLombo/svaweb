<?php
    include ("conexion.php");
    session_start();
    $id = $_SESSION['id_usuario'];
    if($_POST){

    $new_pass = $_POST['newpass'];

    
    $sql="UPDATE `usuarios` SET `password`='$new_pass' WHERE `id`='$id'";

    $resultado=mysqli_query($conexion,$sql);

    if($resultado){
       echo "<script> alert('Contraseña actualizada correctamente') </script>";
       header("location: hrep.php");
    }else{
        echo "<script> alert('Contraseña no pudo ser actualizada') </script>";
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


<div class="container">
    <div class="row ">
        <div class="col-sm-12 col-md-4 col-xl-4 col-lg-4">

        </div>
        <div class="col-sm-12 col-md-4 col-xl-4 col-lg-4 mt-3">
            <form action="<?php echo  htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <label for="newpass">Ingrese Nueva Contraseña</label>
                <input class="form-control" type="text" name="newpass" id="" require>
                <input class="btn btn-success mt-3" type="submit" value="Cambiar Contraseña">
                <a class="btn btn-warning mt-3" href="hrep.php">Regresar</a>
            </form>
            
        </div>
    </div>
</div>
    
</body>
</html>