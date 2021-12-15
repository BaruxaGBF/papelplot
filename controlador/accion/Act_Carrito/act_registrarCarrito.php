<?php
   
    session_start();
    
    require_once (__DIR__."/../../mdb/mdbCarrito.php");
    require_once (__DIR__."/../../../modelo/entidad/Carrito.php");

        $idUsuario = $_SESSION['ID_USUARIO'];
        $idArticulo = filter_input(INPUT_POST,'idArticulo');
        $cantidad = filter_input(INPUT_POST,'cantidad');
        
        $carrito = new Carrito($idUsuario, $idArticulo, $cantidad);
        $estado  = buscarCarrito($carrito);
        $msg="Se logró registrar el articulo";
       
    $resultado = [
        'estado' => $estado,
        'msg' => $msg
    ];
        
    echo json_encode($resultado);