<?php declare(strict_types=1);

namespace Core {
    class DbConnector extends \mysqli
    {
        public function __construct(string $host, string $user, string $password, string $dbName)
        {
            parent::__construct($host, $user, $password, $dbName);

            if (mysqli_connect_error()) {
                exit('Verbindungsfehler(' . mysqli_connect_errno() . ')'
                    . mysqli_connect_error());
            }

            parent::set_charset('utf-8');
        }
    }
}