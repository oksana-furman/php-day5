<?php 
    session_start();
    require "../components/db-connect.php";
    require "../components/file-upload.php";

$id = $_GET['id'];
$sql = "SELECT * FROM cars WHERE id = $id";
$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once "../components/boot.php"; ?>
    <?php linkFun(1);  ?>
    <title>Update</title>
</head>
<body>
    <?php require "./navbar.php"; ?>
    <div class="container">
        <div class="btnBox">
        <h1>Update The Car</h1>
        </div>
        <form action="./action/a_update.php" method="post" enctype="multipart/form-data" class="form-group">
            <input class="form-control" type="text" name="brand" placeholder="Brand" value="<?= $row['brand'] ?>">
            <input class="form-control" type="text" name="model" placeholder="Model" value="<?= $row['model'] ?>">
            <input class="form-control" type="text" name="pricePerDay" placeholder="Price per day" value="<?= $row['pricePerDay'] ?>">
            <input class="form-control" type="text" name="seatNum" placeholder="Number of seats" value="<?= $row['seatNum'] ?>">
            <input class="form-control" type="text" name="fuelType" placeholder="Type of fuel" value="<?= $row['fuelType'] ?>">
            <input class="form-control" type="file" name="picture" id="image">
            <input class="form-control" type="hidden" name="id" value="<?= $row['id'] ?>">
            <input class="form-control" type="hidden" name="picture" value="<?= $row['picture'] ?>">
            <div class="btnBox">
             <input type="submit" name="update" value="Update" class="btn btn-success">
            </div>
        </form>    
    </div>

    <?php require "./footer.php"; ?>
</body>
</html>