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
                ?>

                <h1>Deine Rezepte</h1>
                <?php
                $dbAdatapter->listRecipes($_SESSION['id']);
                ?>

            </div>
        </div>
    </div>

<?php
require_once(PATH_MAIN_FOOTER_TEMPLATE);  