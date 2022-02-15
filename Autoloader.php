<?php

class Autoloader
{
    /**
     * Sucht nach Klassen und bindet diese direkt ein ohne, dass jede Klasse einzeln eingebunden werden muss.
     */
    public static function register()
    {
        spl_autoload_register(function ($class) {
            $file = $_SERVER['DOCUMENT_ROOT'] .DIRECTORY_SEPARATOR. str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
            if (file_exists($file)) {
                require $file;
                return true;
            }
            return false;
        });
    }
}

Autoloader::register();