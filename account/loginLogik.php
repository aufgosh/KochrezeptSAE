<?php 

require_once "../req/sql.php";
// Define variables and initialize with empty values
//$dbAdatapter = \Core\DbAdapter::getInstance();
$username = $password = "";
require_once "../Autoloader.php";


if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: /main/index");
    exit;
}

if (($_SERVER["REQUEST_METHOD"] == "POST")) {
    $dbAdatapter = \Core\DbAdapter::getInstance();
    $dbAdatapter->loginUser($_POST["username"], $_POST["password"]);
}
  
