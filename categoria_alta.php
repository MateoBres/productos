<?php
require_once 'encabezado.php';
if(isset($_GET['submit'])){}

if(isset($_GET['id_categoria'])){

}
?>

<form action="#">
    <div class="form-group col-md-8">
        <label for="nombre">Nombre categoria:</label>
        <input type="text" class="form-control" id="nombre" name="nombre" autofocus value="<?= $nombre ?>">
    </div>
    <input type="submit" class="btn btn-success" name='submit' value="<?= $textoBoton ?>">
</form>






<?
require_once 'pie.php';