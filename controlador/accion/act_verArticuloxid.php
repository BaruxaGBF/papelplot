<?php
session_start();
require_once (__DIR__."/../mdb/mdbArticulo.php");

$idArticulo = $_POST['idArticulo'];

$Articulo=verArticuloPorId($idArticulo);

echo json_encode($Articulo);
