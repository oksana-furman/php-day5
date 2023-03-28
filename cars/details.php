<?php
    require "../components/db-connect.php";
    session_start();


    $sql = "select * from cars where id = {$_GET['id']}";
    $body = "";

    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($result);

    if(!isset($_SESSION['adm'])){
       $body .= "
        <div class='card m-1' style='width: 48rem;'>
            <img src='./img/{$row['picture']}' class='card-img-top' alt='{$row['brand']}'>
            <div class='card-body'>
                <h5 class='card-title'>{$row['brand']} {$row['model']}</h5>
                <p class='card-text'>Price per day: {$row['pricePerDay']}  &#8364;</p>
                <p class='card-text'>Type of fuel: {$row['fuelType']}</p>
                <p class='card-text'>Number of seats: {$row['seatNum']}</p>
            </div>
    <   /div>"; 
    } else {
        $body .= "
        <div class='card m-1' style='width: 48rem;'>
            <img src='./img/{$row['picture']}' class='card-img-top' alt='{$row['brand']}'>
            <div class='card-body'>
                <h5 class='card-title'>{$row['brand']} {$row['model']}</h5>
                <p class='card-text'>Price per day: {$row['pricePerDay']}  &#8364;</p>
                <p class='card-text'>Type of fuel: {$row['fuelType']}</p>
                <p class='card-text'>Number of seats: {$row['seatNum']}</p>
            </div>
            <div class='btnBox'>
                <a href='./update.php?id={$row['id']}' class='btn btn-warning'>Update</a>
                <a href='./delete.php?id={$row['id']}' class='btn btn-danger'>Delete</a>
            </div>
    <   /div>"; 
    } 
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php require_once "../components/boot.php"; ?>
    <?php linkFun(1);  ?>
    <title>Details</title>
</head>
<body>
    <?php require "./navbar.php"; ?>

   <div class="container">
   <?= $body; ?>
   </div>

   <?php require "./footer.php"; ?>
</body>
</html>