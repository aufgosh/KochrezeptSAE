<?php

namespace Core {
    /**
     * Einstellungen für die Datenbank Verbindung.
     */
    abstract class Settings
    {
        public const DB_HOST = "localhost";
        public const DB_USER = "root";
        public const DB_PASS = "ascent";
        public const DB_NAME = "rezept";
    }
}