<?php 
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/req/template/main-header.php";
   include_once($path);
require_once "../Autoloader.php";
?>


    <div class="wrapper">
        <!-- Sidebar  -->
        <?php 
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/req/template/sidebar.php";
   include_once($path);
?>
<div class="container">
        <!-- Page Content  -->
        <div id="content">

        <?php 
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/req/template/index-navbar.php";
   include_once($path);



        $dbAdatapter = \Core\DbAdapter::getInstance();
        $recipe = $dbAdatapter->getRecipeById($_GET["id"]);
?>

            <h1><?= $recipe->getRezeptName(); ?></h1>
            <div class="recipe-container">
            <div class="row">
                <div class="col-md-4">
                <img class="recipe-image" src="https://img.chefkoch-cdn.de/rezepte/745721177147257/bilder/668335/crop-960x540/lasagne.jpg">
                <p>von <a href="profile?id=<?php echo $recipe->getNutzerID()?>">cedric</a></p>
                </div>
                <div class="col-md-6">
                    <h3>Rezept beschreibung</h3>
                <p>voll leckere lasagne und so ka was man hier noch alles reinschreiben könnte, soll nur beispiel text sein.</p>
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
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/req/template/main-footer.php";
   include_once($path);
?>