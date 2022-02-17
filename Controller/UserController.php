<?php declare(strict_types=1);

namespace Controller;

use Core;
use Core\Constants;
use Entities\User;
use Internationalisation\ErrorMessages;

class UserController
{

    public function LogoutAction() {
        session_start();
        session_destroy();
        header("location: ../user/login");
    }

    public function LoginAction()
    {
        $dbAdapter = Core\DbAdapter::getInstance();
        $user = new User();
        $errorList = [];
        if ($_SERVER["REQUEST_METHOD"] == Constants\HTTPMethods::HTTP_POST) {
            if (empty($_POST['username']) || empty($_POST["password"])) {
                $errorList[] = ErrorMessages::ERROR_FORM_NOT_COMPLETE;
            }

            if (count($errorList) > 0) {
                $this->displayLoginForm($this->generateErrorMarkup($errorList));
                exit;
            }

            $result = $dbAdapter->loginUser($_POST["username"], $_POST["password"]);
            if ($row = $result->fetch_assoc()) {
                $user->setUsername($row['User']);
                $user->setPassword($row['Password']);
                $user->setID($row['NutzerID']);
            } else {
                echo  "Username oder Passwort falsch.";
            }
            $password = hash('sha256', $_POST['password']);
            if ($user->getPassword() == $password) {

                session_start();
                $_SESSION["loggedin"] = true;
                $_SESSION["id"] = $user->getID();
                $_SESSION["username"] = $user->getUsername();
                header("location: /dashboard/index");
            }
        }

        $this->displayLoginForm();
    }

    public function RegisterAction()
    {
        $dbAdapter = Core\DbAdapter::getInstance();
        $errorList = [];
        if ($_SERVER["REQUEST_METHOD"] == Constants\HTTPMethods::HTTP_POST) {
            if (empty($_POST['username']) || empty($_POST["password"]) || empty($_POST['repeatpassword'])) {
                $errorList[] = ErrorMessages::ERROR_FORM_NOT_COMPLETE;
            } else {
                if ($_POST["password"] !== $_POST['repeatpassword']) {
                    $errorList[] = ErrorMessages::ERROR_PASSWORD_NOT_EQUAL;
                }
            }

            if (count($errorList) > 0) {
                $this->displayRegisterForm($this->generateErrorMarkup($errorList));
                exit;
            }

            $alreadyExistingUser = $dbAdapter->getUserByUsername($_POST['username']);

            if (count($alreadyExistingUser->fetch_all()) <= 0) {
                $registerSuccess = $dbAdapter->registerUser($_POST["username"], $_POST["password"]);
                if ($registerSuccess) {
                    header('Location: ' . Constants\URL::URL_USER_LOGIN);
                }
            } else {
                $errorList[] = ErrorMessages::ERROR_USER_ALREADY_EXISTING;
                $this->displayRegisterForm($this->generateErrorMarkup());
                exit;
            }
        }

        $this->displayRegisterForm();

        // Prüft ob form values gesetzt sind die man braucht um den user zu speichern   -> check
        // Form validierung                                                             -> check
        // Ausgabe Form wenn keine Usereingaben vorhanden                               -> check
        // Prüfen ob user schon vorhanden                                               -> im DBAL
        // falls nicht user create                                                      -> check
        // Weiterleitung                                                                -> check
        //      -> Session starten und weiter zum dashboard                             -> noch offen
    }

    private function displayRegisterForm(string $errors = "")
    {
        echo '
          <body class="text-center">
<div class="container margin-auto">
    <div class="inner-main center col-md-10 col-lg-8"> 
        ' . $errors . '
        <div class="log-form">
            <h2>Registriere dein Konto</h2>
            <form class="form-login" method="POST">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="username" name="username" class="form-control" id="username" aria-describedby=""
                           placeholder="username">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Passwort</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                           placeholder="passwort">
                </div>
                <div class="form-group">
                    <label for="confirm_password">Passwort erneut eingeben</label>
                    <input type="password" name="repeatpassword" class="form-control" id="exampleInputPassword1"
                           placeholder="passwort">
                </div>
                <button type="submit" name="submit" class="btn btn-blue btn-login">Registrieren</button>
                <a href="/account/login"><small id="register" class="form-text text-muted small-link">Bereits ein
                        Konto?</small></a>
            </form>
        </div>
    </div>
</div>';

    }

    private function generateErrorMarkup(array $errorList)
    {
        $output = "";
        foreach ($errorList as $errorMessage) {

            $output .= Core\ErrorHandler::generateMessage($errorMessage);
        }

        return $output;
    }

    private function displayLoginForm(string $errors = "")
    {
        echo '
<body class="text-center">

<div class="container margin-auto">
    <div class="inner-main center col-md-10 col-lg-8">
        ' . $errors . '
        <div class="log-form">
            <h2>Melde dich in deinem Konto an</h2>
            <form class="form-login" method="POST">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="username" name="username" class="form-control" id="username" aria-describedby=""
                           placeholder="username">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Passwort</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                           placeholder="passwort">
                </div>
                <button type="submit" name="submit" class="btn btn-blue btn-login">Einloggen</button>
                <a href="/account/register"><small id="register" class="form-text text-muted small-link">Noch kein
                        Konto?</small></a>
            </form>
        </div><!--end log form -->
    </div>
</div>';
    }
}