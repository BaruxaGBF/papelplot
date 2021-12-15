<?php

require_once("DataSource.php");
require_once(__DIR__ . "/../entidad/Usuario.php");

class UsuarioDAO
{

    public function autenticarUsuario($correo, $password)
    {
        $data_source = new DataSource();

        $data_table = $data_source->ejecutarConsulta("SELECT * FROM usuarios WHERE correo =:correo AND password = :password", array(':correo' => $correo, ':password' => $password));

        $usuario = null;

        if (count($data_table) == 1) {


            foreach ($data_table as $indice => $valor) {
                $usuario = new Usuario(
                    $data_table[$indice]["idUsuario"],
                    $data_table[$indice]["primerNombre"],
                    $data_table[$indice]["segundoNombre"],
                    $data_table[$indice]["primerApellido"],
                    $data_table[$indice]["segundoApellido"],
                    $data_table[$indice]["correo"],
                    $data_table[$indice]["password"],
                    $data_table[$indice]["esAdmin"],
                    $data_table[$indice]["telefono"]
                );
            }
        }

        return $usuario;
    }

    public function registrarUsuario(Usuario $usuario)
    {
        $data_source = new DataSource();

        $stmt1 = "INSERT INTO usuarios VALUES (NULL,:primerNombre,:segundoNombre,:primerApellido,:segundoApellido,:correo,:password,:esAdmin,:telefono)";

        $resultado = $data_source->ejecutarActualizacion(
            $stmt1,
            array(
                ':primerNombre' => $usuario->getprimerNombre(),
                ':segundoNombre' => $usuario->getsegundoNombre(),
                ':primerApellido' => $usuario->getprimerApellido(),
                ':segundoApellido' => $usuario->getsegundoApellido(),
                ':correo' => $usuario->getCorreo(),
                ':password' => $usuario->getPassword(),
                ':esAdmin' => $usuario->getesAdmin(),
                ':telefono' => $usuario->getTelefono()
            )
        );

        return $resultado;
    }

    public function verUsuarios()
    {
        $data_source = new DataSource();

        $data_table = $data_source->ejecutarConsulta("SELECT * FROM usuarios", NULL);

        $usuario = null;
        $usuarios = array();

        foreach ($data_table as $indice => $valor) {
            $usuario = new Usuario(
                $data_table[$indice]["idUsuario"],
                $data_table[$indice]["primerNombre"],
                $data_table[$indice]["segundoNombre"],
                $data_table[$indice]["primerApellido"],
                $data_table[$indice]["segundoApellido"],
                $data_table[$indice]["correo"],
                $data_table[$indice]["password"],
                $data_table[$indice]["esAdmin"],
                $data_table[$indice]["telefono"]
            );
            array_push($usuarios, $usuario);
        }

        return $usuarios;
    }

    public function eliminarUsuario($idUsuario)
    {
        $data_source = new DataSource();

        $stmt1 = "DELETE FROM usuarios WHERE idUsuario = :idUsuario";

        $resultado = $data_source->ejecutarActualizacion(
            $stmt1,
            array(
                ':idUsuario' => $idUsuario
            )
        );

        return $resultado;
    }

    public function verUsuarioPorId($idUsuario)
    {
        $data_source = new DataSource();

        $data_table = $data_source->ejecutarConsulta("SELECT * FROM usuarios WHERE idUsuario = :idUsuario", array(':idUsuario' => $idUsuario));

        $usuario = null;
        //Si $data_table retornó una fila, quiere decir que se encontro el usuario en la base de datos
        if (count($data_table) == 1) {
            $usuario = new Usuario(
                $data_table[0]["idUsuario"],
                $data_table[0]["primerNombre"],
                $data_table[0]["segundoNombre"],
                $data_table[0]["primerApellido"],
                $data_table[0]["segundoApellido"],
                $data_table[0]["correo"],
                $data_table[0]["password"],
                $data_table[0]["esAdmin"],
                $data_table[0]["telefono"]
            );
        }


        return $usuario;
    }

    public function editarUsuario($usuario)
    {
        $data_source = new DataSource();

        $stmt1 = "UPDATE usuarios SET primerNombre = :primerNombre, segundoNombre = :segundoNombre, primerApellido= :primerApellido, segundoApellido = :segundoApellido, correo = :correo, password = :password, esAdmin= :esAdmin, telefono = :telefono  WHERE idUsuario = :idUsuario";

        $resultado = $data_source->ejecutarActualizacion(
            $stmt1,
            array(
                ':idUsuario' => $usuario->getidUsuario(),
                ':primerNombre' => $usuario->getprimerNombre(),
                ':segundoNombre' => $usuario->getsegundoNombre(),
                ':primerApellido' => $usuario->getprimerApellido(),
                ':segundoApellido' => $usuario->getsegundoApellido(),
                ':correo' => $usuario->getcorreo(),
                ':password' => $usuario->getpassword(),
                ':esAdmin' => $usuario->getesAdmin(),
                ':telefono' => $usuario->gettelefono()
                
            )
        );

        return $resultado;
    }

    public function autenticarCorreo($correo)
    {
        $data_source = new DataSource();

        $data_table = $data_source->ejecutarConsulta("SELECT * FROM usuarios WHERE correo =:correo", array(':correo' => $correo));
        
        $usuario = null;
        if (count($data_table) == 1) {


            foreach ($data_table as $indice => $valor) {
                $usuario = new Usuario(
                    $data_table[$indice]["idUsuario"],
                    $data_table[$indice]["primerNombre"],
                    $data_table[$indice]["segundoNombre"],
                    $data_table[$indice]["primerApellido"],
                    $data_table[$indice]["segundoApellido"],
                    $data_table[$indice]["correo"],
                    $data_table[$indice]["password"],
                    $data_table[$indice]["esAdmin"],
                    $data_table[$indice]["telefono"]
                );
            }
        }

        return $usuario;
    }
}
