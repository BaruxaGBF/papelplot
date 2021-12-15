<?php
   
    session_start();
    
    require_once (__DIR__."/../../mdb/mdbArticulo.php");

        $nombre = filter_input(INPUT_POST,'nombre');
        $precio = filter_input(INPUT_POST,'precio');
        $descripcion = filter_input(INPUT_POST,'descripcion');
        $imagen = filter_input(INPUT_POST,'imagen');
        $idCategoria = filter_input(INPUT_POST,'idCategoria');
        $existencia = filter_input(INPUT_POST,'existencia');

        
        $articulo = new Articulo(NULL,$idCategoria, $nombre, $precio, $descripcion, $imagen, $existencia);
        $estado  = registrarArticulo($articulo);
        $msg="Se logró registrar el articulo";
       
    $resultado = [
        'estado' => $estado,
        'msg' => $msg
    ];

    header("Location: ../../../vista/AdminLogged.php");
    
    echo json_encode($resultado);