<?php

session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: index.php');
    die;
} else {
    $usuario_logueado = $_SESSION['usuario'];
}

$titulo = 'Listado de productos';
require_once 'encabezado.php';
?>

<table class="table table-responsive table-striped">
  <thead class="thead-dark">
        <tr>
            <th scope="col">Foto</th>
            <th scope="col">Marca</th>
            <th scope="col">Producto</th>
            <th scope="col">Precio</th>
            <th scope="col">Stock</th>
            <th scope="col">Envio</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <?php

    require_once 'config.php';

    $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
    mysqli_set_charset($link, DB_CHARSET);
    
    $sql =  'SELECT
	id_producto,
    p.nombre,
    m.nombre marca,
    sitio_web,
    c.nombre categoria,
    garantia,
    detalles,
    stock,
    envio,
    precio,
    foto
FROM
	productos p
    JOIN categorias c ON p.id_categoria = c.id_categoria
    JOIN marcas m ON p.id_marca = m.id_marca
ORDER BY
    c.nombre,
    p.nombre
';
$rs = mysqli_query($link, $sql);
    // Check connection
    if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }

    mysqli_close($link);


    $num_filas = mysqli_num_rows($rs);

    while ($fila = mysqli_fetch_assoc($rs)) {
        if (!empty($fila['foto'])) {
            $foto = $fila['foto'];
        } else {
            $foto = 'foto_vacia.jpg';
        }
    ?>
    
            <tr>
            <td class='celda-foto' style='background-color: white;'>
                <img style='max-width: 100px; max-height: 100px;' src="img/productos/<?= $foto ?>" alt="Foto del producto">
            </td>
                <td class='text-center'>
                    <a href="<?=$fila['sitio_web']?>"  target='_blank'><?= $fila['marca'] ?></a>
                </td>
                <td>
                <p>
                    <span  class='h5'>   
                        <?= $fila['nombre'] ?>  
                        <small class='text-muted'>
                        <?= $fila['categoria'] ?>
                        </small>
                    </span>
                    -
                    Garantía: <?= $fila['garantia'] ?> meses
                </p>
                <small class='text-muted'>
                    <?= $fila['detalles'] ?>
                </small>    
                </td>
                
                
                <td class='text-right'><?= '$' . number_format($fila['precio'], 0, ',', '.'); ?></td>
                   
                <td class='text-right'><?= $fila['stock'] ?></td>
                <td class='text-right'><?php
                    if ($fila['envio'] == '1') {
                        echo 'Sí';
                    }
                    ?>
                </td>
                <td>
                    <a href='productos_alta.php?id_producto=<?=$fila['id_producto']?>'>Modificar</a>
                    <a href='productos_eliminar.php?id_producto=<?=$fila['id_producto']?>' onclick="return confirm('Estas segur@ de eliminar?');">Eliminar</a>
                </td>
            </tr>
            
            <?php
    }
    ?>
   
            <tr class='bg-dark text-light text-center'>
                <th colspan='7'>Total Productos encontrados: <?= $num_filas ?></th>
            </tr>
        
    </table>
    <?php
    require_once 'pie.php';
