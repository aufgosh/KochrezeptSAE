<?php
require_once "../req/classes/DBConnector.php";
require_once "../req/classes/User_Class.php";
require_once "../req/classes/Recipe_Class.php";
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

    public function getRecipe($RecipeID) {

        $recipe = new Recipe_Class();

        $query = 'SELECT Name, Zubereitungsanleitung, Bild, Beschreibung, Zutat1, Zutat2, Zutat3,
        Zutat4, Zutat5, Zutat6, Zutat7, Zutat8 FROM gericht WHERE GerichtID =' .$RecipeID;
                $result = $this->connector->query($query) or die($this->connector->error);
                $row = $result->fetch_assoc();
                if($row) {
                    $recipe->setID($row['GerichtID']);
                    $recipe->setRezeptName($row['Name']);
                    $recipe->setRezeptBeschreibung($row['Beschreibung']);
                    $recipe->setZutat1($row['Zutat1']);
                    $recipe->setZutat2($row['Zutat2']);
                    $recipe->setZutat3($row['Zutat3']);
                    $recipe->setZutat4($row['Zutat4']);
                    $recipe->setZutat5($row['Zutat5']);
                    $recipe->setZutat6($row['Zutat6']);
                    $recipe->setZutat7($row['Zutat7']);
                    $recipe->setZutat8($row['Zutat8']);
                }
                
                return $recipe;

    }

    /*public function insertRecipe ( $RezeptName, $RezeptBeschreibung, $RezeptZubereitung, $imageFilUpload ) {
        
        $query = "INSERT INTO gericht (Name, Beschreibung, Anleitung, Bild)
        VALUES ($RezeptName, $RezeptBeschreibung,$RezeptZubereitung, $Bild, )";

        return $query;
    }*/
}
?>