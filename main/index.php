<?php

use Entities\Recipe;

require_once "Constants.php";
require_once "../Autoloader.php";



require_once(PATH_MAIN_HEADER_TEMPLATE);

?>


    <div class="wrapper">
        <!-- Sidebar  -->
        <?php
        require_once(PATH_MAIN_SIDEBAR_TEMPLATE);
        ?>

        <div class="container">
            <!-- Page Content  -->
            <div id="content">

                <?php
                require_once(PATH_MAIN_INDEX_NAVBAR_TEMPLATE);
                ?>

                <h1>Neuste Rezepte</h1>
                <?php
                $allRecp = \Core\DbAdapter::getInstance()->listRecipes();

                /** @var Recipe $recipe */
                foreach ($allRecp as $recipe) {

                    #include(PATH_RECIPE_LIST_TEMPLATE);

                    echo "<div class='line'></div>
                    <div>
                         <h3 class='recipe-h3'>".$recipe->getRezeptName()."</h3>
                         <div class='row'>
                             <div class='image-wrapper'>
                                 <img class='recipe-image col'"; 
                    echo "src='".$recipe->getBild()."'>";

                    echo "
                        <button class='btn btn-blue recipe-btn' onclick=\"window.location.href='../../main/recipe?id=%s'\">Rezept anschauen</button>
                        </div>",$recipe->getRezeptName(),$recipe->getRezeptBeschreibung(), $recipe->getID();
                }
                ?>

            </div>
        </div>
    </div>

<?php
require_once(PATH_MAIN_FOOTER_TEMPLATE);    
?>