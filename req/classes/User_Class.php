<?php
class User_Class{
    private $id;
    private $username;

    public function setID($id){
        $this->id = $id;
    }

    public function setUsername($username) {
        $this->username = $username;
    }
    
    public function getID() {
        return $this->id;
    }

    public function getUsername() {
        return $this->username;
    }
}
?>