<?php

session_start();

require_once(__DIR__ . "/../../mdb/mdbCarrito.php");
require_once(__DIR__ . "/../../../modelo/entidad/Carrito.php");

$idUsuario = $_SESSION['ID_USUARIO'];
$idArticulo = filter_input(INPUT_POST, 'idArticulo');

$estado  = eliminarDelCarrito($idUsuario,$idArticulo);
$msg = "Se logró Eliminar el articulo";

$resultado = [
    'estado' => $estado,
    'msg' => $msg
];

header("Location: ../../../vista/carritoUser.php");
echo json_encode($resultado);
