<?php

class Router {

    // Atributos con valores por defecto.
    protected $controller = 'UserController';
    protected $action = 'index';
    protected $params = array();

    function __construct() {

        // Si me pasan url cambiaré los valores por defecto.
        if (isset($_GET['url']) && !empty($_GET['url'])) {
            // Obtengo la url
            $url = $this->getUrl();

            // Establezco el nombre del controlador correctamente.
            $url[0]= $this->setControllerName($url[0]);

            // Compruebo la existencia del controlador
            if (file_exists('app/controllers/' . $url[0] . '.php')) {
                $this->controller = $url[0];
            }

            // Elimino los valores del array (por eficiencia y para los parametros).
            unset($url[0]);
        }

        // Cargo el controlador
        require 'app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller();

        // Una vez tengo el controlador, compruebo la accion.
        if (isset($url[1])) {
            // Si existe ese método en el controlador, cambio el action
            // por defecto al que me pasan.
            if (method_exists($this->controller, $url[1])) {
                $this->action = $url[1];
                // Elimino los valores del array (por eficiencia y para los parametros).
                unset($url[1]);
            }
        }
        
        // Obtener los parámetros
        if (isset($url)) {
            $this->params = array_values($url); // Paso los valores de $url a params (Por esto hice los unset anteriores).
        }

        // Para llamar al action:
        call_user_func_array([$this->controller, $this->action], $this->params);
        /*
            Esta función de arriba llamará a la función del CONTROLADOR (action) que me den
            pasandole un array de parametros, ya sea vacio o no.
            
            Si quiero que un método del controlador reciba estos parametros simplemente se los pasaré:
                        function prueba($parametros = []) {}

            También puedo querer que no reciban nada sin problema alguno, como las de index:
                        function index() {}
        */
        
    }

    function getUrl() {
            // Por si al final de la url hay un slash que no me salga un $url[x] vacio ''.
            $url = rtrim($_GET['url'], '/');
            // Saneo la url
            $url = filter_var($url, FILTER_SANITIZE_URL);
            // Troceo la url
            $url = explode('/', $url);
            
            return $url;
    }

    function setControllerName($controllerName) {
        // Primera letra del controlador a mayuscula. nota -> Nota
        $controller = ucfirst($controllerName);

        // Le agregamos la palabra Controller al final. Nota -> NotaController
        $controller .= 'Controller';

        return $controller;
    }
}

?>