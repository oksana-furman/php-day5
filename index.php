<?php



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

          <input type="password" name="pass" class="form-control" placeholder="Your Password" maxlength="15" />
          <span class="text-danger"><?= $passError; ?></span>
          <hr />
          <button class="btn btn-block btn-primary" type="submit" name="btn-login">Sign In</button>
          <hr />
          <a href="register.php">Not registered yet? Click here</a>
      </form>
  </div>
</body>
</html>