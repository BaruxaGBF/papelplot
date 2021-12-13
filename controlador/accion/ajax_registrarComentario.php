<?php

session_start();

require_once(__DIR__ . "/../mdb/mdbComentario.php");
require_once(__DIR__ . "/../../modelo/entidad/Comentario.php");


$idUsuario = $_SESSION['ID_USUARIO'];
$idArticulo =$_POST['idArticulo'];
$comentario = $_POST['comentario'];


$insert = new Comentario(NULL,$idUsuario, $idArticulo, $comentario);
$estado = registrarComentario($insert);
$msg = "Ingresado";

$resultado = [
    'estado' => $estado,
    'msg' => $msg
];

echo json_encode($resultado);

echo "hola ";
echo $idArticulo;
echo $comentario;

