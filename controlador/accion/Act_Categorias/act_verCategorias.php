<?php

  session_start();

  require_once (__DIR__."/../../mdb/mdbCategoria.php");

  $categoria=verCategorias();

  echo json_encode($categoria);  