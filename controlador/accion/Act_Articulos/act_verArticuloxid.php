<?php
    session_start();
    require_once (__DIR__.'/../../mdb/mdbArticulo.php');
    require_once (__DIR__.'/../../mdb/mdbCategoria.php');
    
    $idArticulo = $_POST['idArticulo'];
    
    $articulo = verArticuloPorId($idArticulo);
    
    
    echo json_encode($articulo);  