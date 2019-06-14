<?php

class NoteController extends Controller {

    function __construct() {
        $this->model = $this->loadModel('Note');
        //echo '<p style="color:green;"><b>Constructor de nota.</b></p>';
    }

    function index() {
        $this->mostrarTodas(); // Por defecto index = mostrar todas las notas;
    }

    function mostrarTodas() {
        $notas = $this->model->getAllById($_SESSION['user']['id']);
        $this->loadView('note/mostrarTodas', $notas);
    }

    function nueva($datos = []) {
        if (isset($_POST) && !empty($_POST)) {
            $datos = array(
                'titulo' => $_POST['titulo'],
                'color' => $_POST['color'],
                'contenido' => $_POST['contenido'],
                'user_id' => $_SESSION['user']['id']
            );

            if ($this->model->insert($datos)) {
                $_SESSION['nuevaNota'] = 'completed';
            } else {
                $_SESSION['nuevaNota'] = 'failed';
            }     
        }
        $this->loadView('note/nueva');
    }

    function editar($datos = []) { // me pasan solo el id
        // Obtener los datos antes de la edición de la nota, para mostrarlos
        if (isset($datos) && !empty($datos)) {
            $params = $this->model->getById($datos); // Obtengo objeto note
            $this->loadView('note/editar', $params);
        }

        // Obtener los datos editados de la nota
        if (isset($_POST) && !empty($_POST)) {
            $nota = new Note();
            $nota->setId($_POST['id']);
            $nota->setUserId($_POST['user_id']);
            $nota->setTitulo($_POST['titulo']);
            $nota->setContenido($_POST['contenido']);
            $nota->setColor($_POST['color']);
            $nota->setFecha('SYSDATE()');
            
            if ($this->model->update($nota)) {
                $_SESSION['editarNota'] = 'completed';
            } else {
                $_SESSION['editarNota'] = 'failed';
            }
        }

        // Guardar los datos editados en la bbdd.


        $this->loadView('note/editar');
    }

    function eliminar($datos = []) { // me pasan solo el id
        // Obtener los datos antes de la eliminación de la nota
        if (isset($datos) && !empty($datos)) {
            if ($this->model->delete($datos)) {
                header('Location:'.URL.'note/index');
            }
        }
    }
}



?>