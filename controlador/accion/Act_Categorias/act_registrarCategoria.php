<?php
   
    session_start();
    
    require_once (__DIR__."/../../mdb/mdbCategoria.php");
    require_once (__DIR__."/../../../modelo/entidad/Categoria.php");

    
    $nombre = filter_input(INPUT_POST,'nombre');
        $Categoria = new Categoria(null, $nombre);
        $estado  = registrarCategoria($Categoria);
        $msg="Se logró registrar el articulo";
       
    $resultado = [
        'estado' => $estado,
        'msg' => $msg
    ];
    
    header("Location: ../../../vista/AdminLogged.php");
    
    echo json_encode($resultado);