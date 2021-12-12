<?php

require_once("DataSource.php");
require_once(__DIR__ . "/../entidad/Categoria.php");

class CategoriaDAO{


    public function verCategorias()
    {
        $data_source = new DataSource();

        $data_table = $data_source->ejecutarConsulta("SELECT * FROM categorias", NULL);

        $categoria = null;
        $Categorias = array();

        foreach ($data_table as $indice => $valor) {
            $categoria = new categoria(
                $data_table[$indice]["idCategoria"],
                $data_table[$indice]["nombre"]
            );
            array_push($Categorias, $categoria);
        }

        return $Categorias;
    }
}