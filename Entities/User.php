<?php

declare(strict_types=1);

namespace Entities {
    class User
    {
        private $id;
        private $username;
        private $password;

        public function getID()
        {
            return $this->id;
        }

        public function setID($id)
        {
            $this->id = $id;
        }

        public function getUsername()
        {
            return $this->username;
        }

        public function setUsername($username)
        {
            $this->username = $username;
        }

        public function getPassword()
        {
            return $this->password;
        }

        public function setPassword($password)
        {
            $this->password = $password;
        }

        public function UserIDFrontendCheck($id)
        {
            if ($id == $_SESSION['id']) {
                echo "Dein Profil";
            } else {
                echo "User Profil";
            }
        }

    }
}
