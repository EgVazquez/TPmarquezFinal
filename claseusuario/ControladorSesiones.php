<?php

require_once 'RepositorioUsuario.php';
require_once 'RepositorioLibro.php';
require_once 'Usuario.php';

class ControladorSesion
{
    protected $usuario = null;

    public function login($nombre_usuario, $clave)
    {
        $repo = new RepositorioUsuario();
        $usuario = $repo->login($nombre_usuario, $clave);

        if ($usuario === false) {
            //Falló el login
            return [false, "Error de credenciales"];
        } else {
            //Login correcto, ingresar al sistema
            session_start();
            $_SESSION['usuario'] = serialize($usuario);
            return [true, "Usuario correctamente autenticado"];
        }
    }

    public function create($nombre_usuario, $nombre, $apellido, $clave)
    {
        $repo = new RepositorioUsuario();
        $usuario = new Usuario($nombre_usuario, $nombre, $apellido);
        $id = $repo->save($usuario, $clave);
        if ($id === false) {
            return [false, "Error al crear el usuario"];
        } else {
            $usuario->setId($id);
            session_start();
            $_SESSION['usuario'] = serialize($usuario);
            return [true, "Usuario creado correctamente"];
        }
    }

    public function createbooks($ISBN, $title, $author, $genre, $user_id = null)
    {
        $repo = new RepositorioLibro();
        $libro = new Libros($ISBN, $title, $author, $genre, $user_id);
        $id = $repo->save($libro);
        if ($id === false) {
            return [false, "Error al cargar el libro"];
        } else {
            $libro->getISBN();
            session_start();
            $_SESSION['usuario'] = serialize($libro);
            return [true, "Se cargo con exito el libro"];
        }
    }
}
