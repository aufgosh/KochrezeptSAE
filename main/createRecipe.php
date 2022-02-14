<?php
require_once "req/classes/DBAdapter.php";
require_once "req/classes/Recipe_Class.php";


$adpater = new DBAdapter;
$rezept  =  new Recipe_Class;

    if(isset($POST['Erstellen'])){
	$RezeptName=$_POST['txtRezeptName'];
	$RezeptBeschreibung=$_POST['txtRezeptBeschreiung'];
	$RezeptZubereitung=$_POST['txtZubreitung'];
	$imageFilUpload =$_POST['Bild'];
    }

    buildCreateRecipe();
    


?>
