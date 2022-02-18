<?php declare(strict_types=1);

namespace Controller;

use Core;
use Core\Constants;
use Entities\User;
use Internationalisation\ErrorMessages;

session_start();
if (isset($_SESSION['username'])) {

} else {
    header("location: ../user/login");
}

class DashboardController
{

    public function Create_RecipeAction() {
        $this->createRecipe();
    }

    public function RecipeAction()
    {
        echo $this->displayRecipe();
    }

    public function IndexAction()
    {
        echo '<h1>Neuste Rezepte</h1>';
        $this->displayIndexContent();
    }

    public function User_recipesAction()
    {
        echo '<h1>Deine Rezepte</h1>';
        echo $this->listIndexRecipes($_SESSION["id"]);
    }

    public function ProfileAction()
    {
        $dbAdapter = Core\DbAdapter::getInstance();
        $user = new User();
        $user = $dbAdapter->getUserById($_GET["id"]);
        $this->displayProfileContent($user);
    }

    private function displayIndexContent()
    {
        echo $this->listIndexRecipes();
        echo '</div></div></div>';
    }

    public function createRecipe() {
        $errorList = [];
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $BildUploadFunktioniert = false;
            // Bildupload
            // If file upload form is submitted 
            $status = $statusMsg = '';
        
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES["image"]["name"]);
        
            if (isset($_POST["submit"])) {
                if (!empty($_FILES["image"]["name"])) {
                    // Get file info 
                    $fileName = basename($_FILES["image"]["name"]);
                    $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
        
        
        
                    // Allow certain file formats 
                    $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
                    if (in_array($fileType, $allowTypes)) {
                        $image = $_FILES['image']['tmp_name'];
                        $imgContent = addslashes(file_get_contents($image));
        
                        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                            $status = 'success';
                            $statusMsg = "File uploaded successfully.";
                            $BildUploadFunktioniert = true;
                        } else {
                            $errorList[] = ErrorMessages::ERROR_FILE_UPLOAD_FAILED;
                        }
                    } else {
                        $errorList[] = ErrorMessages::ERROR_WRONG_FILE_FORMAT;
                    }
                } else {
                    $errorList[] = ErrorMessages::ERROR_NO_PICTURE_SELECTED;
                }
            }
        
            if($BildUploadFunktioniert == true)
            {
                $RezeptName = $_POST['txtRezeptName'];
                $RezeptBeschreibung = $_POST['txtRezeptBeschreiung'];
                $Zutaten = join("|", $_POST['zutat']);
                $RezeptZubereitung = $_POST['txtZubreitung'];
                $Bild = $target_file;
        
                $dbAdatapter->insertRecipe($RezeptName, $RezeptZubereitung, $Bild, $RezeptBeschreibung, $Zutaten, $_SESSION["id"]);
                echo "yeah";
            }

            if (count($errorList) > 0) {
                $this->displayCreateRecipe($this->generateErrorMarkup($errorList));
                exit;
            }

        }
        $this->displayCreateRecipe();
    }

    private function generateErrorMarkup(array $errorList)
    {
        $output = "";
        foreach ($errorList as $errorMessage) {

            $output .= Core\ErrorHandler::generateMessage($errorMessage);
        }

        return $output;
    }

    private function displayRecipe(string $errors = "") {
        $dbAdapter = Core\DbAdapter::getInstance();
        $recipe = $dbAdapter->getRecipeById($_GET["id"]);
        echo '        '. $errors .'
        <h1>'. $recipe->getRezeptName() . '</h1>
                <div class="recipe-container">
                    <div class="row">
                        <div class="col-md-4">
                            <img class="recipe-image" src="'.  $recipe->getBild() .'">
                            <p>von <a class="recipe-anchor-class"
                                      href="profile?id='.  $recipe->getNutzerID() .'">'. $dbAdapter->getUserForReceipt($recipe->getNutzerID()).'</a>
                            </p>
                        </div>
                        <div class="col-md-6">
                            <h3>Rezept beschreibung</h3>
                            <p>'.$recipe->getRezeptBeschreibung().'</p>
                            <h3>Benötigte Zutaten</h3>
                            <ul class="recipe-ul-styling">
                                '.
        $dbAdapter->listIngredients($recipe->getZutaten())
                                .'
                            </ul>
                            <h3>Zubereitung</h3>
                            <p>'. $recipe->getRezeptZubereitung() .'</p>
                        </div>
                    </div>
                </div>';
    }

    private function displayCreateRecipe() {
        echo '            <div class="recipe-container">
        <div class="">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="col-md-9">
                    <h3>Rezeptname</h3>
                    <input required placeholder="Rezeptname" class="create-recipe-recipe-name" name="txtRezeptName" style="width: 100%;">
                    <br>
                    <br>
                    <h3>Rezept beschreibung</h3>
                    <textarea required name="txtRezeptBeschreiung"></textarea>
                    <br>
                    <br>
                    <h3>Benötigte Zutaten</h3>
                    <ul class="recipe-ul-styling">
                        <br>
                        <div class="col-md-8">
                            <div class="col-md-8" id="recipediv">
                                <ul class="recipe-ul-styling" id="forfields">
                                    <li><input type="text" name="zutat[]"></li>
                                    <br>
                                </ul>
                                <a href="javascript:AddFormField(\'forfields\',\'text\',\'\',\'\',\'li\')">[Mehr Zutaten hinzufügen]</a>
                            </div>
                    </ul>
                    <br>
                    <h3>Zubereitung</h3>
                    <textarea required name="txtZubreitung"></textarea>
                    <br>
                    <br>
                    <h3>Bild hochladen</h3>
                    <input type="file" name="image" required>
                    <br>
                    <br>
                    <button type="submit" class="btn btn-blue btn-login" name="submit" value="Upload">Rezept erstellen</button>
                </div>
            </form>
        </div>
    </div>';
    }

    private function listIndexRecipes($id = null)
    {

        $allRecp = \Core\DbAdapter::getInstance()->listRecipes();
        foreach ($allRecp as $recipe) {
            return sprintf("<div class='line'></div>
                    <div>
                         <h3 class='recipe-h3'>%s</h3>
                         <div class='row'>
                             <div class='image-wrapper'>
                                 <img class='recipe-image col'
                                      src='%s'>
                             </div>
                             <p class='col'>%s</p>
                         </div>
                         <br>
                     <button class='btn btn-blue recipe-btn' onclick=\"window.location.href='../../dashboard/recipe?id=%s'\">Rezept anschauen</button>
                 </div>", $recipe->getRezeptName(), $recipe->getBild(), $recipe->getRezeptBeschreibung(), $recipe->getID());
        }
    }


    private function displayProfileContent(User $user)
    {
        echo '                <h1>' . $user->UserIDFrontendCheck($_GET["id"]) . '</h1>
                <div class="container padding-zero">
                    <div class="profile-banner"
                         style="background-image: url(\'https://www.partyfest.de/wp-content/uploads/2015/04/minions-top-banner.jpg\');">
                        <div class="profile-picture">
                            <img src="https://avatars.githubusercontent.com/u/42834590?v=4">
                        </div>
                        <h3>' . $user->getUsername() . '</h3>
</div>
<br>
<div class="container profile-content">
    <br>
    <h2>Alle Rezepte von ' . $user->getUsername() . '</h2>
    <div>' . $this->listIndexRecipes($_GET["id"]) . '</div>
</div>
</div>';
    }

}