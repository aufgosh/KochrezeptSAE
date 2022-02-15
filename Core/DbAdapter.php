<?php

namespace Core;

use Entities\Recipe;
use Entities\User;

class DbAdapter
{
    private static $instance = null;

    private $connector = null;

    private function __construct()
    {
        //$this->connector= DBConnector::getConnector();
        $this->connector = new DbConnector(Settings::DB_HOST, Settings::DB_USER, Settings::DB_PASS, Settings::DB_NAME);
        $this->connector->select_db(Settings::DB_NAME);
    }

    public static function getInstance()
    {
        if (!self::$instance instanceof self) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    public static function getConnector(){
        return self::getInstance()->connector;
    }

    public function getUser($NutzerID)
    {

        $user = new User();

        $query = 'SELECT NutzerID, User, Password  FROM nutzer WHERE NutzerID=' . $NutzerID;
        $result = $this->connector->query($query) or die($this->connector->error);
        $row = $result->fetch_assoc();
        if ($row) {
            $user->setID($row['NutzerID']);
            $user->setUsername($row['User']);
            $user->setPassword($row['Password']);
        }

        return $user;

    }

    public function insertRecipe($name, $anleitung, $bild, $beschreibung, $zutaten, $category, $createdByUser)
    {

        $query = "INSERT INTO gericht (Name, Zubereitungsanleitung, Bild, Beschreibung, zutaten, kategorie_idKategorie, nutzer_NutzerID) 
                  VALUES ('$name', '$anleitung', '$bild', '$beschreibung', '$zutaten', '$category', '$createdByUser')";
        $this->connector->query($query) or die($this->connector->error);

    }

    public function listRecipes($id = null)
    {
        $query = "SELECT * FROM gericht ORDER BY GerichtID DESC ";
        $result = $this->connector->query($query) or die($this->connector->error);

        $allRecipes = [];

        $counter = 0;
        while ($row = $result->fetch_assoc()) {
            if (null === $id || $row['nutzer_NutzerID'] === $id) {
                $allRecipes[$counter] = new Recipe();
                $allRecipes[$counter]->setID($row['GerichtID']);
                $allRecipes[$counter]->setRezeptName($row['Name']);
                $allRecipes[$counter]->setRezeptZubereitung($row['Zubereitungsanleitung']);
            }
            $counter++;
        }

        return $allRecipes;
    }

    public function getRecipeById($RecipeID)
    {

        $recipe = new Recipe();

        $query = 'SELECT * FROM gericht WHERE GerichtID =' . $RecipeID;
        $result = $this->connector->query($query) or die($this->connector->error);
        $row = $result->fetch_assoc();
        if ($row) {
            $recipe->setID($row['GerichtID']);
            $recipe->setRezeptName($row['Name']);
            $recipe->setRezeptZubereitung($row['Zubereitungsanleitung']);
            $recipe->setNutzerID($row['nutzer_NutzerID']);

        }

        return $recipe;

    }

    public function getRecipe($RecipeID)
    {

        $recipe = new Recipe();

        $query = 'SELECT Name, Zubereitungsanleitung, Bild, Beschreibung, Zutaten, nutzer_NutzerID FROM gericht WHERE GerichtID =' . $RecipeID;
        $result = $this->connector->query($query) or die($this->connector->error);
        $row = $result->fetch_assoc();
        if ($row) {
            $recipe->setID($row['GerichtID']);
            $recipe->setRezeptName($row['Name']);
            $recipe->setRezeptBeschreibung($row['Beschreibung']);
            $recipe->setZutat1($row['Zutaten']);
            $recipe->setNutzerID($row['nutzer_NutzerID']);
        }

        return $recipe;


    }
    public function getUserForReceipt()
    {
        
        $query = 'SELECT gericht.nutzer_NutzerID, nutzer.NutzerID, nutzer.User
        FROM gericht
        INNER JOIN nutzer ON gericht.nutzer_NutzerID=nutzer.NutzerID';
        $result = $this->connector->query($query) or die($this->connector->error);
        $row = $result->fetch_assoc();
        if($row){
            $User = $row['nutzer.User'];
        }
        return $User;
    }

}
