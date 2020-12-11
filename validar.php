<?php

$nombreLargoMinimo = 2;
$nombreLargoMaximo = 40;
if ($nombre === '') {
    $errores .= 'El nombre no puede estar vacío.<br>';
} elseif (strlen($nombre) < $nombreLargoMinimo) {
    $errores .= "El nombre debe tener al menos $nombreLargoMinimo caracteres.<br>";
} elseif (strlen($nombre) > $nombreLargoMaximo) {
    $errores .= "El nombre debe tener $nombreLargoMaximo caracteres como máximo.<br>";
}

if ($precio === '') {
    $errores .= 'El precio no puede estar vacío.<br>';
} elseif (!is_numeric($precio)) {
    $errores .= 'El precio debe ser valor numérico.<br>';
} elseif ($precio < 0) {
    $errores .= 'El precio no puede ser negativo.<br>';
}

if ($stock === '') {
    $errores .= 'El stock no puede estar vacío.<br>';
} elseif (!is_numeric($stock)) {
    $errores .= 'El stock debe ser valor numérico.<br>';
} elseif ($stock < 0) {
    $errores .= 'El stock debe contener un valor positivo.<br>';
} else {
    // Al sumarle cero, el stock se transforma en un número, ya sea un entero (int) o con parte decimal (float o double)
    $stock += 0;
    if (!is_int($stock)) {
        $errores .= 'El stock debe ser un número entero.<br>';
    }
}

$categorias_validas = [];

$host = '127.0.0.1';
$user = 'root';
$password = '';
$dataBase = 'proyecto_integrador';
$link = mysqli_connect($host, $user, $password, $dataBase);
$rs = mysqli_query($link, 'SELECT * FROM categorias');
mysqli_close($link);
while ($fila = mysqli_fetch_assoc($rs)) {
    array_push($categorias_validas, $fila['id_categoria']);
}

if ($categoria === '') {
    $errores .= 'La categoría no puede estar vacía.<br>';
} else {
    if (!in_array($categoria, $categorias_validas)) {
        $errores .= 'La categoria no es válida.<br>';
    }
}

$marcas_validas = [];

$link = mysqli_connect($host, $user, $password, $dataBase);
$rs = mysqli_query($link, 'SELECT * FROM marcas');
mysqli_close($link);
while ($fila = mysqli_fetch_assoc($rs)) {
    array_push($marcas_validas, $fila['id_marca']);
}
if ($marca === '') {
    $errores .= 'La marca no puede estar vacía.<br>';
} else {
    if (!in_array($marca, $marcas_validas)) {
        $errores .= 'La marca no es válida.<br>';
    }
}

if ($garantia === '') {
    $errores .= 'La garantía no puede estar vacía.<br>';
} else {
    $garantias_validas = ['6', '12', '24', '36'];
    if (!in_array($garantia, $garantias_validas)) {
        $errores .= 'La garantía no es válida.<br>';
    }
}

$detallesLargoMinimo = 5;
$detallesLargoMaximo = 500;
if ($detalles === '') {
    $errores .= 'Los detalles no pueden estar vacía.<br>';
} elseif (strlen($detalles) < $detallesLargoMinimo) {
    $errores .= "Los detalles deben tener al menos $detallesLargoMinimo caracteres.<br>";
} elseif (strlen($detalles) > $detallesLargoMaximo) {
    $errores .= "Los detalles deben tener $detallesLargoMaximo caracteres como máximo.<br>";
}
