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

<script type="text/javascript">
// Copyright 2008 Bontrager Connection, LLC
// https://www.willmaster.com/

// When no form field name is provided, it is assumed 
//   to be the default name with the default name 
//   increment number appended.

var DefaultName = "gift";
var DefaultNameIncrementNumber = 0;

// No further customizations required.
function AddFormField(id,type,name,value,tag) {
if(! document.getElementById && document.createElement) { return; }
var inhere = document.getElementById(id);
var formfield = document.createElement("input");
var br = document.createElement("br");
if(name.length < 1) {
   DefaultNameIncrementNumber++;
   name = String(DefaultName + DefaultNameIncrementNumber);
   }
formfield.name = name;
formfield.type = type;
formfield.value = value;
if(tag.length > 0) {
   var thetag = document.createElement(tag);
   thetag.appendChild(formfield);
   inhere.appendChild(thetag);
   inhere.appendChild(br);
   }
else { inhere.appendChild(formfield); }
} // function AddFormField()
</script>

            <div class="recipe-container">
            <div class="row">
                <div class="col-md-9">
                    <h3>Rezeptname</h3>
                    <input required placeholder="Rezeptname" class="create-recipe-recipe-name" style="width: 100%;"></input>
                    <br>
                    <br>
                    <h3>Rezept beschreibung</h3>
                    <textarea required></textarea>
                    <br>
                    <br>
                <h3>Benötigte Zutaten</h3>
                <br>
                        <div class="col-md-8" id="recipediv">
                        <ul class="recipe-ul-styling" id="forfields">
                        <li><input type="text" name="gift0"></li>
                        <br>
                        </ul>
                        <a href="javascript:AddFormField('forfields','text','','','li')">[Mehr Zutaten hinzufügen]</a>
                        </div>
                <br>
                <h3>Zubereitung</h3>
                <textarea required></textarea>
                <br>
                <br>
                <h3>Bild hochladen</h3>
                <input type="file" name="image-file-upload" required>
                <br>
                <br>
                <button type="submit" class="btn btn-blue btn-login" name="Erstellen">Rezept erstellen</button>
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