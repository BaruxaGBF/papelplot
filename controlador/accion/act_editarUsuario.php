<?php
session_start();

require_once(__DIR__ . "/../mdb/mdbUsuario.php");
require_once(__DIR__ . "/../../modelo/entidad/Usuario.php");

$idUsuario = $_SESSION['ID_USUARIO'];
$correo = $_POST['correo'];
$password = $_POST['password'];
$primerNombre = $_POST['primerNombre'];
$segundoNombre = $_POST['segundoNombre'];
$primerApellido = $_POST['primerApellido'];
$segundoApellido = $_POST['segundoApellido'];
$telefono = $_POST['telefono'];


$usuario = new Usuario($idUsuario, $primerNombre, $segundoNombre, $primerApellido, $segundoApellido, $correo, $password, 0, $telefono);

$estado  = editarUsuario($usuario);

if ($estado != 0) {
    $msg = "Actualización con exíto.";
    header("Location: /../../vista/micuenta.php");
} else {
    $msg = "Algo Fallo.";
}

$resultado = [
    'estado' => $estado,
    'msg' => $msg,
    "algo" => $usuario->getsegundoNombre(),
];

echo json_encode($resultado);
