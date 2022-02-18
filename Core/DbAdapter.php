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

    public static function getConnector()
    {
        return self::getInstance()->connector;
    }

    public static function getInstance()
    {
        if (!self::$instance instanceof self) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    /**
     * Get User by ID and save into global variable.
     */
    public function getUserById($NutzerID)
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
     * get User by Username.
     */
    public function getUserByUsername(string $username)
    {
        $query = "SELECT * FROM nutzer WHERE User=?";

        $statement = $this->connector->prepare($query);

        $filteredUsername = mysqli_real_escape_string($this->connector, $username);
        $statement->bind_param("s", $filteredUsername);

        if ($statement->execute()) {
            return $statement->get_result();
        } else {
            return null;
        }
    }

    /**
     * Insert new Receipe into database.
     */
    public function insertRecipe($name, $anleitung, $bild, $beschreibung, $zutaten, $createdByUser)
    {
        $stmt = $this->connector->prepare("INSERT INTO gericht (Name, Zubereitungsanleitung, Bild, Beschreibung, zutaten, nutzer_NutzerID) 
        VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $name, $anleitung, $bild, $beschreibung, $zutaten, $createdByUser);
        $stmt->execute();
    }

    /**
     * Get a list of all Recipes from the Database and save them in a global Variable.
     */
    public function listRecipes($id = null)
    {

        $query = "SELECT * FROM gericht ORDER BY GerichtID DESC ";
        $result = $this->connector->query($query) or die($this->connector->error);

        $allRecipes = [];
        $counter = 0;
        while ($row = $result->fetch_assoc()) {
            if (null == $id || $row['nutzer_NutzerID'] == $id) {
                $allRecipes[$counter] = new Recipe();
                $allRecipes[$counter]->setID($row['GerichtID']);
                $allRecipes[$counter]->setRezeptName($row['Name']);
                $allRecipes[$counter]->setRezeptZubereitung($row['Zubereitungsanleitung']);
                $allRecipes[$counter]->setRezeptBeschreibung($row['Beschreibung']);
                if ($row["Bild"] != "Bild" && $row["Bild"] != null) {
                    $allRecipes[$counter]->setBild($row["Bild"]);
                } else {
                    $allRecipes[$counter]->setBild("./main/uploads/default.jpg");
                }


            }
            $counter++;
        }
        return $allRecipes;
    }

    /**
     * get a certain Receipe from the Database and save it into a global Variable.
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
            if ($row["Bild"] != "Bild" && $row["Bild"] != null) {
                $recipe->setBild($row["Bild"]);
            } else {
                $recipe->setBild("./main/uploads/default.jpg");
            }
        }

        return $recipe;
    }

    /**
     * List all Ingredients fpr a receipe.
     */
    public function listIngredients($ingredients)
    {
        $str = "";

        $Zutaten = explode("|", $ingredients);
        foreach ($Zutaten as $zutate) {
            $str .= "<li>".$zutate."</li>";
        }
        
        return $str;
    }


    /**
     * Get a Receipe from database and save it into a variable.
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
            if ($row["Bild"] != "Bild" && $row["Bild"] != null) {
                $recipe->setBild($row["Bild"]);
            } else {
                $recipe->setBild("uploads/default.jpg");
            }
        }

        return $recipe;
    }

    /**
     * get the User for a Receipe from the Database.
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
        }
        return $User;
    }

    /**
     * check username and password with Database for login.
     */
    public function loginUser($username, $password) {

        $stmt = $this->connector->prepare("SELECT * FROM nutzer WHERE User = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;

    }

    /**
     * Insert Data from User to the Database for the regestraition. 
     */
    public function registerUser($username, $password)
    {
        $password = hash('sha256', $password);
        $stmt = $this->connector->prepare("INSERT INTO nutzer (User, Password) VALUES (?, ?)");
        $stmt->bind_param("ss", $username, $password);
        return $stmt->execute();
    }


}
