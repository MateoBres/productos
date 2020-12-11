<?php
if (!isset($titulo)) {
    $titulo = 'Proyecto Integrador';
}
?>
<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="Proyecto Integrador">
       
        <div class="mt-3 ml-5 p-3">
            <h1><?php echo $titulo ?></h1>
        </div>

        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <link href="css/estilos.css" rel="stylesheet">
    </head>
    <body>
        <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
            <a class="navbar-brand" href="index.php">Proyecto Integrador</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="productos_alta.php">Alta de productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="productos_listado.php">Listado de productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="categorias_listado.php">Listado de categorias</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="marcas_listado.php">Listado de marcas</a>
                    </li>
                    <?php
                    if (isset($usuario_logueado)) : ?>
                        <li class='nav-item'>
                        <a class='nav-link' href='salir.php'>Logout (<?= $usuario_logueado?>)</a>
                    </li>
                    <?php endif ?>
                </ul>
            </div>
        </nav>

        <main role="main" class="container">
