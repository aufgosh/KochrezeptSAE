<?php
require_once "../req/sql.php";
class Recipe_Class {
    private $rezepte = array();
    private $id;
    private $RezeptName;
    private $RezeptBeschreibung;
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

    public function addZutat() {

    }

    public function getZutat() {
        
    }
}
?>