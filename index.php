<?php
    ob_start();
    session_start();
    include_once("koneksi.php");
            
    if (!empty($_POST['username']) && !empty($_POST['password'])) {
        $query = "  
            SELECT * FROM admin  
            WHERE username = '".$_POST["username"]."' AND password = '".$_POST["password"]."'  
            ";
        $result = mysqli_query($koneksi, $query); 
        if (mysqli_num_rows($result) > 0) {
            $_SESSION['valid'] = true;
            $_SESSION['timeout'] = time();
            $_SESSION['username'] = '".$_POST["username"]."';
          
            echo 'You have entered valid use name and password';
            header("Location: home.php");
        }else {
            $msg = "Invalid username or password!";
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
  <link rel="icon" type="image/png" href="assets/images/icons/favicon.ico"/>
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="assets/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="assets/vendor/animate/animate.css">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="assets/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="assets/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="assets/vendor/select2/select2.min.css">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="assets/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="assets/css/util.css">
  <link rel="stylesheet" type="text/css" href="assets/css/main.css">
<!--===============================================================================================-->
</head>
<body>
  
  <div class="limiter">
    <div class="container-login100">
      <div class="wrap-login100">
        <form class="login100-form validate-form p-l-55 p-r-55 p-t-178" method="post">
          <span class="login100-form-title">
            PASS
          </span>

          <div class="wrap-input100 validate-input m-b-16" data-validate="Please enter username">
            <input class="input100" type="text" name="username" placeholder="Username">
            <span class="focus-input100"></span>
          </div>

          <div class="wrap-input100 validate-input" data-validate = "Please enter password">
            <input class="input100" type="password" name="password" placeholder="Password">
            <span class="focus-input100"></span>
          </div>

          <div class="text-center p-t-13 p-b-23 text-danger">
              <?php if (isset($msg)) echo $msg; ?>
          </div>

          <div class="container-login100-form-btn">
            <input class="login100-form-btn" type="submit" value="Log in">
          </div>

          <div class="flex-col-c p-t-30 p-b-40">
          </div>
        </form>
      </div>
    </div>
  </div>
  
  
<!--===============================================================================================-->
  <script src="assets/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
  <script src="assets/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
  <script src="assets/vendor/bootstrap/js/popper.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
  <script src="assets/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
  <script src="assets/vendor/daterangepicker/moment.min.js"></script>
  <script src="assets/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
  <script src="assets/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
  <script src="assets/js/main.js"></script>

</body>
</html>