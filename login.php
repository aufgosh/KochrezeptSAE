<?php include("./req/template/header.php") ?>

  <body class="text-center">

    <div class="container margin-auto">
    <div class="inner-main center col-md-10 col-lg-8">
    <div class="log-form">
  <h2>Login to your account</h2>
  <form class="form-login">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <button type="submit" class="btn btn-lavender btn-login">Submit</button>
</form>
</div><!--end log form -->
      </div>
    </div>

    <?php include("./req/template/footer.php") ?>