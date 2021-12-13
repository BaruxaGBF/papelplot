<?php

require_once ("DataSource.php");  
require_once (__DIR__."/../entidad/Articulo.php");

class ArticuloDAO{

    public function registrarArticulo(Articulo $articulo){
        $data_source = new DataSource();
        
        $stmt1 = "INSERT INTO articulos VALUES (NULL,:nombre,:precio,:descripcion,:imagen,:existencia)"; 
        
        $resultado = $data_source->ejecutarActualizacion($stmt1, array(
            ':nombre' => $articulo->getnombre(),
            ':precio' => $articulo->getprecio(),
            ':descripcion' => $articulo->getdescripcion(),
            ':imagen' => $articulo->getimagen(),
            ':existencia' => $articulo->getexistencia(),
            )
        );
      return $resultado;
    }

    public function verArticulos(){
        $data_source = new DataSource();
        
        $data_table = $data_source->ejecutarConsulta("SELECT * FROM articulos", NULL);

        $articulo=null;
        $articulos=array();

        foreach($data_table as $indice => $valor){
            $articulo = new Articulo(
                $data_table[$indice]["idArticulo"],
                $data_table[$indice]["nombre"],
                $data_table[$indice]["precio"],
                $data_table[$indice]["descripcion"],
                $data_table[$indice]["imagen"],
                $data_table[$indice]["existencia"]
                );
            array_push($articulos,$articulo);
        }
        
      return $articulos;
    }

    public function verArticuloPorId($idArticulo){
        $data_source = new DataSource();
        
        $data_table = $data_source->ejecutarConsulta("SELECT * FROM articulos WHERE idArticulo = :idArticulo", array(':idArticulo' => $idArticulo));

        $articulo=null;

        if(count($data_table)==1){
            $articulo = new Articulo(
                $data_table[0]["idArticulo"],
                $data_table[0]["nombre"],
                $data_table[0]["precio"],
                $data_table[0]["descripcion"],
                $data_table[0]["imagen"],
                $data_table[0]["existencia"]
            );
        }

       return  $articulo;
    }

    public function eliminarArticulo($idArticulo){
        $data_source = new DataSource();
        
        $stmt1 = "DELETE FROM usuario WHERE idArticulo = :idArticulo"; 
        
        $resultado = $data_source->ejecutarActualizacion($stmt1, array(
            ':idArticulo' => $idArticulo
            )
        ); 

      return $resultado;
    }

    public function ultimasActualizaciones(){
        $data_source = new DataSource();
        
        $data_table = $data_source->ejecutarConsulta("SELECT * FROM articulos ORDER BY idArticulo DESC LIMIT 10", NULL);

        $articulo=null;
        $articulos=array();

        foreach($data_table as $indice => $valor){
            $articulo = new Articulo(
                $data_table[$indice]["idArticulo"],
                $data_table[$indice]["nombre"],
                $data_table[$indice]["precio"],
                $data_table[$indice]["descripcion"],
                $data_table[$indice]["imagen"],
                $data_table[$indice]["existencia"]
                );
            array_push($articulos,$articulo);
        }
        
      return $articulos;
    }

    public function articulosBaratos(){
        $data_source = new DataSource();
        
        $data_table = $data_source->ejecutarConsulta("SELECT * FROM articulos ORDER BY precio ASC LIMIT 9", NULL);

        $articulo=null;
        $articulos=array();

        foreach($data_table as $indice => $valor){
            $articulo = new Articulo(
                $data_table[$indice]["idArticulo"],
                $data_table[$indice]["nombre"],
                $data_table[$indice]["precio"],
                $data_table[$indice]["descripcion"],
                $data_table[$indice]["imagen"],
                $data_table[$indice]["existencia"]
                );
            array_push($articulos,$articulo);
        }
        
      return $articulos;
    }

}