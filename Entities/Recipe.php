<?php declare(strict_types=1);

namespace Entities {
    class Recipe
    {
        private $rezepte = array();
        private $id;
        private $RezeptName;
        private $RezeptBeschreibung;
        private $Zutaten;
        private $RezeptZubereitung;
        private $Bild;
        private $nutzerID;

        //Set und get für RezeptID

        public function getID()
        {
            return $this->id;
        }

        public function setID($id)
        {
            $this->id = $id;
        }

        public function getNutzerID()
        {
            return $this->nutzerID;
        }

        public function setNutzerID($nutzerID)
        {
            $this->nutzerID = $nutzerID;
        }

        //Set und get für Rezeptname

        public function getRezeptName()
        {
            return $this->RezeptName;
        }

        public function setRezeptName($RezeptName)
        {
            $this->RezeptName = $RezeptName;
        }

        //Set und get für Rezeptbeschreibung

        public function getRezeptBeschreibung()
        {
            return $this->RezeptBeschreibung;
        }

        public function setRezeptBeschreibung($RezeptBeschreibung)
        {
            $this->RezeptBeschreibung = $RezeptBeschreibung;
        }

        //Set und get für RezeptZutaten

        public function getZutaten()
        {
            return $this->Zutaten;
        }

        public function setZutaten($Zutaten)
        {
            $this->Zutaten = $Zutaten;
        }

        //Set und get für RezeptZubereitung

        public function getRezeptZubereitung()
        {
            return $this->RezeptZubereitung;
        }

        public function setRezeptZubereitung($RezeptZubereitung)
        {
            $this->RezeptZubereitung = $RezeptZubereitung;
        }

        //Set und get für RezeptBildPfad

        public function getBild()
        {
            return $this->Bild;
        }

        public function setBild($Bild)
        {
            $this->Bild = $Bild;
        }


    }
}