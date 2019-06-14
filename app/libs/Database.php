<?php

class Database {

    // Uso el modelo Singleton para que sea rápida la carga de la web.
    // Esto era lo que me daba por culo y tardaba tanto en cargar las webs.

    private static $instancia;

    public static function connect() {
        if (!isset(self::$instancia)) {
            self::$instancia = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
            self::$instancia->query("SET NAMES 'utf8'");
        } 

        return self::$instancia;
    }

}

?>