<?php

  session_start();

  require_once (__DIR__."/../../mdb/mdbUsuario.php");

  $usuario=verUsuarios();

  echo json_encode($usuario);  