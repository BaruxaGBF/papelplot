<?php
require_once(__DIR__."/../../modelo/dao/CarritoDAO.php");
        

function registrarCarrito(Carrito $carrito){
    
    $dao=new CarritoDAO();

    $carrito = $dao->registroCarrito($carrito);

    return $carrito;
}

function verCarritoporidUsuario($idUsuario){
    $dao=new CarritoDAO();
    $articulo = $dao->verCarritoporidUsuario($idUsuario);
    return $articulo;
}

function insertarCarrito(Carrito $carrito){

    $dao=new CarritoDAO();
    $carrito = $dao->insertarCarrito($carrito);
    return $carrito;
}

function buscarCarrito(Carrito $carrito){
    $dao=new CarritoDAO();
    $carrito = $dao->buscarCarrito($carrito);
    return $carrito;
}

function eliminarDelCarrito($idUsuario, $idArticulo){
    $dao=new CarritoDAO();
    $result = $dao->eliminarDelCarrito($idUsuario,$idArticulo);
    return $result;
}