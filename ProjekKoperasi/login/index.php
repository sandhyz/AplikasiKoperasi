<?php session_start(); ?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="fonts/icomoon/style.css">

  <link rel="stylesheet" href="css/owl.carousel.min.css">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">

  <!-- Style -->
  <link rel="stylesheet" href="css/style.css">

  <title>Login - E-Koperasi</title>
</head>

<body>



  <div class="content">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6 contents  top-50 start-50 translate-middle">

          <div class="row">
            <!--card1-->
            <div class="col-md-12">
              <div class="col-md-12">
                <div class="form-block">
                  <!-- <?php if ($_SESSION["login_failed"] !== null) { ?>
                    <div class="alert alert-danger" role="alert">
                      <?php echo $_SESSION["login_failed"]; ?>


                    </div>
                  <?php unset($_SESSION["login_failed"]);
                  } ?> -->
                  <div class="mb-4">
                    <center>
                      <h3><strong>Log In</strong></h3>
                    </center>
                  </div>
                  <form action="proses.php" method="post">
                    <div class="form-group first">
                      <label for="username">Username</label>
                      <input type="text" name="username" class="form-control" id="username" required>

                    </div>
                    <div class="form-group last mb-4">
                      <label for="password">Password</label>
                      <input type="password" name="password" class="form-control" id="password" required>

                    </div>

                    <div class="d-flex mb-5 align-items-center">
                      <label class="control control--checkbox mb-0"><span class="caption">Ingatkan Saya</span>
                        <input type="checkbox" checked="checked" />
                        <div class="control__indicator"></div>
                      </label>
                      <span class="ml-auto"><a href="#" class="forgot-pass">Lupa Password</a></span>
                    </div>

                    <input type="submit" value="submit " class="btn btn-pill text-white btn-block btn-primary ukuranbtn">

                </div>
                </form>
              </div>
            </div>

          </div>
        </div>
      </div>


    </div>

  </div>

  </div>

  </div>



  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
</body>

</html>