<?php
require_once(__DIR__."/../../modelo/dao/ComentarioDAO.php");
        

function registrarComentario(Comentario $comentario){
    $dao = new ComentarioDAO();

    $comentario = $dao->registrarComentario($comentario);

    return $comentario;
}

function verComentariosXart($idArticulo){
    $dao=new ComentarioDAO();
    $comentario = $dao->verComentariosXart($idArticulo);
    return $comentario;
}