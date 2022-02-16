<?php 

require_once "../req/sql.php";
// Define variables and initialize with empty values
//$dbAdatapter = \Core\DbAdapter::getInstance();
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
require_once "../Autoloader.php";

use Entities\User;

if (($_SERVER["REQUEST_METHOD"] == "POST")) {
    $user = new User();
    $dbAdatapter = \Core\DbAdapter::getInstance();
    $username = $_POST["username"];
    $user->setUsername($username);
    //$dbAdatapter->checkIfUserExists($user->getUsername());
    $Username = $user->getUsername();
    
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    }else
    {
        if ($dbAdatapter->CheckIfUserIsTaken($username)==1)
        {
            echo "Nutzername schon vergeben";
        
        }else
        {

            $param_password = hash('sha256', $_POST["password"]);
            $param_confirm_password = hash('sha256', $_POST["confirm_password"]);
        if (!empty($_POST["password"])) {
            if ($param_password == $param_confirm_password) {
                $dbAdatapter->InsertUserRegestration($Username, $param_password);
                header("location: login.php");
            }else
            {   
                echo "Passwörter Stimmen nicht überein.";
            }
        }else
        {
            echo "gib ein Passwort ein";
        }

    }
    }

    
  
    
    



    
    
    //echo $param_password;
    //$dbAdatapter->InsertUserRegestration($Username, $param_password);
    
}


/*class Register
{   
    

    public static function setRegisterUsername($username) {
        
        $user = new User();
        $dbAdatapter = \Core\DbAdapter::getInstance();

        //$dbAdatapter = new DBAdapter();
        $user->setUsername($username);
        //Register::checkIfUserExists($user->getUsername());
        $dbAdatapter->checkIfUserExists($user->getUsername());
        echo $user->getUsername();
        echo "test";
        
    }

    public function setRegisterPassword($password) {
        $user->setPassword($password);
    }



    /*public static function checkIfUserExists($username) {
        $stmt = \Core\DbAdapter::getConnector()->prepare("SELECT NutzerID FROM nutzer WHERE User = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if(mysqli_stmt_num_rows($result) == 1) {
            echo "nicht ok";
        } else {
            echo "ok";
        }

    }*/
    
    /*function getInformationFromUI()
    {
        if (empty(trim($_POST["username"]))) {
            $username_err = "Please enter a usernae.";
        } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"])))
        {
            $username_err = "Username can only contain letters, numbers and underscores.";
        }else
        {
            checkIfUserExists($_POST["username"]);
            
        }
    }
}
// Processing form data when form is submitted
/*if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    } elseif(!preg_match('/^[a-zA-Z0-9_]+$/', trim($_POST["username"]))){
        $username_err = "Username can only contain letters, numbers, and underscores.";
    } else{

        Register::setRegisterUsername($_POST["username"]);
        // Prepare a select statement
        $sql = "SELECT NutzerID FROM nutzer WHERE User = ?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
/*                  mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                    echo "username free";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Validate password and give requirements
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // check second password is the same as the first
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }

    echo "password OK";
    echo "<br> " . $username_err . " + " . $password_err . " + " . $confirm_password_err;
    
    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        echo "last schritt";
        // Prepare an insert statement
        $sql = "INSERT INTO nutzer (User, Password) VALUES (?, ?)";
         echo "insert true";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password);
            
            // Set parameters
            $param_username = $username;
            $param_password = hash('sha256', $password); // Creates a password hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: login.php");
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}*/
?>