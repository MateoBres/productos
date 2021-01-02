<?php

session_start();
if (isset($_SESSION['usuario'])) {
    $usuario_logueado = $_SESSION['usuario'];
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'] ?? '';
    $password = $_POST['password'] ?? '';

    require_once 'clases/Conexion.php';
    $link = Conexion::conectar();
    $sql = "SELECT * FROM usuarios WHERE username = '$usuario' AND password = '$password'";
    $stmt = $link->prepare($sql);
    $stmt->execute();

    $datos_usuario = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
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

