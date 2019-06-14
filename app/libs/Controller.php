<?php

class Controller {

    public function loadModel($model) {

        if (file_exists('App/models/' . $model . '.php')) {
            require_once 'App/models/' . $model . '.php';
            return new $model();
        } else {
            die('[Controller] - El modelo no existe.');
        } 
    }

    public function loadView($view, $params = []) { // Le puedo pasar parametros.
        // Cargo el header
        require_once 'App/views/includes/header.php';

        // Cargo la vista que me pasen
        if (file_exists('App/views/' . $view . '.php')) {
            require_once 'App/views/' . $view . '.php';
        } else {
            echo '<div class="error"> La vista no existe. </div>';
        }

        // Cargo el footer
        require_once 'App/views/includes/footer.php';
    }
}

?>