<?php
require_once "../req/classes/DBConnector.php";
require_once "../req/classes/User_Class.php";
class DBAdapter {
    private $connector=null;
    private $dbname = "Rezepte";

    public function __construct() {
        $this->connector= DBConnector::getConnector();
        $this->connector->select_db($this->dbname);
    }

    public function getUser($NutzerID) {

        $user = new User_Class();

        $query = 'SELECT NutzerID, UserName, Passwd  FROM nutzer WHERE NutzerID='.$NutzerID;
        $result = $this->connector->query($query) or die($this->connector->error);
        $row = $result->fetch_assoc();
        if($row) {
            $user->setID($row['NutzerID']);
            $user->setUsername($row['UserName']);
            $user->setPassword($row['Passwd']);
        }
        
        return $user;
        
    }



}


?>