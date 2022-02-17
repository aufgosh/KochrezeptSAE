<?php

class Autoloader
{
    /**
     * Sucht nach Klassen und bindet diese direkt ein ohne, dass jede Klasse einzeln eingebunden werden muss.
     */
    public static function register()
    {
        spl_autoload_register(function ($class) {
            $file = self::GetClassFileName($class);
            if (file_exists($file)) {
                require_once $file;
                return true;
            }
            return false;
        });
    }

    public static function GetClassFileName($className){
        return $_SERVER['DOCUMENT_ROOT'] .DIRECTORY_SEPARATOR. str_replace('\\', DIRECTORY_SEPARATOR, $className) . '.php';
    }
}

Autoloader::register();