<?php

session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: index.php');
    die;
} else {
  $usuario_logueado = $_SESSION['usuario'];
}

$titulo = 'Listado de categorias';
require_once 'encabezado.php';
require_once 'clases/Conexion.php';

$link = Conexion::conectar();
$sql = 'SELECT * FROM categorias';
$stmt = $link->prepare($sql);
$stmt->execute();
$filas = $stmt->fetchAll(PDO::FETCH_ASSOC)
?>
<br>
<table class="table table-striped col-md-6">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Nombre</th>
      <th scope="col">Acción</th>
    </tr>
  </thead>
  <?php
  $num_filas =0;
  foreach ($filas as $fila) {
    $num_filas++;
  ?>
    
      <tr>
        <td><?= $fila['nombre'] ?></td>
          <td>
            <a href='categorias_alta.php?id_categoria=<?=$fila['id_categoria']?>'>Modificar</a>
            <br>
            <a href='categorias_eliminar.php?id_categoria=<?=$fila['id_categoria']?>' onclick="return confirm('Estas segur@ de eliminar?');">Eliminar</a>
          </td>
      </tr>
  <?php
  }
  ?>
      <tr>
          <th colspan='5' style='text-align:center;'>Total marcas: <?= $num_filas ?></th>
      </tr>
      
  </tbody>
</table>
  <?php
  require_once 'pie.php';
