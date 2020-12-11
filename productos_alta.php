<?php
    session_start();
if (!isset($_SESSION['usuario'])) {
    header('Location: index.php');
    die;
} else {
    $usuario_logueado = $_SESSION['usuario'];
}


    require_once 'funciones.php';
    require_once 'config.php';

    $nombre = '';
    $precio = '';
    $stock = '';
    $categoria = '';
    $marca = '';
    $garantia = '';
    $envio = '0';
      // Verifico que el valor sea siempre 0 o 1
    if($envio !== '1'){
        $envio = '0';
    }
    $detalles = '';
    $errores = '';
    $titulo = 'Alta de productos';
    $textoBoton = 'Dar de alta';

    if(isset($_GET['id_producto'])){
        $titulo = 'Editar producto';
        $textoBoton = 'Modificar';
        $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
        mysqli_set_charset($link, DB_CHARSET);
        $sql =  'SELECT * FROM productos WHERE id_producto = ' . $_GET['id_producto'];
        $rs = mysqli_query($link, $sql);
        mysqli_close($link);
        $producto = mysqli_fetch_assoc($rs);
        $nombre = $producto['nombre'];
        $precio = $producto['precio'];
        $stock = $producto['stock'];
        $categoria = $producto['id_categoria'];
        $marca = $producto['id_marca'];
        $garantia = $producto['garantia'];
        $envio = $producto['envio'];
        $detalles = $producto['detalles'];
        
   }


    
    require_once 'encabezado.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['nombre'])) {
        $nombre = trim($_POST['nombre']);
    }
    if (isset($_POST['precio'])) {
        $precio = trim($_POST['precio']);
    }
    if (isset($_POST['stock'])) {
        $stock = trim($_POST['stock']);
    }
    if (isset($_POST['categoria'])) {
        $categoria = $_POST['categoria'];
    }
    if (isset($_POST['marca'])) {
        $marca = $_POST['marca'];
    }
    if (isset($_POST['garantia'])) {
        $garantia = $_POST['garantia'];
    }
    if (isset($_POST['envio'])) {
        $envio = $_POST['envio'];
    } else {
        $envio = '0';
    }
    if (isset($_POST['detalles'])) {
        $detalles = trim($_POST['detalles']);
    }

    require_once 'validar.php';
    if($errores !== '') {
        // Mostrar los errores
        echo getAlert($errores, 'danger');
    } else {
        // Se da de alta al usuario en la base de datos

        if(isset($_FILES['foto'])){
            $tmpName = $_FILES['foto']['tmp_name'];
            $fotoName = microtime(true).$_FILES['foto']['name'];
            if(!empty($tmpName)){
                move_uploaded_file($tmpName, "img/productos/$fotoName");
            }
        } else {
            $fotoName = '';
        };

        $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);
        mysqli_set_charset($link, DB_CHARSET);
        if (!isset($_GET['id_producto'])) {
            $sql = "INSERT INTO productos (nombre, id_categoria, id_marca, precio, stock, garantia, detalles, envio, foto)
            VALUES
            ('$nombre', $categoria, $marca, $precio, $stock, $garantia, '$detalles', $envio, '$fotoName')";
            mysqli_query($link, $sql);
            echo getAlert('Producto dado de alta con éxito.', 'success');
        } else {
            $sql = "UPDATE productos SET nombre = '$nombre', id_categoria = $categoria, id_marca = $marca, precio = $precio, stock = $stock, garantia = $garantia , detalles = '$detalles', envio = $envio WHERE id_producto = {$_GET['id_producto']}";
            mysqli_query($link, $sql);
            echo getAlert('Producto modificado con éxito.', 'success');
        }
        mysqli_close($link);
        

        // Se reinicializan las variables para limpiar el formulario
        $nombre = '';
        $precio = '';
        $stock = '';
        $categoria = '';
        $marca = '';
        $garantia = '';
        $envio = '0';
        $detalles = '';

    }
}


require_once 'productos_alta_form.php';
require_once 'pie.php';
