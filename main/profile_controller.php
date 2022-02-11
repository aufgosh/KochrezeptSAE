<?php
require_once "../req/sql.php";
require_once "../main/User.php";
function getUser($NutzerID) {

$user = new User();

$query = 'SELECT * from nutzer where NutzerID='.$NutzerID;
$result = $link->query($query);
$row = $result->fetch_assoc();
if($row) {
    $user->setID($row['NutzerID']);
    $user->setUsername($row['UserName']);
  }

  return $user;

}

?>  