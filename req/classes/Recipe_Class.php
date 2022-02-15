<?php
require_once "../req/sql.php";
class Recipe_Class {
    private $rezepte = array();
    private $anzahlRecipes = 0;
    private $id;
    private $RezeptName;
    private $RezeptBeschreibung;
    private $Zutaten;
    private $RezeptZubereitung;
    private $Bild;

    //Set und get für RezeptID
    public function setID($id){
        $this->id = $id;
    }
    public function getID() {
        return $this->id;
    }

    //Set und get für Rezeptname
    public function setRezeptName($RezeptName) {
        $this->RezeptName = $RezeptName;
    }
    public function getRezeptName() {
        return $this->RezeptName;
    }

    //Set und get für Rezeptbeschreibung
    public function setRezeptBeschreibung($RezeptBeschreibung) {
        $this->RezeptBeschreibung = $RezeptBeschreibung;
    }

    public function getRezeptBeschreibung() {
        return $this->RezeptBeschreibung;
    }

    //Set und get für RezeptZutaten
    public function setZutaten($Zutaten) {
        $this->Zutaten = $Zutaten;
    }

    public function getZutaten() {
        return $this->Zutat1;
    }

    //Set und get für RezeptZubereitung
    public function setRezeptZubereitung($RezeptZubereitung) {
        $this->RezeptZubereitung = $RezeptZubereitung;
    }

    public function getRezeptZubereitung() {
        return $this->RezeptZubereitung;
    }

    //Set und get für RezeptBildPfad
    public function setBild($Bild) {
        $this->Bild = $Bild;
    }

    public function getBild() {
        return $this->Bild;
    }

    public function buildCreateRecipe(
    $RezeptName, $RezeptBeschreibung, $RezeptZubereitung, $Bild,
    $ZutBildHochladenat8 ) {
        
        $query = "INSERT INTO gericht (Name, Zubereitungsanleitung, Bild, Beschreibung, Zutat1, Zutat2, Zutat3,
        Zutat4, Zutat5, Zutat6, Zutat7, Zutat8 )
        VALUES ($RezeptName, $RezeptZubereitung, $Bild, $RezeptBeschreibung )";

        return $query;
    }

    public function loadRecipes() {
        $rezepte;
        $pcliste=new PC_Liste();
        $sql = "SELECT $RezeptName, $RezeptZubereitung, $Bild, $RezeptBeschreibung FROM tblpcs;";
        $result = $this->connector->query($sql);
        $row = $result->fetch();
        while ($row) {
            $recipe = new Recipe_Class();
            $recipe->setID($recipe["Name"]);
            $recipe->setRezeptName($recipe["Zubereitungsanleitung"]);
            $recipe->setRezeptBeschreibung($recipe["Bild"]);
            // Zutaten
            $recipe = $result->fetch();
        }
        $result->closeCursor();
        
    return $pcliste;
    }

    public function addRecipe($recipe){
        if($recipe instanceof Recipe_Class){            
            $this->rezepte[$this->anzahlRecipes]=$recipe;
            $this->anzahlRecipes++;
        }
    }



    /*
    public function getAllRecipes()
    {
        for(int i= 0; i<);
    }
    */
}
?>