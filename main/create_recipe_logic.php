<?php

use Core\ErrorHandler;

require_once "../Autoloader.php";
$dbAdatapter = \Core\DbAdapter::getInstance();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $BildUploadFunktioniert = false;

    $errorhandler = new ErrorHandler();
    $message = null;
    $alert = null;
    $success = null;
    $errorbool = true;

    // Bildupload
    // If file upload form is submitted

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);

    if (isset($_POST["submit"])) {
        if (!empty($_FILES["image"]["name"])) {
            // Get file info 
            $fileName = basename($_FILES["image"]["name"]);
            $fileType = pathinfo($fileName, PATHINFO_EXTENSION);


            // Allow certain file formats
            $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
            if (in_array($fileType, $allowTypes)) {
                $image = $_FILES['image']['tmp_name'];
                $imgContent = addslashes(file_get_contents($image));

                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                    $success = "Rezept erfolgreich hochgeladen.";
                    $BildUploadFunktioniert = true;
                } else {
                    $alert = "Datei konnte nicht hoch geladen werden.";
                }
            } else {
                $alert = 'Datei entspricht falschem Dateiformat (JPG, JPEG, PNG, GIF)';
            }
        } else {
            $alert = 'Datei ist nicht lesbar.';
        }
    }

    if ($BildUploadFunktioniert == true) {
        $RezeptName = $_POST['txtRezeptName'];
        $RezeptBeschreibung = $_POST['txtRezeptBeschreiung'];
        $Zutaten = join("|", $_POST['zutat']);
        $RezeptZubereitung = $_POST['txtZubreitung'];
        $Bild = $target_file;

        $dbAdatapter->insertRecipe($RezeptName, $RezeptZubereitung, $Bild, $RezeptBeschreibung, $Zutaten, 1, $_SESSION["id"]);
    }

    // Display status message
    if ($alert != null) {
        $message = $_POST["message"] = $alert;
        $errorbool = true;
    } else {
        $message = $_POST["message"] = $success;
        $errorbool = false;
    }
    $errorhandler->displayMessage($message, $errorbool);
}
