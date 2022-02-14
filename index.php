<?php
require_once "Autoloader.php";

$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/req/template/header.php";
include_once($path);
?>

<body class="text-center">

<div class="container margin-auto">
    <div class="inner-main center">
        <h4>Willkommen bei</h4>
        <a href="/account/login"><h1 class="heading-main">Coogle</h1></a>
    </div>
</div>

<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/req/template/footer.php";
include_once($path);
?>
