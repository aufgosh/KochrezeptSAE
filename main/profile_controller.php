<?php
require_once "../req/sql.php";
require_once "../req/classes/User_Class.php";
require_once "../req/classes/DBAdapter.php";
function getUser($NutzerID) {

$user = new User_Class();
$dbadapter = new DBAdapter();

$query = 'SELECT * from nutzer where NutzerID='.$NutzerID;
$result = $dbadapter->connector->query($query);
$row = $result->fetch_assoc();
if($row) {
    $user->setID($row['NutzerID']);
    $user->setUsername($row['UserName']);
  }

  return $user;

}

?>  