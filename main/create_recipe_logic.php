<?php
require_once "../req/classes/DBAdapter.php";
$dbAdatapter = new DbAdapter();
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
        $Zutaten = $_POST['zutat'];
        $RezeptZubereitung = $_POST['txtZubreitung'];
        $Bild = $_POST['image-file-upload'];

        $dbAdatapter->insertRecipe($RezeptName, $RezeptBeschreibung, $Bild, $RezeptBeschreibung, 1, $_SESSION["id"]);
    }



}