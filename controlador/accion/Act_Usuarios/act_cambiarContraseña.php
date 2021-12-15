<?php
session_start();

require_once(__DIR__ . "/../../mdb/mdbUsuario.php");
require_once(__DIR__ . "/../../../modelo/entidad/Usuario.php");

$idUsuario = $_POST['idUsuario'];
$password = $_POST['password'];

$estado = cambiarContraseña($idUsuario, $password);

if ($estado == 0) {
    $msg = "Actualización con exíto.";
    header("Location: ../../../index.html");
} else {
    $msg = "Algo Fallo.";
}




