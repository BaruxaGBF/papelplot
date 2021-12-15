<?php
session_start();

require_once(__DIR__ . "/../../mdb/mdbUsuario.php");
require_once(__DIR__ . "/../../../modelo/entidad/Usuario.php");

$idUsuario = $_POST['idUsuario'];
$correo = $_POST['correo'];
$password = $_POST['password'];
$esAdmin = $_POST['esAdmin'];
echo $esAdmin;
$primerNombre = $_POST['primerNombre'];
$segundoNombre = $_POST['segundoNombre'];
$primerApellido = $_POST['primerApellido'];
$segundoApellido = $_POST['segundoApellido'];
$telefono = $_POST['telefono'];


$usuario = new Usuario($idUsuario, $primerNombre, $segundoNombre, $primerApellido, $segundoApellido, $correo, $password, $esAdmin, $telefono);
$estado  = editarUsuario($usuario);
echo editarUsuario($usuario);

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