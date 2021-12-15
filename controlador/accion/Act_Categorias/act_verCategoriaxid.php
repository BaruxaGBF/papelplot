<?php
    session_start();
    require_once (__DIR__.'/../../mdb/mdbCategoria.php');
    
    $idCAtegoria = $_POST['idCategoria'];


    $Categoria = verCategoriaPorId($idCAtegoria);
    
    echo json_encode($Categoria);  