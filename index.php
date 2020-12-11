<?php

session_start();
if (isset($_SESSION['usuario'])) {
    $usuario_logueado = $_SESSION['usuario'];
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'] ?? '';
    $password = $_POST['password'] ?? '';

    require_once 'config.php';
    $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
    mysqli_set_charset($link, DB_CHARSET);

    $usuario = mysqli_real_escape_string($link, $usuario);
    $password = mysqli_real_escape_string($link, $password);

    $sql = "SELECT * FROM usuarios WHERE username = '$usuario' AND password = '$password'";

    $rs = mysqli_query($link, $sql);

    mysqli_close($link);
    $datos_usuario = mysqli_fetch_assoc($rs);
//    var_dump($datos_usuario);
    if ($datos_usuario) {
        $_SESSION['usuario'] = $usuario;

        // redirigimos al usuario al listado de productos
        header('Location: productos_listado.php');
        die;
    } else {
        $mensajeError = 'Usuario y/o contraseña incorrectos.';
    }

}
if(isset($usuario_logueado)){
    $titulo = 'Logged';
}else {
    $titulo = 'Login';
}

require_once 'encabezado.php';
?>



<?php if (!empty($mensajeError)) : ?>
    <div class="alert alert-danger" role="alert">
        <?= $mensajeError ?>
    </div>
<?php endif; ?>

<?php
if (!isset($usuario_logueado)) {
    include 'index_form.php';
}
require_once 'pie.php';

