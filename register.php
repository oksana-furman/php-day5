<?php
    session_start();

    if(isset($_SESSION['user'])){
    header("Location: home.php");
    }

    if(isset($_SESSION['adm'])){
    header("Location: dashboard.php");
    }
    require_once "components/db-connect.php";
    require_once "components/file-upload.php";

    function cleanInput($param){
        $clean = trim($param);
        $clean = strip_tags($clean);
        $clean = htmlspecialchars($clean);
        return  $clean;
    }

    $fnameError = $lnameError = $emailError = $dateError = $passError = $first_name = $last_name = $email = "";
    if (isset($_POST['signUp'])) {
        $error = false;

        $first_name = cleanInput($_POST['first_name']);
        $last_name = cleanInput($_POST['last_name']);
        $email = cleanInput($_POST['email']);
        $password = cleanInput($_POST['password']);
        $date_of_birth = cleanInput($_POST['date_of_birth']);

        if (empty($first_name)) {
            $error = true;
            $fnameError = "Please enter your first name";
        } elseif (strlen($first_name) < 3 || strlen($first_name) > 30) {
            $error = true;
            $fnameError = "First name must have minimum 3 characters and maximum 30 characters";
        } elseif (!preg_match("/^[a-zA-Z\s]+$/", $first_name)) {
            $error = true;
            $fnameError = "First name must contain only letters and spaces";
        }

        if (empty($last_name)) {
            $error = true;
            $lnameError = "Please enter your first name";
        } elseif (strlen($last_name) < 3 || strlen($last_name) > 30) {
            $error = true;
            $lnameError = "Last name must have minimum 3 characters and maximum 30 characters";
        } elseif (!preg_match("/^[a-zA-Z]+$/", $last_name)) {
            $error = true;
            $lnameError = "Last name must contain only letters and no spaces";
        }

        if (empty($date_of_birth)) {
            $error = true;
            $dateError = "Please enter your date of birth"; 
        }

        // email validation
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = true;
            $emailError = "Please enter valid email address";            
        } else {
            $sql = "SELECT email FROM users WHERE email = '$email'";
            $result = mysqli_query($connect, $sql);

            if (mysqli_num_rows( $result) != 0) {
                $error = true;
                $emailError = "Provided email is already in use"; 
            }
        }

        // password validation
        if (empty($password)) {
            $error = true;
            $passlError = "Please enter your password"; 
        } elseif (strlen($password) < 6) {
            $error = true;
            $passError = "Password must have at least 6 characters";
        }

        $password = hash("sha256", $password);

        $picture = file_upload($_FILES['picture']);
        
        if (!$error) {
            $sql = "INSERT INTO `users`(`first_name`, `last_name`, `email`, `password`, `date_of_birth`, `picture`) VALUES ('$first_name', '$last_name', '$email', '$password', '$date_of_birth', '$picture->fileName')";
            $result = mysqli_query($connect, $sql);
            if ($result) {
                $class = "success";
                $errorMesssage = "Successfully registered. You may login now.";
                $uploadError = ($picture->error != 0) ? $picture->ErrorMessage : "";
            } else {
                $class = "danger";
                $errorMesssage = "Something went wrong. Try again later.";
                $uploadError = ($picture->error != 0) ? $picture->ErrorMessage : "";
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once "components/boot.php"; ?>
    <?php linkFun(0);  ?>
    <link rel="stylesheet" href="components/style.css">
    <title>Login & Registration System</title>
</head>
<body>
    <?php require "./navbar.php"; ?>
    <h1>Registration Form</h1>
    <?php if (isset($errorMesssage)) {
     ?>
    <div class="alert alert-<?= $class ?>" role="alert">
        <p><?= $errorMesssage ?></p>
        <p><?=  $uploadError ?></p>
    </div>
<?php } ?>

    <div class="container">
        <form action="<?= htmlspecialchars($_SERVER['SCRIPT_NAME']) ?>" method="post" enctype="multipart/form-data" class="form-group">
            <input type="text" name="first_name" class="form-control m-2" placeholder="type your first name" value="<?= $first_name; ?>">
            <span class="text-danger"> <?= $fnameError; ?> </span>

            <input type="text" name="last_name" class="form-control m-2" placeholder="type your last name" value="<?= $last_name; ?>">
            <span class="text-danger"> <?= $lnameError; ?> </span>

            <input type="email" name="email" class="form-control m-2" placeholder="type your email" value="<?= $email ?>">
            <span class="text-danger"> <?= $emailError; ?> </span>

            <input type="password" name="password" class="form-control m-2" placeholder="type your password">
            <span class="text-danger"> <?= $passError; ?> </span>

            <input type="date" name="date_of_birth" class="form-control m-2">
            <span class="text-danger"> <?= $dateError; ?> </span> <br>

            <input type="file" name="picture">
            <span class="text-danger"> <?= ($picture->ErrorMessage)??""; ?> </span> <br>
            <hr />
            <input type="submit" name="signUp" value="Sign up" class="btn btn-success">
            <hr />
            <a class="link" href="./index.php">Sign in Here...</a>
        </form>
    </div>

    <?php require "./cars/footer.php"; ?>  
</body>
</html>
