<?php
require_once "../req/sql.php";
class Recipe_Class {
    private $rezepte = array();
    private $id;
    private $RezeptName;
    private $RezeptBeschreibung;
    private $Zutat1;
    private $Zutat2;
    private $Zutat3;
    private $Zutat4;
    private $Zutat5;
    private $Zutat6;
    private $Zutat7;
    private $Zutat8;
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
    public function setZutat1() {
        return $this->Zutat1;
    }    
    public function getZutat2() {
        return $this->Zutat2;
    }
    public function setZutat2() {
        return $this->Zutat2;
    } 
    public function getZutat3() {
        return $this->Zutat1;
    }
    public function setZutat3() {
        return $this->Zutat1;
    }    
    public function getZutat4() {
        return $this->Zutat4;
    }
    public function setZutat4() {
        return $this->Zutat4;
    } 
    public function getZutat5() {
        return $this->Zutat5;
    }
    public function setZutat5() {
        return $this->Zutat5;
    } 
    public function getZutat6() {
        return $this->Zutat6;
    }
    public function setZutat6() {
        return $this->Zutat6;
    } 
    public function getZutat7() {
        return $this->Zutat7;
    }
    public function setZutat7() {
        return $this->Zutat7;
    } 
    public function getZutat8() {
        return $this->Zutat7;
    }
    public function setZutat8() {
        return $this->Zutat7;
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

    public function buildCreateRecipe(
    $RezeptName, $RezeptBeschreibung, $Zutat1, 
    $Zutat2, $Zutat3, $Zutat4, 
    $Zutat5, $Zutat6, $Zutat7, 
    $Zutat8, $RezeptZubereitung, 
    $ZutBildHochladenat8 ) {
        
        $query = "INSERT INTO gericht (Name, Zubereitungsanleitung, Bild, Beschreibung, Zutat1, Zutat2, Zutat3,
        Zutat4, Zutat5, Zutat6, Zutat7, Zutat8 )
        VALUES ($RezeptName, $RezeptZubereitung, $Bild, $RezeptBeschreibung, $Zutat1, $Zutat2, $Zutat3, $Zutat4, $Zutat5, $Zutat6,
        $Zutat7, $Zutat8 )";

        return $query;
    }

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

    public function addRecipe($recipe){
        if($recipe instanceof Recipe_Class){            
            $this->rezepte[$this->anzahlPCs]=$recipe;
            $this->anzahlPCs++;
        }
    }

    public function getAllRecipes()
    {
        for(int i= 0; i<)
    }
}
?>