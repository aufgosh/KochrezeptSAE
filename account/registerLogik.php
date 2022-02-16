<?php 

// Define variables and initialize with empty values
//$dbAdatapter = \Core\DbAdapter::getInstance();
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
require_once "../Autoloader.php";

use Entities\User;

if (($_SERVER["REQUEST_METHOD"] == "POST")) {
    $dbAdatapter = \Core\DbAdapter::getInstance();
    $dbAdatapter->registerUser($_POST["username"], $_POST["password"], $_POST["repeatpassword"]);
}
