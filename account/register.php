
<?php 
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/req/template/header.php";
   include_once($path);

   $path1 = $_SERVER['DOCUMENT_ROOT'];
   $path1 .= "/account/registerLogik.php";
   include_once($path1);
?>

  <body class="text-center">

    <div class="container margin-auto">
    <div class="inner-main center col-md-10 col-lg-8">
    <div class="log-form">
  <h2>Registriere dein Konto</h2>
  <form class="form-login" method="GET">
  <div class="form-group">
    <label for="username">Username</label>
    <input type="email" class="form-control" id="username" aria-describedby="" placeholder="username">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1" >Passwort</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="passwort">
  </div>
  <div class="form-group">
    <label for="repeatPassword" >Passwort erneut eingeben</label>
    <input type="password" name="repeatPassword" class="form-control" id="exampleInputPassword1" placeholder="passwort">
  </div>
  <button type="submit" name="submit" class="btn btn-blue btn-login">Registrieren</button>
  <a href="/account/login"><small id="register" class="form-text text-muted small-link">Bereits ein Konto?</small></a>
</form>
</div><!--end log form -->
      </div>
    </div>

    <?php 
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/req/template/footer.php";
   include_once($path);
?>
