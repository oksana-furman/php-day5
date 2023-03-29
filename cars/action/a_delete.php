<?php
session_start();
    require "../../components/db-connect.php";
    require "../../components/file-upload.php";

if ($_POST) {
    $id = $_POST['id'];
    $picture = $_POST['picture'];
    ($picture = 'car1.jpg"')?: unlink("../img/$picture");

    $sql = "DELETE FROM `cars` WHERE id = $id ";
    if (mysqli_query($connect, $sql) == true) {
        $class = "success";
        $message = "Successfully Deleted!";
        
    } else {
        $class = "danger";
        $message = "The entry was not deleted due to: <br>" . $connect->error;
    }
    mysqli_close($connect);
} else{
    header("location: ../error.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once "../../components/boot.php"; ?>
    <?php linkFun(1);  ?>
    <title>Delete</title>
</head>
<body>
    <?php require "../navbar.php"; ?>

    <div class="container">
        <div class="mt-3 mb-3">
            <h1>Delete request responce</h1>
        </div>
        <div class="alert alert-<?= $class; ?>" role="alert">
            <p><?= $message; ?></p>
            <a href="../index.php"><button class="btn btn-success">Home</button></a>
        </div>
    </div>

        <?php require "../footer.php"; ?>
</body>
</html>
