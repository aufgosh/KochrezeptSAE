<?php
require_once "../Autoloader.php";
$dbAdatapter = \Core\DbAdapter::getInstance();
if($_SERVER["REQUEST_METHOD"] == "POST") {
    /*
    echo "<pre>";
    var_dump($_POST);
    echo "<pre>";
    var_dump($_REQUEST);

    echo "<pre>";
    var_dump($_GET);

    $a = join("|", $_POST['zutat']);

    var_dump($a);
    echo PHP_EOL;
    $b = explode("|", $a);

    var_dump($b[1]);
    */


    if(isset($_POST['createRecipe'])){
        $RezeptName = $_POST['txtRezeptName'];
        $RezeptBeschreibung = $_POST['txtRezeptBeschreiung'];
        $Zutaten = join("|", $_POST['zutat']);
        $RezeptZubereitung = $_POST['txtZubreitung'];
        $Bild = $_POST['image-file-upload'];

        $dbAdatapter->insertRecipe($RezeptName, $RezeptBeschreibung, $Bild, $RezeptBeschreibung, $Zutaten, 1, $_SESSION["id"]);
    }

    // Bildupload
    // If file upload form is submitted 
    $status = $statusMsg = ''; 
    if(isset($_POST["submit"])){ 
        $status = 'error'; 
        if(!empty($_FILES["image"]["name"])) { 
            // Get file info 
            $fileName = basename($_FILES["image"]["name"]); 
            $fileType = pathinfo($fileName, PATHINFO_EXTENSION); 
            
            // Allow certain file formats 
            $allowTypes = array('jpg','png','jpeg','gif'); 
            if(in_array($fileType, $allowTypes)){ 
                $image = $_FILES['image']['tmp_name']; 
                $imgContent = addslashes(file_get_contents($image)); 
            
                // Insert image content into database 
                $insert = $db->query("INSERT into images (image, created) VALUES ('$imgContent', NOW())"); 
                
                if($insert){ 
                    $status = 'success'; 
                    $statusMsg = "File uploaded successfully."; 
                }else{ 
                    $statusMsg = "File upload failed, please try again."; 
                }  
            }else{ 
                $statusMsg = 'Sorry, only JPG, JPEG, PNG, & GIF files are allowed to upload.'; 
            } 
        }else{ 
            $statusMsg = 'Please select an image file to upload.'; 
        } 
    } 
 
// Display status message 
echo $statusMsg; 



}