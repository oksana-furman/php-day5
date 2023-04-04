<?php
session_start();
require "../../components/db-connect.php";
require "../../components/file-upload.php";


if($_POST) {
    $brand = $_POST['brand'];
    $model = $_POST['model'];
    $pricePerDay = $_POST['pricePerDay'];
    $fuelType = $_POST['fuelType'];
    $seatNum = $_POST['seatNum'];
    $picture = file_upload($_FILES['picture'], "cars");

    $sql = "INSERT INTO `cars`(`brand`, `model`, `picture`, `fuelType`, `seatNum`, `pricePerDay`) VALUES ('$brand', '$model', '$picture->fileName', '$fuelType', $seatNum, $pricePerDay)";

    if (mysqli_query($connect, $sql)) {
        $class = "success";
        $message = "You have successfully added new car!";
    } else {
        $class = "danger";
        $message = "The entry was not added due to: <br>" . $connect->error;
    }
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
    <title>Create</title>
</head>
<body>
<?php require "./navbar.php"; ?>

<div class="container">
        <div class="alert alert-<?= $class; ?>" role="alert">
        <h1 class="mt-3 mb-3"><?= $message; ?></h1>
            <!-- <a href="../index.php"><button class="btn btn-success">Home</button></a> -->
        </div>
    </div>
    
    <?php require "../footer.php"; ?>
</body>
</html>