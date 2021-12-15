<?php
session_start();

require_once(__DIR__."/../../mdb/mdbArticulo.php");

require_once(__DIR__ . "/../../../modelo/entidad/Articulo.php");

$idArticulo = $_POST['idArticulo'];
$nombre = $_POST['nombre'];
$precio = $_POST['precio'];
$idCategoria = $_POST['idCategoria'];
$Descripcion = $_POST['descripcion'];
$existencia = $_POST['existencia'];




$articulo = new Articulo($idArticulo,$idCategoria,$nombre,$precio,$Descripcion,"falta",$existencia);

$estado  = editarArticulo($articulo);

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
