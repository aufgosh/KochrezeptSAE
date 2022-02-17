<?php

declare(strict_types=1);

namespace Entities {
    class User
    {
        private $id;
        private $username;
        private $password;

        public function setID($id)
        {
            $this->id = $id;
        }

        public function getID()
        {
            return $this->id;
        }

        public function setUsername($username)
        {
            $this->username = $username;
        }

        public function getUsername()
        {
            return $this->username;
        }

        public function setPassword($password)
        {
            $this->password = $password;
        }

        public function getPassword()
        {
            if ($id == $_SESSION['id']) {
                return "Dein Profil";
            } else {
                return "User Profil";
            }
        }

    }
}
