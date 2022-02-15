<?php
require_once "Constants.php";
require_once "../Autoloader.php";
require_once(PATH_MAIN_HEADER_TEMPLATE);
?>


<div class="wrapper">
    <!-- Sidebar  -->
    <?php
    require_once(PATH_MAIN_SIDEBAR_TEMPLATE);
    require_once "../main/create_recipe_logic.php";
    ?>
    <div class="container">
        <!-- Page Content  -->
        <div id="content">

            <?php
            $path = $_SERVER['DOCUMENT_ROOT'];
            $path .= "/req/template/index-navbar.php";
            include_once($path);
            ?>

            <script type="text/javascript" src="../req/js/AddFormField.js"></script>

            <div class="recipe-container">
                <div class="">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="col-md-9">
                            <h3>Rezeptname</h3>
                            <input required placeholder="Rezeptname" class="create-recipe-recipe-name" name="txtRezeptName" style="width: 100%;">
                            <br>
                            <br>
                            <h3>Rezept beschreibung</h3>
                            <textarea required name="txtRezeptBeschreiung"></textarea>
                            <br>
                            <br>
                            <h3>Benötigte Zutaten</h3>
                            <ul class="recipe-ul-styling">
                                <br>
                                <div class="col-md-8">
                                    <div class="col-md-8" id="recipediv">
                                        <ul class="recipe-ul-styling" id="forfields">
                                            <li><input type="text" name="zutat[]"></li>
                                            <br>
                                        </ul>
                                        <a href="javascript:AddFormField('forfields','text','','','li')">[Mehr Zutaten hinzufügen]</a>
                                    </div>
                            </ul>
                            <br>
                            <h3>Zubereitung</h3>
                            <textarea required name="txtZubreitung"></textarea>
                            <br>
                            <br>
                            <h3>Bild hochladen</h3>
                            <input type="file" name="image" required>
                            <br>
                            <br>
                            <button type="submit" class="btn btn-blue btn-login" name="submit" value="Upload">Rezept erstellen</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require_once(PATH_MAIN_FOOTER_TEMPLATE);
