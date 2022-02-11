<?php 
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/req/template/main-header.php";
   include_once($path);
   require_once "../main/profile_controller.php";
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

   $user = getUser($_GET["id"]);

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
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/req/template/main-footer.php";
   include_once($path);
?>