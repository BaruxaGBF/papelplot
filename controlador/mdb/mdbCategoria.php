<?php

require_once(__DIR__."/../../modelo/dao/CategoriaDAO.php");


function verCategorias(){
    $dao=new CategoriaDAO();

    $categoria = $dao->verCategorias();

    return $categoria;
} 

function editarCategoria($Categoria){
    $dao=new CategoriaDAO();
    return $dao->editarCategoria($Categoria);
} 

function verCategoriaPorId($idCategoria){
    $dao=new CategoriaDAO();
    $categoria = $dao->verCategoriaPorId($idCategoria);
    return $categoria;
}


function registrarCategoria($Categoria){
    $dao=new CategoriaDAO();
    $Categoria = $dao->registrarCategoria($Categoria);
    return $Categoria;
}