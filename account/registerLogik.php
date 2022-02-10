<?php 
$_db_host = "localhost";            
$_db_datenbank = "rezept";
$_db_username = "root";
$_db_passwort = "";


# Datenbankverbindung herstellen
$mysqli = new mysqli($_db_host, $_db_username, $_db_passwort, $_db_datenbank);

#Test ob verbindung möglich
if (mysqli_connect_errno())
{
    echo "Keine Datenbankverbindung möglich: " . mysqli_connect_error();
    exit();
}else
{
    echo "erfolg";
}



if(isset($_POST['submit'])) {
    $error = false;
    
    $passwort = $_POST['password'];
    $passwort2 = $_POST['repeatPassword'];
  if(isset($_POST['email'])) {
	  $email = $_POST['email'];
	  echo $email;
  }else{
	  echo 'keine Mail angegeben';
  }
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo 'Bitte eine gültige E-Mail-Adresse eingeben<br>';
        $error = true;
    }     
    if(strlen($passwort) == 0) {
        echo 'Bitte ein Passwort angeben<br>';
        $error = true;
    }
    if($passwort != $passwort2) {
        echo 'Die Passwörter müssen übereinstimmen<br>';
        $error = true;
    }
    
    if(!$error) { 
		
        $result = $mysqli->query("SELECT Username FROM Nutzer");
		
        if(mysqli_num_rows($result)>0 ) {
            echo 'Diese E-Mail-Adresse ist bereits vergeben<br>';
            $error = true;
        }    
    }
    
    if(!$error) {    
        
		$mysqli->query("INSERT INTO Nutzer (UserName, passwd) VALUES (:email, :passwort)");
        
    } 
}


?>