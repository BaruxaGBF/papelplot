<?php

require_once("DataSource.php");
require_once(__DIR__ . "/../entidad/Categoria.php");

class CategoriaDAO{

    public function registrarCategoria(Categoria $Categoria)
    {
        $data_source = new DataSource();

        $stmt1 = "INSERT INTO categorias VALUES (NULL,:nombre)";

        $resultado = $data_source->ejecutarActualizacion(
            $stmt1,
            array(
                ':nombre' => $Categoria->getNombre(),
            )
        );

        return $resultado;
    }

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

    public function editarCategoria($Categoria)
    {
        $data_source = new DataSource();

        $stmt1 = "UPDATE categorias SET nombre = :nombre WHERE idCategoria = :idCategoria";

        $resultado = $data_source->ejecutarActualizacion(
            $stmt1,
            array(
                ':idCategoria' => $Categoria->getidCategoria(),
                ':nombre' => $Categoria->getNombre()
            )
        );

        return $resultado;
    }

    public function verCategoriaPorId($idCategoria)
    {
        $data_source = new DataSource();

        $data_table = $data_source->ejecutarConsulta("SELECT * FROM Categorias WHERE idCategoria = :idCategoria", array(':idCategoria' => $idCategoria));

        $Categoria = null;
        //Si $data_table retornó una fila, quiere decir que se encontro el Categoria en la base de datos
        if (count($data_table) == 1) {
            $Categoria = new Categoria(
                $data_table[0]["idCategoria"],
                $data_table[0]["nombre"]
            );
        }


        return $Categoria;
    }

}