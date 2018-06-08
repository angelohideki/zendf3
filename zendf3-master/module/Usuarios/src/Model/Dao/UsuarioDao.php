<?php

namespace Usuarios\Model\Dao;

use \ArrayObject;
use Usuarios\Model\Entity\Usuario;

/**
 * Description of UsuarioDao
 *
 * @author Andres
 */
class UsuarioDao {

    private $listaUsuario;

    public function __construct() {
        $this->listaUsuario = new ArrayObject();
        $this->listaUsuario->append(new Usuario(1, "Andrés", "Guzmán", "andres.guzman@mi-dominio.com", "12345"));
        $this->listaUsuario->append(new Usuario(2, "Linus", "Torvalds", "linus.torvalds@mi-dominio.com", "12345"));
        $this->listaUsuario->append(new Usuario(3, "Steve", "Jobs", "steve.jobs@mi-dominio.com", "12345"));
        $this->listaUsuario->append(new Usuario(4, "Rasmus", "Lerdorf", "rasmus.lerdorf@mi-dominio.com", "12345"));
        $this->listaUsuario->append(new Usuario(5, "Erich", "Gamma", "erich.gamma@mi-dominio.com", "12345"));
        $this->listaUsuario->append(new Usuario(6, "Richard", "Helm", "richard.helm@mi-dominio.com", "12345"));
        $this->listaUsuario->append(new Usuario(7, "Ralph", "Johnson", "ralph.johnson@mi-dominio.com", "12345"));
        $this->listaUsuario->append(new Usuario(8, "John", "Vlissides", "john.vlissides@mi-dominio.com", "12345"));
        $this->listaUsuario->append(new Usuario(9, "Martin ", "Fowler", "martin.fowler@mi-dominio.com"));
        $this->listaUsuario->append(new Usuario(10, "James", "Gosling", "james.gosling@mi-dominio.com", "12345"));
        $this->listaUsuario->append(new Usuario(17, "Bruce", "Lee", "bruce.lee@mi-dominio.com", "12345"));
        $this->listaUsuario->append(new Usuario(18, "Bruce", "Willis", "bruce.willis@mi-dominio.com", "12345"));
    }

    public function obtenerTodos() {
        return $this->listaUsuario;
    }

    public function obtenerPorId($id) {
        $usuario = null;

        foreach ($this->listaUsuario as $usr) {
            if ($usr->getId() == $id) {
                $usuario = $usr;
                break;
            }
        }

        return $usuario;
    }

    public function buscarPorNombre($nombre) {
        $usuariosEncontrados = new ArrayObject();

        foreach ($this->listaUsuario as $usuario) {
            if ($usuario->getNombre() == $nombre) {
                $usuariosEncontrados->append($usuario);
            }
        }

        return $usuariosEncontrados;
    }

    public function obtenerCuenta($email, $password) {
        $usuario = null;
        foreach ($this->listaUsuario as $usr) {
            if ($usr->getEmail() == $email && $usr->getPassword() == $password) {
                $usuario = $usr;
                break;
            }
        }
        return $usuario;
    }

}
