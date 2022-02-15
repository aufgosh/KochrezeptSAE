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
   $user = $dbAdatapter->getUser($_GET["id"]);

?>

            <h1>Dein Profil</h1>
            <div class="container padding-zero">
                <div class="profile-banner" style="background-image: url('https://www.partyfest.de/wp-content/uploads/2015/04/minions-top-banner.jpg');">
                    <div class="profile-picture">
                        <img src="https://avatars.githubusercontent.com/u/42834590?v=4">
                    </div> 
                    <h3><?php echo $user->getUsername(); ?></h3>
                </div>
                <div class="container profile-content">

                </div>
            </div>

        </div>
    </div>
</div>

<?php 
require_once(PATH_MAIN_FOOTER_TEMPLATE);    