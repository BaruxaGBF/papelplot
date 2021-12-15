<?php
session_start();
require_once (__DIR__."/../../mdb/mdbCarrito.php");
require_once (__DIR__."/../../../modelo/entidad/Carrito.php");

$idUsuario= $_SESSION['ID_USUARIO'];

$Articulo = verCarritoporidUsuario($idUsuario);

echo json_encode($Articulo);