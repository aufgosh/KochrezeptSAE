<?php 

require_once "../req/sql.php";
// Define variables and initialize with empty values
//$dbAdatapter = \Core\DbAdapter::getInstance();
$username = $password = "";
require_once "../Autoloader.php";

use Entities\User;

if (($_SERVER["REQUEST_METHOD"] == "POST")) {
    $dbAdatapter = \Core\DbAdapter::getInstance();
    $dbAdatapter->loginUser($_POST["username"], $_POST["password"]);
}
  
