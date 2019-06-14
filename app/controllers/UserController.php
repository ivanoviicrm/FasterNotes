<?php

class UserController extends Controller {

    function __construct() {
        $this->model = $this->loadModel('User');
        //echo '<p style="color:green;"><b>Constructor de Usuario.</b></p>';
    }

    function index() {
        $this->login(); // Por defecto index = login.
    }

    function registrarse() {
        if (isset($_POST) && !empty($_POST)) {
            if ($registrado = $this->model->insert($_POST)) { // Le paso los valores de POST, me duelve true o false
                $_SESSION['registrado'] = 'completed';
            } else {
                $_SESSION['registrado'] = 'failed';
            }
        }
        $this->loadView('user/registrarse');
    }

    function login() {
        if(isset($_POST) && !empty($_POST)) {
            if ($user = $this->model->getByEmail($_POST['email'])) {
                if ($_POST['email'] == $user->getEmail() && $_POST['password'] == $user->getPassword()) {
                    // Creo la sesion para el usuario:
                    $_SESSION['user']['id'] = $user->getId();
                    $_SESSION['user']['nombre'] = $user->getNombre();
                    $_SESSION['user']['apellido'] = $user->getApellido();
                    $_SESSION['user']['email'] = $user->getEmail();
                    $_SESSION['user']['password'] = $user->getPassword();
                    // Creo sesión para decirle que el login fue correcto:
                    $_SESSION['login'] = 'correcto';

                } else {
                    $_SESSION['login'] = 'Contraseña no válida.';
                }
            } else {
                $_SESSION['login'] = 'Email no registrado.';
            }
        }
        $this->loadView('user/login');
    }

    function logout() {
        // Me cargo la sesion:
        Utils::deleteSession('user');
        // Le devuelvo al login
        header('Location:'.URL);
    }

}

?>