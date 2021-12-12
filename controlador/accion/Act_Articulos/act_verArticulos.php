<?php

  session_start();

  require_once (__DIR__."/../../mdb/mdbArticulo.php");

  $Articulo=verArticulos();

  echo json_encode($Articulo);  