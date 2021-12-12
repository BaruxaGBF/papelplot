<?php

require_once(__DIR__."/../../modelo/dao/CategoriaDAO.php");


function verCategorias(){
    $dao=new CategoriaDAO();

    $categoria = $dao->verCategorias();

    return $categoria;
} 