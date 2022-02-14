<?php
require_once "../main/create_recipe_GUI.php";
//require_once "main/Recipe_Class.php";
require_once "./main/Recipe_Class.php";

    if(isset($POST['Erstellen'])){
	$Rezep2tName=$_POST['txtRezeptName'];
	$RezeptBeschreibung=$_POST['txtRezeptBeschreiung'];
	$Zutat1=$_POST['txtZutat1'];
	$Zutat2=$_POST['txtZutat2'];
	$Zutat3=$_POST['txtZutat3'];
	$Zutat4=$_POST['txtZutat4'];
	$Zutat5=$_POST['txtZutat5'];
	$Zutat6=$_POST['txtZutat6'];
	$Zutat7=$_POST['txtZutat7'];
	$Zutat8=$_POST['txtZutat8'];
	$RezeptZubereitung=$_POST['txtZubreitung'];
	$=$_POST['Bild'];
    }
    buildCreateRecipe();
    


?>
