<?php

  session_start();

  require_once (__DIR__."/../../mdb/mdbArticulo.php");
  $cadena= $_POST['abuscar'];
  $Resultado=buscarArticulo($cadena);

  echo json_encode($Resultado);  