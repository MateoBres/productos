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
require_once 'config.php';

$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
mysqli_set_charset($link, DB_CHARSET);
$sql = 'SELECT * FROM categorias';
$rs = mysqli_query($link, $sql);

// Check connection
if (mysqli_connect_errno()) {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

mysqli_close($link);


$num_filas = mysqli_num_rows($rs);
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
  while ($fila = mysqli_fetch_assoc($rs)) {
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
          <th colspan='2' style='text-align:center;'>Total categorias: <?= $num_filas ?></th>
      </tr>
  </tbody>
</table>
  <?php
  require_once 'pie.php';
