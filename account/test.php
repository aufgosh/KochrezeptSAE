<?php

$password = "Test";

for ($i = 1; $i <= 10; $i++) {
    $password_from_ui = password_hash($password, PASSWORD_DEFAULT);
    
    echo $password_from_ui;
    echo "<br>";
}