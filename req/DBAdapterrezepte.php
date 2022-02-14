<?php
class DBAdapterRezepte(){
    private $connector=null;
    private dbName = "Rezepte";

    public function __construct() {
        $this->connector= DBConnector::getConnector();
        $this->connector->select_db($this->dbname);
    }



}


?>