<?php
    session_start();
    require "./components/db-connect.php";

    if (isset($_SESSION['adm'])) {
        header("Location: dashboard.php");
    } elseif (!isset($_SESSION['user'])) {
        header("Location: index.php");
    } 

    
    $sql = "SELECT * FROM users WHERE id = {$_SESSION['user']}";
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once "components/boot.php"; ?>
    <?php linkFun(0);  ?>
    <title>Welcome <?= $row['first_name'] ?></title>
</head>
<body>
<body>
    <?php require "./navbar.php"; ?>
    
    <div class="container">
        <div class="hero">
            <img class="userImage" src="pictures/<?php echo $row['picture']; ?>" alt="<?php echo $row['first_name']; ?>">
            <p class="text-white">Hi <?php echo $row['first_name']; ?></p>
        </div>
        <a class="link" href="logout.php?logout">Sign Out</a>
        <a class="link" href="update_profile.php?id=<?php echo $_SESSION['user'] ?>">Update your profile</a>
    </div>
    
    <?php require "./cars/footer.php"; ?>
</body>
</html>
