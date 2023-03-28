<?php
    session_start();

    if(isset($_SESSION['user'])){
      header("Location: home.php");
    }

    if(isset($_SESSION['adm'])){
      header("Location: dashboard.php");
    }
    require_once "components/db-connect.php";
    
    function cleanInput($param){
      $clean = trim($param);
      $clean = strip_tags($clean);
      $clean = htmlspecialchars($clean);
      return  $clean;
    }
    
   $emailError = $passError = $email = "";
    if (isset($_POST['login'])) {
      $error = false;

      $email = cleanInput($_POST['email']);
      $password = cleanInput($_POST['password']);

      // email validation
      if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = true;
        $emailError = "Please enter valid email address";            
      } else {
        $sql = "SELECT email FROM users WHERE email = '$email'";
        $result = mysqli_query($connect, $sql);
      }

      // password validation
      if (empty($password)) {
        $error = true;
        $passlError = "Please enter your password"; 
      } elseif (strlen($password) < 6) {
        $error = true;
        $passError = "Password must have at least 6 characters";
      }

      if (!$error) {
        $password = hash("sha256", $password);
        $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
        $result = mysqli_query($connect, $sql);
        $row = mysqli_fetch_assoc($result);
        $count = mysqli_num_rows($result);

        if ($count == 1) {
            if ($row['status'] == 'adm') {
                $_SESSION['adm'] = $row['id'];
                header("Location: dashboard.php");
            } else {
                $_SESSION['user'] = $row['id'];
                header("Location: home.php");
            }
        }
      }
      

    }


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login & Registration System</title>
  <?php require_once "components/boot.php"; ?>
</head>

<body>
  <div class="container">
      <form class="w-75" method="post" action="<?= htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">
          <h2>Login</h2>
          <hr />
          <?php
          if (isset($errorMesssage)) {
              echo $errorMesssage;
          }
          ?>

          <input type="email" autocomplete="off" name="email" class="form-control" placeholder="Your Email" value="<?= $email; ?>" maxlength="40" />
          <span class="text-danger"><?= $emailError; ?></span>

          <input type="password" name="password" class="form-control" placeholder="Your Password" maxlength="15" />
          <span class="text-danger"><?= $passError; ?></span>
          <hr />
          <button class="btn btn-block btn-primary" type="submit" name="login">Sign In</button>
          <hr />
          <a class="link" href="register.php">Not registered yet? Click here</a>
      </form>
  </div>
</body>
</html>