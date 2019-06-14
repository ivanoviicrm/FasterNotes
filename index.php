<?php
session_start();

require 'App/config/config.php';
require 'App/helpers/Utils.php';

/*
require 'App/libs/Controller.php';
require 'App/libs/Database.php';
require 'App/libs/Model.php';
require 'App/libs/Router.php';
require 'App/libs/View.php';*/

// Autoload de lo de arriba:
spl_autoload_register(function($nombreClase) {
    require_once 'App/libs/' . $nombreClase . '.php';
});

// Cargo el enrutador (quien tabajará con las urls).
$frontController = new Router();

?>