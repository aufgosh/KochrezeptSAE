
<?php 
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/req/template/header.php";
   include_once($path);
?>

  <body class="text-center">

    <div class="container margin-auto">
    <div class="inner-main center col-md-10 col-lg-8">
    <div class="log-form">
  <h2>Melde dich in deinem Konto an</h2>
  <form class="form-login">
  <div class="form-group">
    <label for="username">Username</label>
    <input type="email" class="form-control" id="username" aria-describedby="" placeholder="username">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Passwort</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="passwort">
  </div>
  <button type="submit" class="btn btn-blue btn-login">Einloggen</button>
  <a href="/account/register"><small id="register" class="form-text text-muted small-link">Noch kein Konto?</small></a>
</form>
</div><!--end log form -->
      </div>
    </div>

    <?php 
   $path = $_SERVER['DOCUMENT_ROOT'];
   $path .= "/req/template/footer.php";
   include_once($path);
?>