<?php
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
</head>
<body>
    <h1>Generar Nueva Orden de Pago</h1>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                <form action="" class="form-control">
                    <label for="zona">Seleccione zona</label>
                    <select class= "form-control" id="" name="zona">
                        <option value=""></option>
                    </select><br>
                    <label for="id_prov">Seleccione proveedor</label>
                    <select class= "form-control" id="" name="id_prov">
                        <option value=""></option>
                    </select><br>
                    <label for="">Total</label>
                    <input class= form-control type="number" name="monto" id=""><br>
                    <label for="">Nota Debito</label>
                    <input class= form-control type="number" name="num_nd" id=""><br>
                    <label for="">Seleccione Orden de Pago</label>
                    <select class= form-control name="id_ordenpago" id=""></select>
                        <option value=""></option>
                </form>
            </div>
        </div>
    </div>

</body>

</html>