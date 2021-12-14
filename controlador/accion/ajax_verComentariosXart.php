<?php
session_start();
require_once(__DIR__ . "/../mdb/mdbComentario.php");

$idArticulo =$_POST['idArticulo'];

$comentario = verComentariosXart($idArticulo);

echo json_encode($comentario);
