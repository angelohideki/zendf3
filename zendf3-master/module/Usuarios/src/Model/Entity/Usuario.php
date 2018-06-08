<?php

namespace Usuarios\Model\Entity;

class Usuario {

    private $id;
    private $nombre;
    private $apellido;
    private $email;
    private $password;

    public function __construct($id, $nombre, $apellido, $email = null, $password = null) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->email = $email;
        $this->password = $password;
    }

    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getApellido() {
        return $this->apellido;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getPassword() {
        return $this->password;
    }

}
