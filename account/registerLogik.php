<?php

use Core\ErrorHandler;

require_once "../Autoloader.php";

if (($_SERVER["REQUEST_METHOD"] == "POST")) {
    $dbAdatapter = \Core\DbAdapter::getInstance();
    $message = null;
    $alert = null;

    if (!empty($_POST['username']) && !empty($_POST["password"]) && !empty($_POST['repeatpassword'])) {
        $dbAdatapter->registerUser($_POST["username"], $_POST["password"], $_POST["repeatpassword"]);
    } else {
        $errorhandler = new ErrorHandler();
        $alert = "Bitte das Formular ausfüllen.";
        if ($alert != null) {
            $message = $_POST["message"] = $alert;
        }
        $errorhandler->displayMessage($message, true);
    }

}
