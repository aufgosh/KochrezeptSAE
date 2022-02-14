<?php
require_once "../req/sql.php";
class Recipe_Class {
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

    public function addRecipe($recipe){
        if($recipe instanceof Recipe_Class){            
            $this->rezepte[$this->anzahlPCs]=$recipe;
            $this->anzahlPCs++;
        }
    }

}
?>