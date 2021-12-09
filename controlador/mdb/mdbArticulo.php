<?php
require_once(__DIR__."/../../modelo/dao/ArticuloDAO.php");
        

function registrarArticulo(Articulo $articulo){
    
    $dao=new ArticuloDAO();

    $articulo = $dao->registrarArticulo($articulo);

    return $articulo;
}

function verArticulos(){

    $dao=new ArticuloDAO();

    $articulo = $dao->verArticulos();

    return $articulo;
}

function verArticuloPorId($idArticulo){
    $dao=new ArticuloDAO();
    $articulo = $dao->verArticuloPorId($idArticulo);
    return $articulo;
}

function eliminarArticulo($idArticulo){
    $dao=new ArticuloDAO();
    $dao->eliminarArticulo($idArticulo);
}

