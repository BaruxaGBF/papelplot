<?php

session_start();

require_once(__DIR__ . "/../mdb/mdbUsuario.php");
require_once(__DIR__ . "/../../modelo/entidad/Usuario.php");

$primerNombre = filter_input(INPUT_POST, 'primerNombre');
$segundoNombre = filter_input(INPUT_POST, 'segundoNombre');
$primerApellido = filter_input(INPUT_POST, 'primerApellido');
$segundoApellido = filter_input(INPUT_POST, 'segundoApellido');
$correo = filter_input(INPUT_POST, 'correo');
$password = filter_input(INPUT_POST, 'password');
$telefono = filter_input(INPUT_POST, 'telefono');

$usuario = new Usuario(NULL, $primerNombre, $segundoNombre, $primerApellido, $segundoApellido, $correo, $password, 0, $telefono);
$estado  = registrarUsuario($usuario);
$msg = "Se logró registrar el usuario";

$resultado = [
    'estado' => $estado,
    'msg' => $msg
];

echo json_encode($resultado);

if ($estado != 0) {
    $user = autenticarUsuario($correo, $password);

    $_SESSION['ID_USUARIO'] = $user->getidUsuario();
    $_SESSION['NOMBRE_USUARIO'] = $user->getprimerNombre();
    $_SESSION['ADMIN'] = $user->getesAdmin();

    if ($user->getesAdmin() == 1) {
        header("Location: ../../vista/administradorUsuarios.php");
    } else {
        header("Location: ../../vista/userLogged.php");
    }
}
