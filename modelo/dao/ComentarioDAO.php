<?php

require_once ("DataSource.php");  
require_once (__DIR__."/../entidad/Comentario.php");

class ComentarioDAO{

    public function registrarComentario(Comentario $comentario){
        $data_source = new DataSource();
        
        $stmt1 = "INSERT INTO comentario VALUES (NULL,:idUsuario,:idArticulo,:comentario)"; 
        
        $resultado = $data_source->ejecutarActualizacion($stmt1, array(
            ':idUsuario' => $comentario->getidusuario(),
            ':idArticulo' => $comentario->getidarticulo(),
            ':comentario' => $comentario->getcomentario(),
        ));
      return $resultado;
    }

    public function verComentariosXart($idArticulo){
        $data_source = new DataSource();
        
        $data_table = $data_source->ejecutarConsulta("SELECT * FROM comentario WHERE idArticulo = :idArticulo", array(':idArticulo' => $idArticulo));

        $comentario=null;
        $comentarios=array();

        foreach($data_table as $indice => $valor){
            $comentario = new Comentario(
                $data_table[$indice]["idComentario "],
                $data_table[$indice]["idUsuario "],
                $data_table[$indice]["idArticulo "],
                $data_table[$indice]["comentario"]
            );
            array_push($comentarios,$comentario);
        }
        
      return $comentarios;
    }

}