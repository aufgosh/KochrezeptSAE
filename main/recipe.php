<?php 
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

$dbAdatapter = \Core\DbAdapter::getInstance();
$recipe = $dbAdatapter->getRecipeById($_GET["id"]);
?>

            <h1><?= $recipe->getRezeptName(); ?></h1>
            <div class="recipe-container">
            <div class="row">
                <div class="col-md-4">
                <img class="recipe-image" src="https://img.chefkoch-cdn.de/rezepte/745721177147257/bilder/668335/crop-960x540/lasagne.jpg">
                <p>von <a href="profile?id=<?php echo $recipe->getNutzerID()?>"><?php $dbAdatapter->getUserForReceipt($recipe->getNutzerID()); ?></a></p>
                </div>
                <div class="col-md-6">
                    <h3>Rezept beschreibung</h3>
                    <p><?= $recipe->getRezeptBeschreibung();?></p>
                <h3>Benötigte Zutaten</h3>
                <ul class="recipe-ul-styling">
                <?php
                $dbAdatapter->listIngredients($recipe->getZutaten());
                ?>
                </ul>
                <h3>Zubereitung</h3>
                <p><?= $recipe->getRezeptZubereitung();?></p>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>

<?php 
require_once(PATH_MAIN_FOOTER_TEMPLATE);  