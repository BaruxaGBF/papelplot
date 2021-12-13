<?php

  session_start();

  require_once (__DIR__."/../mdb/mdbArticulo.php");

  $Articulo=ultimasActualizaciones();

  echo json_encode($Articulo);  