<?php
require_once "../req/sql.php";
class Recipe_Class {

    private $id;
    private $RezeptName;
    private $RezeptBeschreibung;
    private $Zutat1;
    private $RezeptZubereitung;
    private $Bild;

    public function setID($id){
        $this->id = $id;
    }
    public function getID() {
        return $this->id;
    }
    public function getRezeptName() {
        return $this->RezeptName;
    }
    public function setRezeptName() {
        return $this->RezeptName;
    }
    public function getRezeptBeschreibung() {
        return $this->RezeptBeschreibung;
    }
    public function setRezeptBeschreibung() {
        return $this->RezeptBeschreibung;
    }
    public function getZutat1() {
        return $this->Zutat1;
    }
   
    public function getRezeptZubereitung() {
        return $this->RezeptZubereitung;
    }
    public function setRezeptZubereitung() {
        return $this->RezeptZubereitung;
    } 
    public function getBild() {
        return $this->Bild;
    }
    public function setBild() {
        return $this->Bild;
    } 

    public function buildCreateRecipe( $RezeptName, $RezeptBeschreibung, $RezeptZubereitung, $imageFilUpload ) {
        
        $query = "INSERT INTO gericht (Name, Beschreibung, Anleitung, Bild)
        VALUES ($RezeptName, $RezeptBeschreibung,$RezeptZubereitung, $Bild, )";

        return $query;
    }

    public function addZutat() {

    }

    public function getZutat() {

    }
    /*
    public function loadRecipes() {
        $rezepte  
        $pcliste=new PC_Liste();
        $sql = "SELECT $RezeptName, $RezeptZubereitung, $Bild, $RezeptBeschreibung,
            $Zutat1, $Zutat2, $Zutat3, $Zutat4, $Zutat5, $Zutat6, $Zutat7, $Zutat8 FROM tblpcs;";
        $result = $this->connector->query($sql);
        $row = $result->fetch();
        while ($row) {
            $recipe = new Recipe_Class();
            $recipe->setID($recipe["Name"]);
            $recipe->setRezeptName($recipe["Zubereitungsanleitung"]);
            $recipe->setRezeptBeschreibung($recipe["Bild"]);
            $recipe->setZutat1($recipe["Zutat1"]);
            $recipe->setZutat2($recipe["Zutat2"]);
            $recipe->setZutat3($recipe["Zutat3"]);
            $recipe->setZutat4($recipe["Zutat4"]);
            $recipe->setZutat5($recipe["Zutat5"]);
            $recipe->setZutat6($recipe["Zutat6"]);
            $recipe->setZutat7($recipe["Zutat7"]);
            $recipe->setZutat8($recipe["Zutat8"]);
            $recipe = $result->fetch();
        }
        $result->closeCursor();
        
    return $pcliste;
    }
    */
}
?>