<?php

  session_start();

  require_once (__DIR__."/../mdb/mdbArticulo.php");

  $Articulo=articulosBaratos();

  echo json_encode($Articulo);  