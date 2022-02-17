<?php
require_once "../Autoloader.php";
require_once "../main/Constants.php";
require_once(PATH_HEADER_INDEX_HEADER_TEMPLATE);

?>

    <body class="text-center">


<div class="container margin-auto">
    <div class="inner-main center col-md-10 col-lg-8">
        <?php require_once(PATH_REGISTER_LOGIC_TEMPLATE); ?>
        <div class="log-form">
            <h2>Registriere dein Konto</h2>
            <form class="form-login" method="POST">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="username" name="username" class="form-control" id="username" aria-describedby=""
                           placeholder="username">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Passwort</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                           placeholder="passwort">
                </div>
                <div class="form-group">
                    <label for="confirm_password">Passwort erneut eingeben</label>
                    <input type="password" name="repeatpassword" class="form-control" id="exampleInputPassword1"
                           placeholder="passwort">
                </div>
                <button type="submit" name="submit" class="btn btn-blue btn-login">Registrieren</button>
                <a href="/account/login"><small id="register" class="form-text text-muted small-link">Bereits ein
                        Konto?</small></a>
            </form>
        </div>
    </div>
</div>

<?php
require_once(PATH_HEADER_INDEX_FOOTER_TEMPLATE);
