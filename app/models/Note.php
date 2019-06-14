<?php


class Note extends Model {

    private $id;
    private $user_id;
    private $titulo;
    private $contenido;
    private $color;
    private $fecha;

    function __construct() {
        parent::__construct();
    }

    // GETTERS
    function getId() {
        return $this->id;
    }

    function getUserId() {
        return $this->user_id;
    }

    function getTitulo() {
        return $this->titulo;
    }

    function getContenido() {
        return $this->contenido;
    }

    function getColor() {
        return $this->color;
    }

    function getFecha() {
        return $this->fecha;
    }

    // SETTERS
    function setId($id) {
        $this->id = $id;
    }

    function setUserId($id) {
        $this->user_id = $id;
    }

    function setTitulo($titulo) {
        $this->titulo = $titulo;
    }

    function setContenido($contenido) {
        $this->contenido = $contenido;
    }

    function setColor($color) {
        $this->color = $color;
    }

    function setFecha($fecha) {
        $this->fecha = $fecha;
    }

    // METODOS PARA LA BBDD:
    function getAll() {
        $notas = false;
        $resultado = $this->db->query("SELECT * FROM notas ORDER BY id DESC");
        while ($row = $resultado->fetch_object('Note')) {
            $notas[] = $row;
        }

        return $notas;
    }

    function getAllbyId($id) {
        $notas = false;
        $resultado = $this->db->query("SELECT * FROM notas WHERE user_id = $id ORDER BY fecha DESC");
        while ($row = $resultado->fetch_object('Note')) {
            $notas[] = $row;
        }

        return $notas;
    }
    

    function getById($id) {
        $nota = false;
        $resultado = $this->db->query("SELECT * FROM notas WHERE id = $id");
        if ($row = $resultado->fetch_object('Note')) {
            $nota = $row;
        }
        return $nota;
    }

    function insert($datos) {
        $id         = 'null';
        $user_id    = $datos['user_id'];
        $titulo     = $datos['titulo'];
        $contenido  = $datos['contenido'];
        $color      = $datos['color'];
        $fecha      = 'SYSDATE()';
        return $this->db->query("INSERT INTO notas(id, user_id, titulo, contenido, color, fecha) VALUES($id, $user_id, '$titulo', '$contenido', '$color', $fecha)");
    }

    function update($nota) {
        return $this->db->query("UPDATE notas SET titulo = '$nota->titulo', contenido = '$nota->contenido', color = '$nota->color', fecha = $nota->fecha WHERE id = $nota->id");;
    }

    function delete($id) {
        return $this->db->query("DELETE FROM notas WHERE id = $id");;
    }

}

?>