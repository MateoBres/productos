<?php

session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: index.php');
    die;
}  else {
  $usuario_logueado = $_SESSION['usuario'];
}

$titulo = 'Listado de marcas';
require_once 'encabezado.php';
require_once 'config.php';

$link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
mysqli_set_charset($link, DB_CHARSET);
$sql = 'SELECT * FROM marcas';
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
      <th scope="col">Sitio web</th>
      <th scope="col">Telefono</th>
      <th scope="col">Observaciones</th>
      <th scope="col">Acción</th>
    </tr>
  </thead>
  <?php
  while ($fila = mysqli_fetch_assoc($rs)) {
  ?>
    
      <tr>
        <td><?= $fila['nombre'] ?></td>
        <td><?= $fila['sitio_web'] ?></td>
        <td><?= $fila['telefono'] ?></td>
        <td><?= $fila['observaciones'] ?></td>
        <td>
            <a href='marcas_alta.php?id_marca=<?=$fila['id_marca']?>'>Modificar</a>
            <br>
            <a href='marcas_eliminar.php?id_marca=<?=$fila['id_marca']?>' onclick="return confirm('Estas segur@ de eliminar?');">Eliminar</a>
          </td>
      </tr>
   
  <?php
  }
  ?>
      <tr>
          <th colspan='5' style='text-align:center;'>Total marcas: <?= $num_filas ?></th>
      </tr>
  
</table>
  <?php
  require_once 'pie.php';
