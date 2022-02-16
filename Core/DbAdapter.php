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

    public static function getConnector()
    {
        return self::getInstance()->connector;
    }

    /**
     * Abfrage des Users und speichern in einer Globalen Variable.
     */
    public function getUser($NutzerID)
    {

        $user = new User();

        $stmt = $this->connector->prepare("SELECT NutzerID, User, Password  FROM nutzer WHERE NutzerID=?");
        $stmt->bind_param("s", $NutzerID);
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
            $user->setID($row['NutzerID']);
            $user->setUsername($row['User']);
            $user->setPassword($row['Password']);
        }


        return $user;
    }
    /**
     * Neues Rezept in Datenbank laden.
     */
    public function insertRecipe($name, $anleitung, $bild, $beschreibung, $zutaten, $category, $createdByUser)
    {


        $stmt = $this->connector->prepare("INSERT INTO gericht (Name, Zubereitungsanleitung, Bild, Beschreibung, zutaten, kategorie_idKategorie, nutzer_NutzerID) 
        VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss", $name, $anleitung, $bild, $beschreibung, $zutaten, $category, $createdByUser);
        $stmt->execute();
    }
    /**
     * Rezepte von der Datenbank holen und in Globale Variablen speichern. 
     */
    public function listRecipes($id = null)
    {

        $query = "SELECT * FROM gericht ORDER BY GerichtID DESC ";
        $result = $this->connector->query($query) or die($this->connector->error);

        $allRecipes = [];
        $counter = 0;
        while ($row = $result->fetch_assoc()) {
            if (null === $id || $row['nutzer_NutzerID'] == $id) {
                $allRecipes[$counter] = new Recipe();
                $allRecipes[$counter]->setID($row['GerichtID']);
                $allRecipes[$counter]->setRezeptName($row['Name']);
                $allRecipes[$counter]->setRezeptZubereitung($row['Zubereitungsanleitung']);
                $allRecipes[$counter]->setRezeptBeschreibung($row['Beschreibung']);
                if($row["Bild"] != "Bild" && $row["Bild"] != null) {
                    $allRecipes[$counter]->setBild($row["Bild"]);
                } else {
                    $allRecipes[$counter]->setBild("uploads/default.jpg");
                }
                

            }
            $counter++;
        }
        return $allRecipes;
    }
    /**
     * ein betimmtes Rezept von der Datenbank holen und in globale Variable speichern. 
     */
    public function getRecipeById($RecipeID)
    {

        $recipe = new Recipe();

        $stmt = $this->connector->prepare("SELECT * FROM gericht WHERE GerichtID = ?");
        $stmt->bind_param("s", $RecipeID);
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
            $recipe->setID($row['GerichtID']);
            $recipe->setRezeptName($row['Name']);
            $recipe->setZutaten($row['Zutaten']);
            $recipe->setRezeptZubereitung($row['Zubereitungsanleitung']);
            $recipe->setNutzerID($row['nutzer_NutzerID']);
            $recipe->setRezeptBeschreibung($row['Beschreibung']);
            if($row["Bild"] != "Bild" && $row["Bild"] != null) {
                $recipe->setBild($row["Bild"]);
            } else {
                $recipe->setBild("uploads/default.jpg");
            }
        }

        return $recipe;
    }
    /**
     * Aufzählung der Zutaten.
     */
    public function listIngredients($ingredients)
    {
        $Zutaten = explode("|", $ingredients);
        foreach ($Zutaten as $zutate) {
            echo "<li>";
            echo $zutate;
            echo "</li>";
        }
    }


    /**
     * Rezept von der Datenbank holen und in Globale Variablen speichern. 
     */
    public function getRecipe($RecipeID)
    {

        $recipe = new Recipe();


        $stmt = $this->connector->prepare("SELECT Name, Zubereitungsanleitung, Bild, Beschreibung, Zutaten, nutzer_NutzerID FROM gericht WHERE GerichtID = ?");
        $stmt->bind_param("s", $RecipeID);
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()) {
            $recipe->setID($row['GerichtID']);
            $recipe->setRezeptName($row['Name']);
            $recipe->setRezeptBeschreibung($row['Beschreibung']);
            $recipe->setRezeptZubereitung($row['Zubereitungsanleitung']);
            $recipe->setZutaten($row['Zutaten']);
            $recipe->setNutzerID($row['nutzer_NutzerID']);
            if($row["Bild"] != "Bild" && $row["Bild"] != null) {
                $recipe->setBild($row["Bild"]);
            } else {
                $recipe->setBild("uploads/default.jpg");
            }
        }

        return $recipe;
    }
    /**
     * Zugehörigen Nutzer zu einem Rezept aus der Datenbank holen. 
     */
    public function getUserForReceipt($RecipeID)
    {
        $User = "error";

        $stmt = $this->connector->prepare("SELECT gericht.GerichtID, gericht.nutzer_NutzerID, nutzer.NutzerID, nutzer.User
        FROM gericht
        INNER JOIN nutzer ON gericht.nutzer_NutzerID=nutzer.NutzerID
        WHERE ? = gericht.nutzer_NutzerID;");
        $stmt->bind_param("s", $RecipeID);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($row = $result->fetch_assoc()) {
            $User = $row['User'];
            echo $User;
        }
        return $User;
    }
    public function registerUser($username, $password, $repeatpassword)
    {
        $user = new User();
        $errorhandler = new ErrorHandler();
        $message = null;
        $alert = null;
        $success = null;
        $errorbool = true;

        if($password == $repeatpassword) {
            $password = hash('sha256', $password);
            $user->setPassword($password);

            $stmt = $this->connector->prepare("SELECT * FROM nutzer WHERE User = ?");
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();
            if (mysqli_num_rows($result) == 1)
            {
                $alert = "Username bereits vergeben.";
            } else {
                $user->setUsername($username);
                $stmt = $this->connector->prepare("INSERT INTO nutzer (User, Password) VALUES (?, ?)");
                $stmt->bind_param("ss", $username, $password);
                $stmt->execute();
                $success = "Benutzer erfolgreich angelegt.";
            }
        } else {
            $alert = "passwörter stimmen nicht über ein.";

        }

        if($alert != null) {
            $message = $_POST["message"] = $alert;
            $errorbool = true;
        } else {
            $message = $_POST["message"] = $success;
            $errorbool = false;
        }
        $errorhandler->displayMessage($message, $errorbool);
    }
    
    /**
     * Registration des Nutzers;
     */
    public function InsertUserRegestration($username, $param_password)
    {
        $stmt = $this->connector->prepare("INSERT INTO nutzer (User, Password) VALUES (?, ?) ");
        $stmt->bind_param("ss", $username, $param_password);
        $stmt->execute();
    }

   
}
