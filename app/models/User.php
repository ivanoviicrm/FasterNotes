<?php

class User extends Model {

    private $id;
    private $nombre;
    private $apellido;
    private $email;
    private $password;

    function __construct() {
        parent::__construct();
    }

    // GETTERS
    function getId() {
        return $this->id;
    }

    function getNombre() {
        return $this->nombre;
    }

    function getApellido() {
        return $this->apellido;
    }

    function getEmail() {
        return $this->email;
    }

    function getPassword() {
        return $this->password;
    }

    // SETTERS
    function setId($id) {
        $this->id = $id;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setAppelido($apellido) {
        $this->apellido = $apellido;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    function setPassword($password) {
        $this->password = $password;
    }

    // METODOS PARA LA BBDD:
    function getByEmail($email) { // Para loguearse usar este
        $user = false;
        $resultado = $this->db->query("SELECT * FROM users WHERE email = '$email'");
        if ($row = $resultado->fetch_object('User')) {
            $user = $row;
        }
        return $user;
    }

    function insert($datos) {
        $id         = 'null';
        $nombre     = $datos['nombre'];
        $apellido   = $datos['apellido'];
        $email      = $datos['email'];
        $password   = $datos['password'];
        return $this->db->query("INSERT INTO users(id, nombre, apellido, email, password) VALUES($id, '$nombre', '$apellido', '$email', '$password')");
    }

    function delete($id) {
        return $this->db->query("DELETE FROM users WHERE id = $id");;
    }
}

?>