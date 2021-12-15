<?php
session_start();

require_once (__DIR__."/../../mdb/mdbCategoria.php");
require_once(__DIR__ . "/../../../modelo/entidad/Categoria.php");


$nombre = $_POST['nombre'];
$idCategoria = $_POST['idCategoria'];



$categoria = new Categoria($idCategoria,$nombre);

$estado  = editarCategoria($categoria);

if ($estado == 0) {
    $msg = "Actualización con exíto.";
    header("Location: ../../../vista/AdminLogged.php");
} else {
    $msg = "Algo Fallo.";
}

$resultado = [
    'estado' => $estado,
    'msg' => $msg,
];

echo json_encode($resultado);
