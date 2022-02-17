<?php
use Core\ErrorHandler;
require_once "../Autoloader.php";

if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: /main/index");
    exit;
}

if (($_SERVER["REQUEST_METHOD"] == "POST")) {
    $dbAdatapter = \Core\DbAdapter::getInstance();
    $message = null;
    $alert = null;

    if (!empty($_POST['username']) && !empty($_POST["password"])) {
        $dbAdatapter->loginUser($_POST["username"], $_POST["password"]);
    } else {
        $errorhandler = new ErrorHandler();
        $alert = "Bitte das Formular ausfüllen.";
        if ($alert != null) {
            $message = $_POST["message"] = $alert;
        }
        $errorhandler->displayMessage($message, true);
    }
}
  
