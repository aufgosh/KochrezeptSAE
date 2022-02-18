<?php
require_once "../Autoloader.php";
$dbAdatapter = \Core\DbAdapter::getInstance();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $BildUploadFunktioniert = false;


    // Bildupload
    // If file upload form is submitted 
    $status = $statusMsg = '';

    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);

    if (isset($_POST["submit"])) {
        $status = 'error';
        if (!empty($_FILES["image"]["name"])) {
            // Get file info 
            $fileName = basename($_FILES["image"]["name"]);
            $fileType = pathinfo($fileName, PATHINFO_EXTENSION);



            // Allow certain file formats 
            $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
            if (in_array($fileType, $allowTypes)) {
                $image = $_FILES['image']['tmp_name'];
                $imgContent = addslashes(file_get_contents($image));


                /**
                 * Check ob Bild erlaubt ist.
                 */
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                    $status = 'success';
                    $statusMsg = "File uploaded successfully.";
                    $BildUploadFunktioniert = true;
                } else {
                    $statusMsg = "File upload failed, please try again.";
                }
            } else {
                $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.';
            }
        } else {
            $statusMsg = 'Please select an image file to upload.';
        }
    }
    /**
     * Wenn der Check des Bildes erfolgreich war, übergabe an die Datenbank. 
     */
    if($BildUploadFunktioniert == true)
    {
        $RezeptName = $_POST['txtRezeptName'];
        $RezeptBeschreibung = $_POST['txtRezeptBeschreiung'];
        $Zutaten = join("|", $_POST['zutat']);
        $RezeptZubereitung = $_POST['txtZubreitung'];
        $Bild = $target_file;

        $dbAdatapter->insertRecipe($RezeptName, $RezeptZubereitung, $Bild, $RezeptBeschreibung, $Zutaten, $_SESSION["id"]);
    }

    



    // Display status message 
    echo $statusMsg;
}
