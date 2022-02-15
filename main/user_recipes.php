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

                <h1>Deine Rezepte</h1>
                <?php
                $dbAdatapter->listRecipes($_SESSION['id']);
                ?>

            </div>
        </div>
    </div>

<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/req/template/main-footer.php";
include_once($path);
?>