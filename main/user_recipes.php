<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/req/template/main-header.php";
include_once($path);
require_once "../Autoloader.php";
$dbAdatapter = \Core\DbAdapter::getInstance();
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
                ?>

                <h1>Neuste Rezepte</h1>
                <?php
                $allRecp = \Core\DbAdapter::getInstance()->listRecipes($_SESSION['id']);

                /** @var Recipe $recipe */
                foreach ($allRecp as $recipe) {

                    #include(PATH_RECIPE_LIST_TEMPLATE);
                    echo sprintf("<div class='line'></div>
                           <div>
                                <h3 class='recipe-h3'>%s</h3>
                                <div class='row'>
                                    <div class='image-wrapper'>
                                        <img class='recipe-image col'
                                             src='https://img.chefkoch-cdn.de/rezepte/745721177147257/bilder/668335/crop-960x540/lasagne.jpg'>
                                    </div>
                                    <p class='col'>%s</p>
                                </div>
                                <br>
                            <button class='btn btn-blue recipe-btn' onclick=\"window.location.href='../../main/recipe?id=%s'\">Rezept anschauen</button>
                        </div>",$recipe->getRezeptName(),$recipe->getRezeptZubereitung(), $recipe->getID());
                }
                ?>

            </div>
        </div>
    </div>

<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/req/template/main-footer.php";
include_once($path);
?>