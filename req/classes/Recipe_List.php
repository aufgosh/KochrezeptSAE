<?php

class Recip_List {

    private $rezepte = array();
    private $anzahlRezepte=0;

    public function addRezepte($recipe){
        if($recipe instanceof Recipe_Class){            
            $this->rezepte[$this->anzahlRezepte]=$recipe;
            $this->anzahlRezepte++;
        }
    }
      
    public function getAnzalRezepte() {
        return $this->anzahlRezepte;
    }
    
}
