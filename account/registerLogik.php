<?php 

require_once "../Autoloader.php";


if (($_SERVER["REQUEST_METHOD"] == "POST")) {
    $dbAdatapter = \Core\DbAdapter::getInstance();
    $dbAdatapter->registerUser($_POST["username"], $_POST["password"], $_POST["repeatpassword"]);
}
