<?php
    $titulo = 'Producto eliminado!';
    require_once 'encabezado.php';
?>

<div class="mt-3">
  <h1><?php echo $titulo ?></h1>
</div>

<?php

require_once 'config.php';

$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
mysqli_set_charset($link, DB_CHARSET);

$sql = 'DELETE FROM productos WHERE id_producto ='.$_GET['id_producto'];

$rs = mysqli_query($link, $sql);

mysqli_close($link);

header('Location: productos_listado.php');

require_once 'pie.php';
