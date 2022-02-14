<?php
class User_Class{
    private $id;
    private $username;
    private $password;

    public function setID($id){
        $this->id = $id;
    }

    public function getID() {
        return $this->id;
    }

    public function setUsername($username) {
        $this->username = $username;
    }

    public function getUsername() {
        return $this->username;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function getPassword() {
        return $this->password;
    }
}