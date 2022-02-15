<?php
require_once "Constants.php";
require_once "../Autoloader.php";
require_once(PATH_MAIN_HEADER_TEMPLATE);
$dbAdatapter = \Core\DbAdapter::getInstance();
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

            $user = $dbAdatapter->getUser($_GET["id"]);

            ?>

            <h1><?php $user->UserIDFrontendCheck($_GET["id"]); ?></h1>
            <div class="container padding-zero">
                <div class="profile-banner" style="background-image: url('https://www.partyfest.de/wp-content/uploads/2015/04/minions-top-banner.jpg');">
                    <div class="profile-picture">
                        <img src="https://avatars.githubusercontent.com/u/42834590?v=4">
                    </div>
                    <h3><?php echo $user->getUsername(); ?></h3>
                </div>
                <br>
                <div class="container profile-content">
                <br>
                <h2>Alle Retzepte von <?php echo $user->getUsername(); ?></h2>
                <?php
            $allRecp = \Core\DbAdapter::getInstance()->listRecipes($_GET['id']);

            /** @var Recipe $recipe */
            foreach ($allRecp as $recipe) {
                echo sprintf("<div class='line'></div>
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
                 <button class='btn btn-blue recipe-btn' onclick=\"window.location.href='../../main/recipe?id=%s'\">Rezept anschauen</button>
             </div>", $recipe->getRezeptName(),$recipe->getBild(), $recipe->getRezeptBeschreibung(), $recipe->getID());
            }
            ?>
                </div>
            </div>

        </div>
    </div>
</div>

<?php
require_once(PATH_MAIN_FOOTER_TEMPLATE);
