<?php
class DBConnector extends mysqli 
{
    private $user = "root";
    private $pass = "";
    private $dbHost = "localhost";
    private $dbName = "rezept";

    private static $instance = null;


    /**
     * @return DBConnector
     */
    public static function getConnector(){
        if(!self::$instance instanceof self){
            self::$instance = new self;
        }
        return self::$instance;
    }

    private function __construct(){
        parent::__construct($this->dbHost,
                            $this->user,
                            $this->pass, $this->dbName);
        if (mysqli_connect_error()){
            exit('Verbindungsfehler('.mysqli_connect_errno().')'
                    .mysqli_connect_error());
        parent::set_charset('utf-8');
        }
    }
    
}


?>