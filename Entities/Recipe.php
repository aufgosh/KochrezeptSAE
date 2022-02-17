<?php declare(strict_types=1);

namespace Entities {
    class Recipe {
        private $rezepte = array();
        private $id;
        private $RezeptName;
        private $RezeptBeschreibung;
        private $Zutaten;
        private $RezeptZubereitung;
        private $Bild;
        private $nutzerID;

        //Set und get für RezeptID
        public function setID($id){
            $this->id = $id;
        }
        public function getID() {
            return $this->id;
        }
        public function setNutzerID($nutzerID){
            $this->nutzerID = $nutzerID;
        }
        public function getNutzerID() {
            return $this->nutzerID;
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
            return $this->Zutaten;
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


    }
}