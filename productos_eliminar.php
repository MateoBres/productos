<?php
    $titulo = 'Producto eliminado!';
    require_once 'encabezado.php';
?>

<div class="mt-3">
  <h1><?php echo $titulo ?></h1>
</div>

<?php
require_once 'clases/Conexion.php';

$link = Conexion::conectar();
$sql = 'DELETE FROM productos WHERE id_producto ='.$_GET['id_producto'];
$stmt = $link->prepare($sql);
$stmt->execute();


header('Location: productos_listado.php');

require_once 'pie.php';
