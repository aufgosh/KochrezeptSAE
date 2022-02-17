<?php declare(strict_types=1);

namespace Controller;

use Core;
use Entities\User;
session_start();
if (isset($_SESSION['username'])) {

} else {
    header("location: ../user/login");
}

class DashboardController
{


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

    private function displayRecipe() {
        $dbAdapter = Core\DbAdapter::getInstance();
        $recipe = $dbAdapter->getRecipeById($_GET["id"]);

        echo '<h1>'. $recipe->getRezeptName() . '</h1>
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