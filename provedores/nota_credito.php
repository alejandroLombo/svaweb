<?php
require_once('../html/head_3.html');
?>

    <h1>Carga Notas de Credito</h1>
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                <div class="card">
                    <div class="card-body">
                    <form action="" class="form-control">
                        <label for="id_prov">Seleccione proveedor:</label>
                        <select class= form-control id="" name="id_prov">
                            <option value=""></option>
                        </select><br>
                        <label for="">Total:</label>
                        <input class= form-control type="number" name="monto" id=""><br>
                        <label for="">Nota Credito</label>
                        <input class= form-control type="number" name="num_nc" id=""><br>
                        <label for="">Selecciones Boleta</label>
                        <select class= form-control name="id_compra" id="">
                            <option value=""></option>
                        </select><br>
                        <input class="btn btn-success" type="submit" value="Agregar" id="newNc">   
                
                    </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-8 col-lg-8 col-xl-8" >

            </div>
        </div>
    </div>

    <script src="../js/nc.js"></script>

    <?php
require_once('../html/footer.html');
?>