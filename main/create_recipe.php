<?php 
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/req/template/main-header.php";
   include_once($path);
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

            <div class="recipe-container">
            <div class="row">
                <div class="col-md-9">
                    <h3>Rezeptname</h3>
                    <input required placeholder="Rezeptname" class="create-recipe-recipe-name" name="recipename" style="width: 100%;"></input>
                    <br>
                    <br>
                    <h3>Rezept beschreibung</h3>
                    <textarea name="recipe-description" required></textarea>
                    <br>
                    <br>
                <h3>Benötigte Zutaten</h3>
                <ul class="recipe-ul-styling">
                <br>
                    <div class="row">
                        <div class="col-md-6">
                        <li><input name="recipe-ingredient-1" placeholder="Zutat 1"></input></li>
                    <br>
                    <li><input name="recipe-ingredient-2" placeholder="Zutat 2"></input></li>
                    <br>
                    <li><input name="recipe-ingredient-3" placeholder="Zutat 3"></input></li>
                    <br>
                    <li><input name="recipe-ingredient-4" placeholder="Zutat 4"></input></li>
                        </div>
                        <div class="col-md-6">
                        <li><input name="recipe-ingredient-5" placeholder="Zutat 5"></input></li>
                    <br>
                    <li><input name="recipe-ingredient-6" placeholder="Zutat 6"></input></li>
                    <br>
                    <li><input name="recipe-ingredient-7" placeholder="Zutat 7"></input></li>
                    <br>
                    <li><input name="recipe-ingredient-8" placeholder="Zutat 8"></input></li>
                        </div>
                    </div>
                </ul>
                <br>
                <h3>Zubereitung</h3>
                <textarea name="recipe-description" required></textarea>
                <br>
                <br>
                <h3>Bild hochladen</h3>
                <input type="file" name="image-file-upload" required>
                <br>
                <br>
                <button type="submit" class="btn btn-blue btn-login">Rezept erstellen</button>
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